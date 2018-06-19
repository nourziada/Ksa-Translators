@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="{{ route('admin.users') }}">المستخدمين المسجلين</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">بيانات المستخدم</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('admin.users.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">الاسم كاملاً</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="name" id="input4" placeholder="الاسم كاملاً" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" style="height: unset;" name="email" id="input4" placeholder="البريد الالكتروني" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">رقم الجوال</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="mobile" id="input4" placeholder="رقم الجوال" value="{{$user->mobile}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">الدولة</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="country" id="input4" placeholder="الدولة" value="{{$user->country}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">المدينة</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="city" id="input4" placeholder="المدينة" value="{{$user->city}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">إعادة تعيين كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" style="height: unset;" name="password" id="input4" placeholder="اعادة تعيين كلمة المرور للمستخدم">
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">تعديل البيانات</button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@stop