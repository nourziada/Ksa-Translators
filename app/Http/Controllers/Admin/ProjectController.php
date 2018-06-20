<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperVisor');
    }

    public function getProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.details',compact('project'));
    }

    
    public function deleteProject(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $project->delete();

        $ratings = Rating::where('project_id',$request->project_id)->get();
        foreach($ratings as $rating)
        {
            $ratingg = Rating::where('project_id',$request->project_id)->get()->first;
            $ratingg->delete();
        }

        Session::flash('success', 'تم حذف المشروع بشكل نهائي');
        return redirect()->back();

    }
    public function submitProjects(Request $request)
    {

        $project = Project::find($request->project_id);
        $project->status = 4;
        $project->save();

        Session::flash('success', 'تم تسليم المشروع بنجاح ، وبإنتظار قبول المشروع من العميل');
        return redirect()->back();
    }

    public function acceptProjects(Request $request)
    {
        $this->validate($request,[
            'price' => 'required|max:255',
        ]);

        $project = Project::find($request->project_id);
        $project->price = $request->price;
        $project->status = 2;
        $project->save();

        $userName = User::find($project->user_id)->name;
        $userEmail = User::find($project->user_id)->email;
        $price = $project->price;
        $projectName = $project->title;

        $email = $userEmail;
        $sent = Mail::send('emailAcceptProject', ['userName' => $userName, 'price' => $price , 'projectName' => $projectName ], function ($message) use ($email)
        {

            $message->from('info@ksatranslators.com' , 'ksatranslators');

            $message->to($email,$name = null);

            $message->subject("قبول طلب الترجمة - مترجمو السعودية");

        });

        Session::flash('success', 'تم قبول المشروع بنجاح  , وتم ارسال اشعار بالدفع الى العميل');
        return redirect()->back();
    }

    public function searchProject(Request $request){
        $this->validate($request,[
                'search' => 'required|string'
            ],
            [
                'search.required' => 'حقل البحث يجب ان لا يكون فارغ',
            ]);

        $search = $request->search;
        $type = $request->type;

        $projects = Project::where('title' , 'like' , '%' .  $search . '%')->paginate(15);

        return view('admin.projects.index',compact('projects','type'));
    }

    public function getAcceptedProjects()
    {
    	$projects = Project::where('status',5)->orderBy('reply_at','desc')->paginate(15);
    	$type = 4;
    	return view('admin.projects.index',compact('projects','type'));
    }

    public function getSubmitProjects()
    {
    	$projects = Project::where('status',4)->orderBy('reply_at','desc')->paginate(15);
    	$type = 3;
    	return view('admin.projects.index',compact('projects','type'));
    }

    public function getPaymentProjects()
    {
    	$projects = Project::where('status',3)->orderBy('reply_at','desc')->paginate(15);
    	$type = 2;
    	return view('admin.projects.index',compact('projects','type'));
    }

    public function getNewProjects()
    {
    	$projects = Project::where('status',1)->orderBy('created_at','desc')->paginate(15);
    	$type = 1;
    	return view('admin.projects.index',compact('projects','type'));
    }
}
