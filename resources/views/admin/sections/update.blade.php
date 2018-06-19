@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        <li class="bring_right"><a href="">الاقسام الرئيسية</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">بيانات القسم صف الصفحة الرئيسية</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('admin.section.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$id}}">
                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">عنوان القسم بالعربية</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="title[ar]" id="input4" placeholder="عنوان القسم باللغة العربية" value="{{unserialize($data->title)['ar']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">محتوى القسم العربية</label>
                                <div class="col-sm-10">
                                    
                                    <textarea class="form-control" rows="4"  placeholder="محتوى القسم باللغة العربية ، يجب ان لا يتجاوز 450 حرف" name="description[ar]" required>{!! unserialize($data->description)['ar'] !!}</textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">صورة القسم</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" style="height: unset;" name="image" id="input4">
                                    <p>إذا كنت لا تريد تغيير الصورة ، فأتركها فارغة</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">الرابط الداخلي</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="link" id="input4" value="{{$data->link}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">Section Title English</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="height: unset;" name="title[en]" id="input4" placeholder="Section Title in English" value="{{unserialize($data->title)['en']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">Content in English</label>
                                <div class="col-sm-10">
                                    
                                    <textarea class="form-control" rows="4"  placeholder="Section Content in English must not larg than 450 character" name="description[en]" required>{!! unserialize($data->description)['en'] !!}</textarea>

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