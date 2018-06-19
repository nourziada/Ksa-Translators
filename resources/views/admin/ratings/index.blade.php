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
                        <li class="bring_right"><a href="{{route('admin.ratings')}}">التقييمات المضافة</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                    <h1 class="heading_title">عرض كل التقييمات المضافة على المشاريع</h1>

                    @include('includes.errors')


                    <div class="wrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td style="width: 20%;">اسم المستخدم</td>
                                <td>عنوان المشروع</td>
                                <td>التقييم</td>
                                <td>التعليق</td>
                                <td>الحالة</td>
                                <td>التحكم</td>
                            </tr>

                        @if(count($ratings) > 0)
                            <?php $no=1; ?>
                            @foreach($ratings as $rating)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ \App\User::find($rating->user_id)->name}}</td>
                                <td>{{ \App\Project::find($rating->project_id)->title}}</td>
                                <td>{{ $rating->rating}}</td>
                                <td>
                                    
                                    <button class="btn btn-info btn-xs" data-title="show" data-toggle="modal" data-target="#showModal{{$rating->id}}" ><span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                   
                                </td>

                                <td>
                                    @if($rating->verified == 1)
                                        <span class="btn btn-success">مفعل</span>
                                    @else
                                        <span class="btn btn-danger">غير مفعل</span>
                                    @endif
                                </td> 

                                <td>
                                    
                                    <button class="btn btn-info btn-xs" data-title="edit" data-toggle="modal" data-target="#editModal{{$rating->id}}" ><span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                   
                                </td>
                            </tr>


                            <!-- Modal -->
                            <div id="showModal{{$rating->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">نص التعليق</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>{{$rating->review}}</p>
                                  </div>
                                  <div class="modal-footer">

      
                                  </span>  
                                    
                                  </div>
                                </div>

                              </div>
                            </div>

                            <!-- Modal -->
                            <div id="editModal{{$rating->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                            <form action="{{ route('admin.users.ratings') }}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="rating_id" value="{{$rating->id}}">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">تعديل نص التعليق</h4>
                                  </div>
                                  <div class="modal-body">
                                    <textarea class="form-control" name="review">{{$rating->review}}</textarea>
                                  </div>
                                  <div class="modal-footer">

                                        <button class="btn btn-success" type="submit">تعديل</button>
                                  </span>  
                                    
                                  </div>
                                </div>
                            </form>

                              </div>
                            </div>




                            @endforeach


                            
                        @else

                        @endif
                        </table>

                        <nav class="text-center">
                            {{$ratings->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>





@stop