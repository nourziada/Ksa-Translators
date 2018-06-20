<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Project;
use App\Rating;
use App\Reply;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Session;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUser');
    }

    public function addRating(Request $request)
    {
        $rating = new Rating;
        $rating->project_id = $request->project_id;
        $rating->rating = $request->star;
        $rating->review = $request->review;
        $rating->user_id = Auth::user()->id;
        $rating->save();

        $project = Project::find($request->project_id);
        $project->status = 5;
        $project->save();

        Session::flash('success-toastr', Lang::get('main.review_add_succ'));
        return redirect()->back();

    }
    public function addReply(Request $request)
    {
    	$reply = new Reply;
    	$reply->project_id = $request->project_id; 
    	$reply->content = $request->content; 
    	$reply->user_id = Auth::user()->id; 

    	if($request->has('documents') && $request->documents != null)
    	{
    		$documentsArray = array();
    		$files = $request->documents;
	        foreach($files as $file)
	        {
	          	
	            $featured = $file;
	            $featured_new_name = time().$featured->getClientOriginalName();

	            $featured->move('uploads' , $featured_new_name);

	            $name = '/uploads/' . $featured_new_name;
	            array_push($documentsArray, $name);
	        }

	        $reply->files = json_encode($documentsArray);
    	}

    	$reply->save();

        $project = Project::find($request->project_id);
        $project->reply_at = Carbon::now();
        $project->save();

        if(Auth::user()->admin == 0)
        {


            $supervisors = User::where('admin',2)->get();
            if($supervisors->count() > 0)
            {
                foreach($supervisors as $super)
                {
                    $email = $super->email;
                    $sent = Mail::send('emailReplayProject', ['userName' => Auth::user()->name , 'projectName' => $project->title ], function ($message) use ($email)
                    {

                        $message->from('info@ksatranslators.com' , 'info KSA Translators');

                        $message->to($email,$name = null);

                        $message->subject("رد جديد من مستخدم - مترجمو السعودية");

                    });
                }
            }
        }else
        {
            $email = User::find($project->user_id)->email;
            $use_name = User::find($project->user_id)->name;
                    $sent = Mail::send('emailNewSuperReplayProject', ['userName' => $use_name , 'projectName' => $project->title ], function ($message) use ($email)
                    {

                        $message->from('info@ksatranslators.com' , 'KSA Translators');

                        $message->to($email,$name = null);

                        $message->subject("رد جديد على طلب الترجمة - مترجمو السعودية");

                    });
        }
        
        
    	Session::flash('success-toastr', Lang::get('main.reply_add_succ'));
        return redirect()->back();
    	
    }
}
