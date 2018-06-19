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
                        <li class="bring_right"><a href="{{route('slider.index')}}">المستخدمين المسجلين</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                    <h1 class="heading_title">عرض كل المستخدمين المسجلين في الموقع</h1>

                    @include('includes.errors')

                    <div class="col-xs-8 col-xs-offset-2">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                            </div>
                            <form action="{{ route('admin.users.search') }}" method="get">
                                <input type="text" class="form-control" name="search" placeholder="بحث عن مستخدم باسم المستخدم او بالبريد الالكتروني ...">
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
                                <td>الصورة</td>
                                <td>الاسم كاملاً</td>
                                <td>البريد الالكتروني</td>
                                <td>رقم الجوال</td>
                                <td>الدولة</td>
                                <td>التحكم</td>
                            </tr>

                        @if(count($users) > 0)
                            <?php $no=1; ?>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$no++}}</td>
                                <td><img src="{{$user->image}}" class="img-rounded user_thumb"></td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->mobile}}</td>
                                <td>{{ $user->country}}</td>                               
                                <td>
                                    
                                    <a href="{{route('admin.user',['id' => $user->id])}}" class="btn btn-info btn-xs" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></a> 
                                   
                                </td>
                            </tr>


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