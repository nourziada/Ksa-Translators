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
                        <li class="bring_right"><a href="{{route('data.index')}}">المعلومات التعريفية الخاصة بالمشروع</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                    <h1 class="heading_title">عرض كل المعلومات التعريفية للمشروع</h1>

                    @include('includes.errors')

                    <div class="wrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td style="width: 30%;">العنوان العربية</td>
                                <td>العنوان English</td>
                                <td>التحكم</td>
                            </tr>

                        @if(count($datas) > 0)
                            <?php $no=1; ?>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ unserialize($data->title)['ar']}}</td>

                                <td>{{ unserialize($data->title)['en']}}</td>
                               
                                <td>
                                    
                                    <a href="{{route('data.edit',['id' => $data->id])}}" class="btn btn-info btn-xs" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></a> 
                                   
                                    <button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#deleteModal{{$data->id}}" ><span class="glyphicon glyphicon-trash"></span>
                                    </button> 
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="deleteModal{{$data->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">حذف المعلومات !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>هل انت متأكد من قيامك بحذف ا هذه المعلومة</p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('data.destroy',['id' => $data->id])}}" method="post">
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

                        
                    </div>
                </div>
            </div>
        </div>





@stop