@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="">خدماتنا</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">بيانات الخدمات في الصفحة الرئيسية</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('admin.service.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$id}}">
                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">العنوان العربية</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="title[ar]" id="input4" placeholder="عنوان الخدمة باللغة العربية" value="{{unserialize($data->title)['ar']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">محتوى الخدمة العربية</label>
                                <div class="col-sm-10">
                                    
                                    <textarea class="form-control" rows="8" id="input1" placeholder="محتوى الخدمة باللغة العربية" name="description[ar]" required>{{unserialize($data->description)['ar']}}</textarea>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">Title English</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="title[en]" id="input4" placeholder="Service Title in English" value="{{unserialize($data->title)['en']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">Content in English</label>
                                <div class="col-sm-10">
                                    
                                    <textarea class="form-control" rows="8" id="input1" placeholder="Service Content in English" name="description[en]" required>{{unserialize($data->description)['en']}}</textarea>

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