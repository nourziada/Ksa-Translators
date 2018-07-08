<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use App\Section;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => [
            'index',
            'showPassword',
            'changePassword',
        ]]);

        $this->middleware('isSuperVisor', ['only' => [
            'index',
            'showPassword',
            'changePassword',
        ]]);


    }

    public function updateSection(Request $request)
    {
        
        $this->validate($request,[
                'title' => 'required|max:255',
                'description' => 'required|max:450',
                'link' => 'required|max:255',
                
            ],[
                'title.required' => 'يجب أن تقوم بإدخال عنوان رجاءً',
                'title.max' => 'عنوان  يجب أن لا يزيد عن 255 حرف',
                'description.required' => 'يجب أن تقوم بإدخال محتوى  رجاءً',
                'description.max' => 'يجب أن لا يتجاوز المحتوى 450 حرف',

            ]);
        $data = Section::skip($request->id)->first();
        $data->title = serialize($request->title);
        $data->description = serialize($request->description);
        $data->link = $request->link;

        if($request->hasFile('image') && $request->image != null){
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $data->image = '/uploads/' . $featured_new_name;
        }

        $data->save();

        Session::flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }
    

    public function getSection($id)
    {
        $data = Section::skip($id)->first();
        return view('admin.sections.update',compact('data','id'));
    }

    public function searchUsers(Request $request){
        $this->validate($request,[
                'search' => 'required|string'
            ],
            [
                'search.required' => 'حقل البحث يجب ان لا يكون فارغ',
            ]);

        $search = $request->search;

        $users = User::where('name' , 'like' , '%' .  $search . '%')->orwhere('email' ,  'like' ,'%' . $search . '%')->paginate(20);

        return view('admin.users.index',compact('users'));
    }

    public function updateUsers(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'mobile' => 'required|max:255',
                'country' => 'required|max:255',
                'city' => 'required|max:255',
                
            ],[
                'name.required' => 'يجب ان تقوم بإدخال اسم المتسخدم رجاءُ',
                'name.max' => 'اسم المستخدم يجب أن لا يزيد عن 255 حرف',
                'mobile.required' => 'يجب أن تقوم بإدخال رقم جوال رجاءً',
                'mobile.max' => 'رقم الجوال يجب أن لا يزيد عن 255 حرف',
                'country.required' => 'يجب أن تقوم بإدخال الدولة رجاءً',
                'country.max' => 'الدولة يجب أن لا يزيد عن 255 حرف',
                'city.required' => 'يجب أن تقوم بإدخال المدينة رجاءً',
                'city.max' => 'المدينة يجب أن لا يزيد عن 255 حرف',

            ]);

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->country = $request->country;
        $user->city = $request->city;

        if($request->has('password') && $request->password != null)
        {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Session::flash('success', 'تم تحديث بيانات المستخدم بنجاح');
        return redirect()->back();

    }
    public function getUpdateUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.update',compact('user'));
    }

    public function getUsers()
    {
        $users = User::where('admin',0)->orderBy('created_at','desc')->paginate(15);
        return view('admin.users.index',compact('users'));
    }

    public function updatePage(Request $request)
    {
        $this->validate($request,[
                'title' => 'required|max:255',
                'content' => 'required',
                
            ],[
                'title.required' => 'يجب أن تقوم بإدخال عنوان رجاءً',
                'title.max' => 'عنوان  يجب أن لا يزيد عن 255 حرف',
                'content.required' => 'يجب أن تقوم بإدخال محتوى  رجاءً',

            ]);
        if($request->id == 1)
        {
            $data = Page::first();
        }elseif($request->id == 2)
        {
            $data = Page::skip(1)->first();
        }elseif($request->id == 3)
        {
            $data = Page::skip(2)->first();
        }elseif($request->id == 4)
        {
            $data = Page::skip(3)->first();
        }elseif($request->id == 5)
        {
            $data = Page::skip(4)->first();
        }

        $data->title = serialize($request->title);
        $data->content = serialize($request->content);
        $data->save();

        Session::flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }

    public function getPage($id)
    {
        if($id == 1)
        {
            $data = Page::first();
        }elseif($id == 2)
        {
            $data = Page::skip(1)->first();
        }elseif($id == 3)
        {
            $data = Page::skip(2)->first();
        }elseif($id == 4)
        {
            $data = Page::skip(3)->first();
        }elseif($id == 5)
        {
            $data = Page::skip(4)->first();
        }

        return view('admin.pages.update',compact('data','id'));
    }

    public function updateServices(Request $request)
    {
        $this->validate($request,[
                'title' => 'required|max:255',
                'description' => 'required|max:500',
                
            ],[
                'title.required' => 'يجب أن تقوم بإدخال عنوان رجاءً',
                'title.max' => 'عنوان الشريحة يجب أن لا يزيد عن 255 حرف',
                'description.required' => 'يجب أن تقوم بإدخال محتوى  رجاءً',
                'description.max' => 'محتوى  يجب أن لا يزيد عن 500 حرف',

            ]);

        if($request->id == 1)
        {
            $data = Section::first();
        }elseif($request->id == 2)
        {
            $data = Section::skip(1)->first();
        }elseif($request->id == 3)
        {
            $data = Section::skip(2)->first();
        }

        $data->title = serialize($request->title);
        $data->description = serialize($request->description);
        $data->save();

        Session::flash('success', 'تم تحديث بيانات الخدمة بنجاح');
        return redirect()->back();
    }
    public function getServices($id)
    {
        if($id == 1)
        {
            $data = Section::first();
        }elseif($id == 2)
        {
            $data = Section::skip(1)->first();
        }elseif($id == 3)
        {
            $data = Section::skip(2)->first();
        }

        return view('admin.services.update',compact('data','id'));
         
    }

    public function index()
    {
    	return view('admin.index');
    }

    // Methods for Passwords 

    public function showPassword(){
        return view('admin.password.update');
    }

    
    public function changePassword(Request $request){
        $this->validate($request , [
                'old_password' => 'required',
                'password' => 'required|min:6|confirmed|different:old_password',
                'password_confirmation' => 'required',
            ],[
                'old_password.required' => 'يجب أن تقوم بإخال كلمة المرور القديمة',
                'password.required' => 'يجب أن تقوم بإدخال كلمة المرور الجديدة',
                'password.min' => 'يجب أن لا تقل كلمة المرور عن 6 أحرف وأرقام',
                'password.confirmed' => 'يجب أن تتطابق كلمة المرور الجديدة مع إعادة كلمة المرور',
                'password.different' => 'يجب أن تختلف كلمة المرور الجديدة عن كلمة المرور القديمة',
                'retype_new_password.required' => 'يجب أن تقوم بإعادة كلمة المرور الجديدة',
            ]);


        $user = Auth::user();

        $u_user = User::find(Auth::id());

        if(Hash::check($request->old_password, $user->password)){
            $u_user->password =  Hash::make($request->password);
            $u_user->save();

            Session::flash('success' , 'تم تحديث كلمة المرور بنجاح');
            return redirect()->back();
        }else {
            Session::flash('error' , 'كلمة المرور القديمة لا تتطابق مع كلمة المرور في سجلاتنا');
            return redirect()->back();
        }
    }
}
