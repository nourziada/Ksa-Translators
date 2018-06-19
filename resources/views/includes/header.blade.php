<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand fa-pull-left" href="{{ route('index') }}">
        <img src="{{ asset('images/logo.png')}}" alt="" style="max-height: 85px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        Menu
    </button>

    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

             
                
            <li class="nav-item">
                <a class="nav-link
                @if($active == 'index')
                    Pageactive
                @endif
                " href="{{ route('index') }}">{{trans('main.Home')}} </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link 
                @if($active == 1)
                    Pageactive
                @endif
                " href="{{route('page',1)}}"> {{unserialize($firstPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link 
                @if($active == 2)
                    Pageactive
                @endif
                " href="{{route('page',2)}}"> {{unserialize($secondPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link 
                @if($active == 3)
                    Pageactive
                @endif
                " href="{{route('page',3)}}"> {{unserialize($thirdPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link 
                @if($active == 4)
                    Pageactive
                @endif
                " href="{{route('page',4)}}"> {{unserialize($forthPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a>
            </li>

            @auth
            <li class="nav-item ">
                <a class="nav-link 
                @if($active == 5)
                    Pageactive
                @endif
                " href="{{route('page',5)}}"> {{unserialize($forthPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a>
            </li>
            @else

            @endauth
            
            <li class="nav-item">
                <a class="nav-link
                @if($active == 'contact')
                    Pageactive
                @endif
                " href="{{route('contact')}}"> {{trans('main.contact')}}</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{trans('main.language')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedUrl('en')}}">
                                    English
                                </a>
                            @else
                                <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedUrl('ar')}}">
                                    العربية
                                </a>
                            @endif  

                </div>
            </li>

        </ul>
        <ul  class="navbar-nav ">

        @auth

            @if(Auth::user()->admin == 0)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle add-project-btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu account_dropbonw" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('projects.create') }}">
                        {{trans('main.new_trans_request')}}
                    </a>

                    <a class="dropdown-item" href="{{route('projects.index')}}">
                        {{trans('main.My_Projects')}}
                    </a>

                    <a class="dropdown-item" href="{{route('user.account')}}">
                        {{trans('main.my_account')}}
                    </a>


                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         {{trans('main.logout')}}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </p>

                </div>
            </li>

            @else
                <li class="nav-item ">
                    <a class="nav-link add-project-btn" href="{{ route('admin.index') }}"> Control Panel</a>
                </li>
            @endif

        @else
            <li class="nav-item ">
                <a class="nav-link add-project-btn sign_up_header" href="{{ route('login') }}"> {{trans('main.Sign_Up')}}</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link add-project-btn" href="{{ route('login') }}"> {{trans('main.Add_your_project')}}</a>
            </li>
        @endauth
        </ul>
    </div>
</nav>