@extends('layouts.admin')

@section('content')

        <!-- All Sliders -->

        <div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.index')}}">الصفحة الرئيسية</a></li>

                        @if($type == 1)
                            <li class="bring_right"><a href="">المشاريع المضافة جديداً</a></li>
                        @elseif($type == 2)
                            <li class="bring_right"><a href="">المشاريع المدفوعة والجاري ترجتمها</a></li>
                        @elseif($type == 3)
                            <li class="bring_right"><a href="">المشاريع التي تم تسليمها</a></li>
                        @elseif($type == 4)
                            <li class="bring_right"><a href="">المشاريع المقبولة والمنتهية</a></li>
                        @endif
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                        @if($type == 1)
                            <h1 class="heading_title">عرض كل المشاريع المضافة جديداً</h1>
                        @elseif($type == 2)
                            <h1 class="heading_title">عرض كل المشاريع التي تم تسديد قيمتها ، والجاري ترجمتها</h1>
                        @elseif($type == 3)
                            <h1 class="heading_title">المشاريع التي تم تسليمها ، وبإنتظار قبول العميل</h1>
                        @elseif($type == 4)
                            <h1 class="heading_title">المشاريع التي تم قبولها من العميل ، والمنتهية</h1>
                        @endif
                    

                    @include('includes.errors')

                    <div class="col-xs-8 col-xs-offset-2">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                            </div>
                            <form action="{{ route('admin.projects.search') }}" method="get">
                                <input type="hidden" name="type" value="{{$type}}">
                                <input type="text" class="form-control" name="search" placeholder="بحث عن مشروع ...">
                            </form>        
                            
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>

                    <div class="wrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td style="width: 10%;">تاريخ الاضافة</td>
                                <td>عنوان المشروع</td>
                                <td>المستخدم صاحب المشروع</td>
                                <td>وقت التسليم</td>
                                <td>كود الخصم</td>
                                @if($type != 1)
                                <td>السعر</td>
                                @endif
                                <td>التحكم</td>
                            </tr>

                        @if(count($projects) > 0)
                            <?php $no=1; ?>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$project->created_at->toDateString()}}</td>
                                <td>{{ $project->title}}</td>
                                <td>{{ \App\User::find($project->user_id)->name}}</td>
                                <td>{{ $project->recivied_date}}</td>
                                <td>@if($project->coupon != null)
                                    {{$project->coupon}}
                                    @else
                                        لا يوجد
                                    @endif 
                                </td>
                                @if($type != 1)
                                <td>{{ $project->price}}</td>
                                @endif
                                                             
                                <td>
                                
                                @if($type == 1)
                                    <a href="{{ route('admin.project.details',$project->id)}}" class="btn btn-info btn-xs" data-title="Edit"><span class="glyphicon glyphicon-eye-open"></span></a> 
                                @else

                                    <a href="{{ route('projects.show',$project->id)}}" target="_blank" class="btn btn-info btn-xs" data-title="Edit"><span class="glyphicon glyphicon-eye-open"></span></a> 

                                @endif

                                @if($type == 1)
                                    <button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#acceptModal{{$project->id}}" >قبول المشروع</span>
                                    </button>
                                @elseif($type == 2)
                                    <button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#submitModal{{$project->id}}" >تسليم المشروع</span>
                                    </button>
                                @endif


                                <button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#deleteModal{{$project->id}}" ><span class="glyphicon glyphicon-trash"></span>
                                </button> 
                                   
                                </td>
                            </tr>

                            <div id="acceptModal{{$project->id}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <form action="{{ route('admin.accept.project')}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="project_id" value="{{$project->id}}">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">قبول المشروع</h4>
                                      </div>
                                      <div class="modal-body">
                                        <input class="form-control" type="number" name="price" placeholder="أدخل سعر هذا المشروع رجاءً">
                                      </div>
                                      <div class="modal-footer">

                                      <span>
                                                                                
                                            
                                            <button class="btn btn-success" type="submit">قبول</button>
                                        </form>
                                      </span>  
                                        
                                      </div>
                                    </div>

                                  </div>
                            </div>

                            <div id="submitModal{{$project->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <form action="{{ route('admin.submit.project')}}" method="post">
                                    {{ csrf_field() }}
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">تسليم المشروع !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>هل انت متأكد من انهاء المشروع وتسليمه للعميل</p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                        <button class="btn btn-success" type="submit">تسليم المشروع</button>
                                    </form>
                                  </span>  
                                    
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div id="deleteModal{{$project->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">حذف المشروع !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>هل أنت متأكد من حذفك لهذه المشروع بشكل نهائي</p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('admin.delete.project')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="project_id" value="{{$project->id}}">
                                        <button class="btn btn-danger" type="submit">حذف</button>
                                    </form>
                                  </span>  
                                    
                                  </div>
                                </div>

                              </div>
                            </div>


                            @endforeach


                            
                        @else

                        @endif
                        </table>

                        <nav class="text-center">
                            {{$projects->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>





@stop