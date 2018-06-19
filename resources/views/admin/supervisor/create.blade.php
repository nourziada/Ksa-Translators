@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="{{route('supervisor.index')}}">المشرفين</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">إضافة مشرف جديد</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('supervisor.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">اسم المشرف</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input0" name="name" placeholder="الاسم كاملاً للمشرف" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="input2" name="email" placeholder="البريد الالكتروني للمشرف الذي من خلاله يقوم بتسجيل دخوله" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">الدولة</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input3" name="country" placeholder="دولة المشرف " required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">كلمة مرور المشرف</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input3" name="password" placeholder="كلمة مرور المشرف" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">تأكيد كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input3" name="password_confirmation" placeholder="تأكيد كلمة المرور للمشرف" required>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">إضافة المشرف</button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop