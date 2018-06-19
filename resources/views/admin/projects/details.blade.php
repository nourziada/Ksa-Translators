@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>
                        
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">بيانات وتفاصيل المشروع</h1>


                    @include('includes.errors')


                    <div class="form" >
                       
                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">اسم المشروع</label>
                                <div class="col-sm-10">

                                    <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;">{{$project->title}}</p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">لغة المستند / الفيديو</label>
                                <div class="col-sm-10">

                                    <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;">{{$project->doc_language}}</p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">اللغات التي ترغب بالترجمة اليها</label>
                                <div class="col-sm-10">
                                    <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;">
                                        
                                        @forelse(json_decode($project->tran_language) as $lang)
                                        <span > - {{$lang}} <span> </span> <span> </span></span>
                                        @empty
                                        @endforelse
                                    
                                    </p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">محتوى المستند / الفيديو</label>
                                <div class="col-sm-10">
                         
                                    <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;">{{$project->doc_content}}</p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">ملاحظات للمترجم</label>
                                <div class="col-sm-10">
                                  
                                    <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;">{{$project->notes}}</p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">وقت التسليم</label>
                                <div class="col-sm-10">
                            
                                     <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;">{{$project->recivied_date}}</p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">طريقة الدفع </label>
                                <div class="col-sm-10">

                                    <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;">{{$project->payment_method}}</p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">كوبون الخصم </label>
                                <div class="col-sm-10">

                                    <p class="bg-primary" style="line-height: 2.5;padding-right: 15px;"> 

                                        @if($project->coupon != null)
                                        {{$project->coupon}}
                                        @else
                                            لا يوجد
                                            @endif
                                    </p>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">الملفات المرفقة للترجمة</label>
                                <div class="col-sm-10">
                                    <ul>
                                        @forelse(json_decode($project->documents,true) as $doc)
                                        <li class="bg-success" style="line-height: 2.5;"><a href="{{$doc}}" target="_blank">ملف مستند مرفق</a></li>
                                        <br>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                             <br>
                            <br>

                             <br>
                            <br>

                             <br>
                            <br>

                            

                    </div>
                </div>
            </div>
        </div>

@stop