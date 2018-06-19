@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="{{route('slider.index')}}">الشريط المتحرك</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">إضافة شريحة متحركة جديدة</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">عنوان الشريحة العربية</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input0" name="title[ar]" placeholder="عنوان الشريحة باللغة العربية" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">النص التوضيحي العربية</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="desc[ar]" placeholder="النص التوضيحي باللغة العربية" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">رابط </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input3" name="link" placeholder="رابط " required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">صورة الشريحة</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" style="height: unset;" name="image" id="input4">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">Slide Title En</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input0" name="title[en]" placeholder="Enter Slide Title here in English " required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">Slide Description En</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="desc[en]" placeholder="Enter Slide Description here in English" required>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">إضافة الشريحة</button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop