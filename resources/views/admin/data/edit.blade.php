@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="{{route('data.index')}}">المعلومات التعريفية الخاصة بالمشروع</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">إضافة معلومة تفصيلية جديدة</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('data.update',$data->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">عنوان المعلومة بالعربية</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input0" name="title[ar]" placeholder="أدخل عنوان المعلومة باللغة العربية"  value="{{ unserialize($data->title)['ar']}}"required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">تفاصيل المعلومة بالعربية</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="desc[ar]" placeholder="أخل تفاصيل المعلومة التي ستظهر في صفحة  إضافة مشروع جديد باللغة العربية"  required>{{ unserialize($data->desc)['ar']}}</textarea>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">Title En</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input0" name="title[en]" placeholder="Enter Title here in English " value="{{ unserialize($data->title)['en']}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">Description En</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="desc[en]" placeholder="Enter  Description here in English "  required>{{ unserialize($data->desc)['en']}}</textarea>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">تعديل  المعلومات </button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop