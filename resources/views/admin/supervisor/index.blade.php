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
                        <li class="bring_right"><a href="{{route('supervisor.index')}}">المشرفين</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                    <h1 class="heading_title">عرض كل المشرفين الموثقين</h1>

                    @include('includes.errors')

                    <div class="col-xs-8 col-xs-offset-2">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                            </div>
                            <form action="{{ route('admin.supervisor.search') }}" method="get">
                                <input type="text" class="form-control" name="search" placeholder="بحث عن مشرف باسم المستخدم او بالبريد الالكتروني ...">
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
                                <td style="width: 30%;">الاسم كاملاً</td>
                                <td>البريد الالكتروني</td>
                                <td>الدولة</td>
                                <td>التحكم</td>
                            </tr>

                        @if(count($users) > 0)
                            <?php $no=1; ?>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->country}}</td>                               
                                <td>
                                    
                                    <a href="{{route('supervisor.edit',['id' => $user->id])}}" class="btn btn-info btn-xs" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></a> 

                                    <button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#deleteModal{{$user->id}}" ><span class="glyphicon glyphicon-trash"></span>
                                    </button> 
                                   
                                </td>
                            </tr>

                            <div id="deleteModal{{$user->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">حذف المشرف !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>هل أنت متأكد من حذفك لهذه المشرف نهائياً</p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('supervisor.destroy',['id' => $user->id])}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
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
                            {{$users->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>





@stop