<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;
use Session;

class AdminSuperController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function getRatings()
    {
    	$ratings = Rating::orderBy('created_at','desc')->paginate(15);
    	return view('admin.ratings.index',compact('ratings'));
    }

    public function updateRating(Request $request)
    {
    	$this->validate($request,[
    		'review' => 'required',
    	],[
    		'review.required' => 'نص التعليق مطلوب أن لا يكون فارغ',
     	]);

     	$rating = Rating::find($request->rating_id);
     	$rating->review = $request->review;
     	$rating->save();

     	Session::flash('success', 'تم تعديل نص التعليق بنجاح');
        return redirect()->back();

    }
}
