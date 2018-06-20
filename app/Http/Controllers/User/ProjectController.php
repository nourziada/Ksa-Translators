<?php

namespace App\Http\Controllers\User;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectData;
use App\Reply;
use App\TransactionModal;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Session;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUser');
    }

    protected function SetContext()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('payment.accounts.client_id'),
                config('payment.accounts.secret_client')
            )
        );

        $this->apiContext->setConfig(config('payment.settings'));

    } 

    public function makePaymentAccount(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required|max:255',
            'from_bank' => 'required|max:255',
            'to_bank' => 'required|max:255',
            'transaction_date' => 'required|max:255',
            'transaction_time' => 'required|max:255',
        ]);

                $project = Project::find($request->project_id);
                $project->status = 3;
                $project->save();

        $reply = new Reply;
        $reply->project_id = $request->project_id; 
        $reply->content = Lang::get('main.convert_payment_text_reply') . "<br>" .
                          Lang::get('main.from_bank') . " : " .  $request->from_bank . " <br>  " .  
                          Lang::get('main.to_bank') . " : " .  $request->to_bank . " <br>  " . 
                          Lang::get('main.transaction_date') . " : " .  $request->transaction_date . " <br>  " . 
                          Lang::get('main.transaction_time') . " : " .  $request->transaction_time . " <br>  " .
                          Lang::get('main.full_name') . " : " .  $request->full_name . " <br> "   ; 

        $reply->user_id = Auth::user()->id; 
        $reply->save();

        $project = Project::find($request->project_id);
        $project->reply_at = Carbon::now();
        $project->save();

        $supervisors = User::where('admin',2)->get();
                    if($supervisors->count() > 0)
                    {
                        foreach($supervisors as $super)
                        {
                            $email = $super->email;
                            $sent = Mail::send('emailPaymnetProject', ['userName' => Auth::user()->name , 'projectName' => $project->title ], function ($message) use ($email)
                            {

                                $message->from('no-replay@ksatranslators.com' , 'no-replay KSA Translators');

                                $message->to($email,$name = null);

                                $message->subject("اشعار : هناك عملية تحويل   جديدة - مترجمو السعودية");

                            });
                        }
                    }

        $email =Auth::user()->email;
        $sent = Mail::send('emailPaymnetToUserProject', ['userName' => Auth::user()->name , 'projectName' => $project->title ], function ($message) use ($email)
                            {

                                $message->from('info@ksatranslators.com' , 'KSA Translators');

                                $message->to($email,$name = null);

                                $message->subject("اشعار سداد فاتورة خدمة - مترجمو السعودية");

                            });
                Session::flash('success-toastr',  Lang::get('main.success_payment_transfar_done') );
                return redirect()->route('projects.show',$project->id);  
    }

    public function MakePayProducts($status , Request $request)
    {
        // http://127.0.0.1:8000/success/true?paymentId=PAY-7UW00740F30063455LKNJHIY&token=EC-6JY2874383384360X&PayerID=Q7KCGCGKV2D8S
        if($status == 'true')
        {
            if(
                isset($request->paymentId) && $request->paymentId != '' && 
                isset($request->token) && $request->token != '' && 
                isset($request->PayerID) && $request->PayerID != ''
            )
            {
                $this->SetContext();
                $total = session('total');
                session()->forget('total');

                $paymentId = $request->paymentId;
                $payment = Payment::get($paymentId, $this->apiContext);

                $execution = new PaymentExecution();
                $execution->setPayerId($request->PayerID);

                $transaction = new Transaction();
                $amount = new Amount();
                $details = new Details();

                $details->setShipping(0)
                    ->setTax(0)
                    ->setSubtotal($total);

                $amount->setCurrency('SAR');
                $amount->setTotal($total);
                $amount->setDetails($details);
                $transaction->setAmount($amount);
                $execution->addTransaction($transaction);

                try {
                    $result = $payment->execute($execution, $this->apiContext);
                    try {
                        $payment = Payment::get($paymentId, $this->apiContext);
                    } catch (Exception $ex) {

                        exit(1);
                    }
                } catch (Exception $ex) {
                    exit(1);
                }

                

                $transactionModal = new TransactionModal;
                $transactionModal->payment_id = $payment->id;
                $transactionModal->payment_status = $payment->state;
                $transactionModal->payment_method = $payment->payer->payment_method;
                $transactionModal->payer_email = $payment->payer->payer_info->email;
                $transactionModal->payer_first_name = $payment->payer->payer_info->first_name;
                $transactionModal->payer_last_name = $payment->payer->payer_info->last_name;
                $transactionModal->payer_phone = $payment->payer->payer_info->phone;
                $transactionModal->payment_amount = $payment->transactions[0]->amount->total;
                $transactionModal->save();

                if($payment->state == "approved")
                {
                    foreach($payment->transactions[0]->item_list->items as $item)
                    {
                        
                            $project = Project::find($item->sku);
                            $project->status = 3;
                            $project->save();

                            $transactionModal->project_id = $item->sku;
                            $transactionModal->save();
                            

                        }


                    $supervisors = User::where('admin',2)->get();
                    if($supervisors->count() > 0)
                    {
                        foreach($supervisors as $super)
                        {
                            $email = $super->email;
                            $sent = Mail::send('emailPaymnetProject', ['userName' => Auth::user()->name , 'projectName' => $project->title ], function ($message) use ($email)
                            {

                                $message->from('info@ksatranslators.com' , 'no-replay KSA Translators');

                                $message->to($email,$name = null);

                                $message->subject("اشعار : هناك عملية تحويل سداد جديدة");

                            });
                        }
                    }

                    $sent = Mail::send('emailPaymnetToUserProject', ['userName' => Auth::user()->name , 'projectName' => $project->title ], function ($message) use ($email)
                            {

                                $message->from('info@ksatranslators.com' , 'no-replay KSA Translators');

                                $message->to($email,$name = null);

                                $message->subject("اشعار سداد فاتورة خدمة - مترجمو السعودية");

                            });
                        Session::flash('success-toastr',  Lang::get('main.success_payment_done') );

                }

            }

        }

        return redirect()->route('projects.show',$project->id);
    }

    public function makePayment(Request $request)
    {
        $this->SetContext();
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $items_products = [];

        $carts = Project::find($request->project_id);
        $total = $carts->price;
        
        $item1 = new Item();
        $item1->setName(Project::find($carts->id)->title)
                ->setCurrency('SAR')
                ->setQuantity(1)
                ->setSku(Project::find($carts->id)->id) // Similar to `item_number` in Classic API
                ->setPrice($total);

        $items_products[] = $item1;    

        $itemList = new ItemList();
        $itemList->setItems($items_products);


        $details = new Details();
        $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal($total);

        $amount = new Amount();
        $amount->setCurrency("SAR")
                ->setTotal($total)
                ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Translation Payment description")
            ->setInvoiceNumber(uniqid());

        $baseUrl = url('/');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/success/true")
            ->setCancelUrl("$baseUrl/success/false");   

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction)); 

        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            exit(1);
        } 

        $approvalUrl = $payment->getApprovalLink();

        session(['total' => $total]);
        return Redirect($approvalUrl);
    }

    public function getCheck($id)
    {
        $project = Project::findOrFail($id);
        $title = Lang::get('main.title') . " | " . Lang::get('main.Make_payment_now');
        return view('user.check',compact('project','title'));
    }

    public function checkCoupon($coupon)
    {
        $coupon = Coupon::where('coupon',$coupon)->get()->first();
        if($coupon == null)
        {
            return response()->json(['status_wish' => false, 'message' => Lang::get('main.error_coupon')]);
        }else
        {
            if($coupon->used == 1)
            {
                return response()->json(['status_wish' => false, 'message' => Lang::get('main.used_coupon')]);
            }else
            {
                return response()->json(['status_wish' => true, 'message' => Lang::get('main.success_coupon')]);
            }
            
        }
    }


    public function index()
    {
        $projects = Project::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        $title = Lang::get('main.title') ." | " . Lang::get('main.Projects');
        return view('user.projects',compact('projects','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = ProjectData::get();
        $title = Lang::get('main.title') ." | " . Lang::get('main.Add_new_project');
        return view('user.add_project',compact('datas','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|max:255',
            'tran_language' => 'required|max:255',
            'doc_language' => 'required|max:255',
            'notes' => 'required',
            'recivied_date' => 'required',
            'documents' => 'required',
        ]);

        $project = new Project;
        $project->title = $request->title;
        $project->doc_language = $request->doc_language;
        $project->tran_language = json_encode($request->tran_language);
        $project->doc_content = $request->doc_content;
        $project->notes = $request->notes;
        $project->recivied_date = $request->recivied_date;
        $project->payment_method = $request->payment_method;

        if($request->has('coupon') && $request->coupon != null)
        {
            
            $coupon = Coupon::where('coupon',$request->coupon)->get()->first();
            if($coupon == null)
            {

                Session::flash('error-toastr', Lang::get('main.error_coupon'));
                return redirect()->back();

            }
            else
            {
                if($coupon->used == 1)
                {
                    Session::flash('error-toastr', Lang::get('main.used_coupon'));
                    return redirect()->back();
                    
                }
                $project->coupon = $request->coupon;
                $coupon->used = 1;
                $coupon->save();
            }
        }
        
        $project->status = 1;
        $project->user_id = Auth::user()->id;

        $documentsArray = array();
        foreach($request->documents as $doc)
        {
            
            
            $featured = $doc;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $name = '/uploads/' . $featured_new_name;
            array_push($documentsArray, $name);
        }

        $project->documents = json_encode($documentsArray);
        $project->save();


        $email = User::where('admin',1)->get()->first()->email;
        $sent = Mail::send('emailNewProject', ['userName' => Auth::user()->name , 'projectName' => $project->title ], function ($message) use ($email)
        {

            $message->from('info@ksatranslators.com' , 'info KSA Translators');

            $message->to($email,$name = null);

            $message->subject("طلب ترجمة جديد - مترجمو السعودية");

        });

        $supervisors = User::where('admin',2)->get();

        if($supervisors->count() > 0)
        {
            foreach($supervisors as $super)
            {
                $email = $super->email;
                $sent = Mail::send('emailNewProject', ['userName' => Auth::user()->name , 'projectName' => $project->title ], function ($message) use ($email)
                {

                    $message->from('info@ksatranslators.com' , 'info KSA Translators');

                    $message->to($email,$name = null);

                    $message->subject("طلب ترجمة جديد - مترجمو السعودية");

                });
            }
        }


        Session::flash('infoData',  Lang::get('main.project_send') );
        return redirect()->route('index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        if( !(Auth::user()->id == $project->user_id || Auth::user()->admin == 1 || Auth::user()->admin == 2))
        {
            Session::flash('error-toastr', Lang::get('main.not_access'));
            return redirect()->back();
        }
        $replies = Reply::where('project_id',$id)->get();
        $title = Lang::get('main.title') ." | " . Lang::get('main.Project_Details');
    
        return view('user.project_details',compact('project','replies','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
