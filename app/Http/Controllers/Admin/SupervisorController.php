<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Session;

class SupervisorController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function searchUsers(Request $request){
        $this->validate($request,[
                'search' => 'required|string'
            ],
            [
                'search.required' => 'حقل البحث يجب ان لا يكون فارغ',
            ]);

        $search = $request->search;

        $users = User::where('name' , 'like' , '%' .  $search . '%')->orwhere('email' ,  'like' ,'%' . $search . '%')->paginate(15);

        return view('admin.supervisor.index',compact('users'));
    }

    public function index()
    {
        $users = User::where('admin',2)->orderBy('created_at','desc')->paginate(15);
        return view('admin.supervisor.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supervisor.create');
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
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                
            ],[
                'name.required' => 'يجب أن تقوم بإدخال اسم المشرف رجاءً',
                'name.max' => 'اسم المشرف يجب ان لا يتجاوز 255 حرف',
                'email.required' => 'يجب أن تقوم بإدخال البريد الالكتروني رجاءً',
                'email.email' => 'البريد الالكتروني يجب ان يكون حقيقي من نوع ايميل',
                'email.max' => 'البريد الالكتروني يجب ان لا تجاوز 255 حرف',
                'email.unique' => 'هذا البريد الالكتروني مسجل مسبقاً',
                'password.required' => 'يجب أن تقوم بإدخال كلمة المرور الجديدة',
                'password.min' => 'يجب أن لا تقل كلمة المرور عن 6 أحرف وأرقام',
                'password.confirmed' => 'يجب أن تتطابق كلمة المرور الجديدة مع إعادة كلمة المرور',
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->mobile = 'text';
        $user->country = $request->country;
        $user->city = 'text';
        $user->image = 'text';
        $user->admin = 2;

        $user->save();

        Session::flash('success', 'تمت اضافة المشرف بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.supervisor.edit',compact('user'));
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
        $user = User::find($id);

        $this->validate($request,[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'password' => 'nullable|string|min:6|confirmed',
                
            ],[
                'name.required' => 'يجب أن تقوم بإدخال اسم المشرف رجاءً',
                'name.max' => 'اسم المشرف يجب ان لا يتجاوز 255 حرف',
                'email.required' => 'يجب أن تقوم بإدخال البريد الالكتروني رجاءً',
                'email.email' => 'البريد الالكتروني يجب ان يكون حقيقي من نوع ايميل',
                'email.max' => 'البريد الالكتروني يجب ان لا تجاوز 255 حرف',
                'email.unique' => 'هذا البريد الالكتروني مسجل مسبقاً',
                'password.min' => 'يجب أن لا تقل كلمة المرور عن 6 أحرف وأرقام',
                'password.confirmed' => 'يجب أن تتطابق كلمة المرور الجديدة مع إعادة كلمة المرور',
            ]);

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = 'text';
        $user->country = $request->country;
        $user->city = 'text';
        $user->image = 'text';

        if($request->has('password') && $request->password != null)
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Session::flash('success', 'تمت تعديل المشرف بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('success', 'تم حذف بيانات المشرف بنجاح');
        return redirect()->back();
    }
}
