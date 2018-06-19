@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="{{route('coupon.index')}}">الكوبونات</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">تعديل بيانات الكوبون</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('coupon.update',$coupon->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">الكوبون</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$coupon->coupon}}" id="input0" name="coupon" placeholder="الكوبون" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">نسبة الخصم</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="input0" name="discount" value="{{$coupon->discount}}"  placeholder="أدخل رقم نسبة الخصم بالنسبة المؤية %" required>
                                </div>
                            </div>

                            



                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">تعديل  الكوبون </button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop