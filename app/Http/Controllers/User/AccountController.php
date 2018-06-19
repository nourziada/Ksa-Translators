<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Session;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUser');
    }

    public function updateAccount(Request $request)
    {
    	$user = User::find(Auth::user()->id);
    	$this->validate($request,[
    		'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'mobile' => 'required|max:255|unique:users,mobile,'.$user->id,
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'image' => 'nullable|image',
    	]);

    	
    	$user->name = $request->name;
    	$user->mobile = $request->mobile;
    	$user->country = $request->country;
    	$user->city = $request->city;

    	if($request->has('password') && $request->password != null)
    	{
    		$user->password = bcrypt($request->password);
    	}

    	if($request->has('image') && $request->image != null)
    	{
    		$featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $user->image = '/uploads/' . $featured_new_name;
    	}
    	$user->save();

    	Session::flash('success', Lang::get('main.success_profile'));
        return redirect()->back();


    }
    public function getAccount()
    {
        $title = Lang::get('main.title') ." | " . Lang::get('main.my_account');
    	return view('user.profile',compact('title'));
    }
}
