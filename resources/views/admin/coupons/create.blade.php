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

                    <h1 class="heading_title">إضافة كوبون جديد</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('coupon.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">الكوبون</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input0" name="coupon" placeholder="الكوبون" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">نسبة الخصم</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="input0" name="discount" placeholder="أدخل رقم نسبة الخصم بالنسبة المؤية %" required>
                                </div>
                            </div>

                            



                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">إضافة الكوبون </button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop