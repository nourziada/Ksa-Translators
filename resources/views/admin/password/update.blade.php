@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="{{route('show.admin.password')}}">تحديث بيانات كلمة المرور</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">تحديث بيانات كلمة المرور</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('update.admin.password')}}" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">كلمة المرور القديمة</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input0" name="old_password" placeholder="أدخل كلمة المرور القديمة" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">كلمة المرور الجديدة</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input2" name="password" placeholder="أدخل كلمة المرور الجديدة" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">تأكيد كلمة المرور الجديدة</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input3" name="password_confirmation" placeholder="أعد كتابة كلمة المرور الجديدة" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">تحديث كلمة المرور</button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop