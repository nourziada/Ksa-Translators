<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Page;
use App\Rating;
use App\Section;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Session;

class HomeController extends Controller
{
	public function postContact(Request $request)
	{
		$this->validate($request,[
                'name' => 'required',
                'email' => 'required|email',
                'title' => 'required',
                'msg' => 'required',
            ]);

        $name = $request->name;
        $email = $request->email;
        $title = $request->title;
        $msg = $request->msg;
       
       Mail::send('emailContactUs', ['name' => $name, 'email' => $email , 'title' => $title , 'msg' => $msg ], function ($message) use ($email)
        {

            $message->from($email, $name= null);

            $message->to('eng.nour.ziadaa@gmail.com' ,'Admin');

            $message->subject("Contact Us Message From Your WebSite");

        });

        Session::flash('success-toastr',  Lang::get('main.Message_send') );
        return redirect()->back();
	}
	public function getContact()
	{
        $title = Lang::get('main.title') ." | " . Lang::get('main.contact');
		$active = 'contact';
		return view('contact',compact('active','title'));
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

        $title = Lang::get('main.title') ." | " . unserialize($data->title)[LaravelLocalization::getCurrentLocale()];

        $active = $id;

        return view('page',compact('data','active','title'));
	}
    public function index()
    {
    	$active = "index";
        $title = Lang::get('main.title') ." | " . Lang::get('main.Home');
    	$sliders = Slider::orderBy('created_at','desc')->get();
    	$firstSlide = Slider::orderBy('created_at','desc')->first();

    	$firstService = Section::first();
    	$secondService = Section::skip(1)->first();
    	$thirdService = Section::skip(2)->first();

    	$firstSection = Section::skip(3)->first();
    	$secondSection = Section::skip(4)->first();
    	$thirdSection = Section::skip(5)->first();

        $ratings = Rating::orderBy('created_at','desc')->take(8)->get();
    	return view('index',compact('sliders','firstSlide','firstService','secondService','thirdService','firstSection','secondSection','thirdSection','active','ratings','title'));
    }
}
