<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Session;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $sliders = Slider::orderBy('created_at','desc')->paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
                'title' => 'required|max:40',
                'desc' => 'required|max:100',
                'link' => 'required|url',
                'image' => 'required|image',
                
            ],[
                'title.required' => 'يجب أن تقوم بإدخال عنوان الشريحة رجاءً',
                'title.max' => 'عنوان الشريحة يجب أن لا يزيد عن 40 حرف',
                'desc.required' => 'يجب أن تقوم بإدخال محتوى الشريحة رجاءً',
                'desc.max' => 'محتوى الشريحة يجب أن لا يزيد عن 100 حرف',
                'link.required' => 'يجب أن تقوم بإدخال رابط للخدمة',
                'link.url' => 'يجب أن يكون رابط الخدمة رابط وليس نص عادي',
                'image.required' => 'يجب أن تقوم بإدراج صورة للشريحة',
                'image.image' => 'يجب أن تكون الصورة المرفوعة من نوع صورة',

            ]);

        $slider = new Slider;


        if($request->hasFile('image')){
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $slider->image = '/uploads/' . $featured_new_name;
        }

        $slider->title = serialize($request->title);
        $slider->desc = serialize($request->desc);
        $slider->link = $request->link;

        $slider->save();

        Session::flash('success', 'تمت إضافة الشريحة بنجاح');
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
        $slider = Slider::find($id);
        $title = $slider->title;
        $desc = $slider->desc;
        $link = $slider->link;
        $image = $slider->image;
        return view('admin.slider.edit',compact('title','desc','link','image','id'));
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
        $this->validate($request,[
                'title' => 'required|max:40',
                'desc' => 'required|max:100',
                'link' => 'required|url',
                'image' => 'image',
                
            ],[
                'title.required' => 'يجب أن تقوم بإدخال عنوان الشريحة رجاءً',
                'title.max' => 'عنوان الشريحة يجب أن لا يزيد عن 40 حرف',
                'desc.required' => 'يجب أن تقوم بإدخال محتوى الشريحة رجاءً',
                'desc.max' => 'محتوى الشريحة يجب أن لا يزيد عن 100 حرف',
                'link.required' => 'يجب أن تقوم بإدخال رابط للخدمة',
                'link.url' => 'يجب أن يكون رابط الخدمة رابط وليس نص عادي',
                'image.image' => 'يجب أن تكون الصورة المرفوعة من نوع صورة',

            ]);

        $slider = Slider::find($id);

        if($request->hasFile('image') && $request->image != null){
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $slider->image = '/uploads/' . $featured_new_name;
        }

        
        $slider->title = serialize($request->title);
        $slider->desc = serialize($request->desc);
        $slider->link = $request->link;
        $slider->save();

        Session::flash('success', 'تم تحديث بيانات الشريحة بنجاح');
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
        $slider = Slider::find($id);
        $slider->delete();

        Session::flash('success', 'تم حذف الشريحة بنجاح');
        return redirect()->back();
    }
}
