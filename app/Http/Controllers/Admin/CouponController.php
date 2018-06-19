<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;


class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $coupons = Coupon::orderBy('created_at','desc')->paginate(15);
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
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
            'coupon' => 'required|max:255',
            'discount' => 'required|max:255',
        ],[
            'coupon.required' => 'حقل الكوبون يجب ان لا يكون فارغ',
            'coupon.max' => 'حقل الكوبون يجب ان لا يزيد عن 255 حرف',
            'discount.required' => 'حقل نسبة الخصم  يجب ان لا يكون فارغ',
            'discount.max' => 'حقل نسبة الخصم يجب ان لا يزيد عن 255 حرف',
        ]);

        $coupon = new Coupon;
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        Session::flash('success', 'تمت اضافة الكوبون بنجاح');
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
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit',compact('coupon'));
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
            'coupon' => 'required|max:255',
            'discount' => 'required|max:255',
        ],[
            'coupon.required' => 'حقل الكوبون يجب ان لا يكون فارغ',
            'coupon.max' => 'حقل الكوبون يجب ان لا يزيد عن 255 حرف',
            'discount.required' => 'حقل نسبة الخصم  يجب ان لا يكون فارغ',
            'discount.max' => 'حقل نسبة الخصم يجب ان لا يزيد عن 255 حرف',
        ]);


        $coupon = Coupon::find($id);
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        Session::flash('success', 'تمت تعديل  الكوبون بنجاح');
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
        $slider = Coupon::find($id);
        $slider->delete();

        Session::flash('success', 'تم حذف الكوبون  بنجاح');
        return redirect()->back();
    }
}
