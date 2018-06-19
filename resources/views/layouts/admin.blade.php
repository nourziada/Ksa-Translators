<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>لوحة التحكم</title>
    <link rel="icon" type="image/png" href="{{asset('admin_files/img/favicon.png')}}" />
    
    <link href="{{asset('admin_files/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('admin_files/css/icon.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/css/ar.css')}}" rel="stylesheet" class="lang_css arabic">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        #insertImage-1,#insertVideo-1 , #insertFile-1,
        #insertImage-2,#insertVideo-2 , #insertFile-2

        {
            display: none;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
    <!--Start header-->
    <div class="row header_section">
        <div class="col-sm-3 col-xs-12 logo_area bring_right">
            <h1 class="inline-block">لوحة التحكم</h1>
            <span class="glyphicon glyphicon-align-justify bring_left open_close_menu" data-toggle="tooltip"
                  data-placement="right" title="Tooltip on left"></span>
        </div>
        <div class="col-sm-3 col-xs-12 head_buttons_area bring_right hidden-xs">
            
            <div class="inline-block full_screen bring_right hidden-xs">
                <span class="glyphicon glyphicon-fullscreen" data-toggle="tooltip" data-placement="left"
                      title="شاشة كاملة"></span>
            </div>
        </div>
        <div class=" col-sm-4 col-xs-12 user_header_area bring_left left_text">
           

            <div class="user_info inline-block">
                <img src="img/user.jpg" alt="" class="img-circle">
                <span class="h4 nomargin user_name">{{Auth::user()->name}}</span>
                <span class="glyphicon glyphicon-cog"></span>
            </div>
        </div>
    </div>
    <!--/End header-->

    <!--Start body container section-->
    <div class="row container_section">

        <!--Start left sidebar-->
        <div class="user_details close_user_details  bring_left">
            <div class="user_area">
                <img class="img-thumbnail img-rounded bring_right" src="{{asset('admin_files/img/images.jpg')}}">

                <h1 class="h3">{{Auth::user()->name}}</h1>

               

                <p><a href="{{route('show.admin.password')}}">تغيير كلمة المرور</a></p>

                <p>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         تسجيل الخروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </p>
            </div>


        </div>
        <!--/End left sidebar-->

        <!--Start Side bar main menu-->
        <div class="main_sidebar bring_right">
            <div class="main_sidebar_wrapper">
                <form class="form-inline search_box text-center">
                    <div class="form-group">
                        
                    </div>
                </form>

                <ul>
                    <li class="{{ Request::is('admin') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <a href="{{route('admin.index')}}">لوحة التحكم</a>
                    </li>

                @if(Auth::user()->admin == 1)
                    <li class="{{ Request::is('admin/slider') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-barcode"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">الشريط المتحرك</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('slider.create')}}">إضافة شريحة جديدة</a></li>
                                <li><a href="{{route('slider.index')}}">عرض كل الشرائح</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="{{ Request::is('admin/services') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-barcode"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">خدماتنا</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('admin.service',1)}}">بيانات الخدمة الأولى</a></li>
                                <li><a href="{{route('admin.service',2)}}">بيانات الخدمة الثانية</a></li>
                                <li><a href="{{route('admin.service',3)}}">بيانات الخدمة الثالثة</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="{{ Request::is('admin/services') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-barcode"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">اقسام الصفحة الرئيسية</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('admin.section',3)}}">بيانات القسم الأول</a></li>
                                <li><a href="{{route('admin.section',4)}}">بيانات القسم الثاني</a></li>
                                <li><a href="{{route('admin.section',5)}}">بيانات القسم الثالث</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="{{ Request::is('admin/page') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-barcode"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">صفحات الموقع</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('admin.page',1)}}">{{unserialize($firstPageAdmin->title)['ar']}}</a></li>
                                <li><a href="{{route('admin.page',2)}}">{{unserialize($secondPageAdmin->title)['ar']}}</a></li>
                                <li><a href="{{route('admin.page',3)}}">{{unserialize($thirdPageAdmin->title)['ar']}}</a></li>
                                <li><a href="{{route('admin.page',4)}}">{{unserialize($forthPageAdmin->title)['ar']}}</a></li>
                                <li><a href="{{route('admin.page',5)}}">{{unserialize($fifthPageAdmin->title)['ar']}}</a></li>
                            </ul>
                        </div>
                    </li>

                @endif


                    <li class="{{ Request::is('admin/new-projects') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-hdd"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">مشاريع الترجمة</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('admin.projects.new')}}">المشاريع الجديدة</a></li>
                                <li><a href="{{route('admin.projects.payment')}}">المشاريع الجاري ترجمتها</a></li>
                                <li><a href="{{route('admin.projects.submit')}}">المشاريع المسلمة</a></li>
                                <li><a href="{{route('admin.projects.accept')}}">المشاريع المقبولة والمنتهية</a></li>
                            </ul>
                        </div>
                    </li>

                @if(Auth::user()->admin == 1)
                    <li class="{{ Request::is('admin/data') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-barcode"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">معلومات المشاريع</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('data.create')}}">إضافة معلومة ججديدة</a></li>
                                <li><a href="{{route('data.index')}}">عرض كل المعلومات</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-user"></span>
                        <a href="{{route('admin.users')}}">المستخدمين المسجلين</a>
                    </li>

                    <li class="{{ Request::is('admin/supervisor') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-barcode"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">مشرفين الموقع</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('supervisor.create')}}">إضافة مشرف جديدة</a></li>
                                <li><a href="{{route('supervisor.index')}}">عرض كل المشرفين</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="{{ Request::is('admin/coupon') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-barcode"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">الكوبونات</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('coupon.create')}}">إضافة كوبون جديد</a></li>
                                <li><a href="{{route('coupon.index')}}">عرض كل الكوبونات المضافة</a></li>
                            </ul>
                        </div>
                    </li>
                

                    <li class="{{ Request::is('admin/ratings') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-star"></span>
                        <a href="{{route('admin.ratings')}}">التقييمات</a>
                    </li>
                @endif

                </ul>    
                
            </div>
        </div>


        <!--/End side bar main menu-->

        <!--Start Main content container-->
            
            @yield('content')

        <!--/End body container section-->
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->


<script type="text/javascript" src="{{asset('admin_files/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('admin_files/js/bootstrap.min.js')}}"></script>

<script src="{{asset('admin_files/js/js.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
  $(function() {
    $('.editorTextArea').froalaEditor({
        height: 300
    })
  });
</script>


</body>

</html>