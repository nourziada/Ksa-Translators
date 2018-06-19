<footer class="footer m--30">
    <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
            <h3 style="font-size: 19px;">{{trans('main.Fast_Link')}}</h3>
            <ul class="list-unstyled quik-link-list t">
                <li><a href="{{route('page',1)}}">{{unserialize($firstPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}}</a></li>
                <li><a href="{{route('page',2)}}">{{unserialize($secondPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a></li>
                <li><a href="{{route('page',3)}}">{{unserialize($thirdPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a></li>

            </ul>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
            <h3 style="font-size: 19px;">{{trans('main.More_Link')}}</h3>
            <ul class="list-unstyled quik-link-list">
                <li><a href="{{route('page',4)}}"> {{unserialize($forthPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}}</a></li>
                <li><a href="{{route('page',5)}}"> {{unserialize($fifthPageAdmin->title)[LaravelLocalization::getCurrentLocale()]}} </a></li>
                <li><a href="{{route('contact')}}">  {{trans('main.contact')}}</a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-6 text-center" >
            <h3 style="font-size: 19px;">{{trans('main.Follow_Us')}}</h3>
            <ul class="list-inline text-center footer-social">
                <li class="list-inline-item">
                    <a class="face-link" href="#">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="twit-link" href="#">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="linken-link" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-6 d-flex align-self-center">
            <div>
            <img class="footer-logo" src="{{asset('images/logo.png')}}" alt="">
            </div>
        </div>


    </div>
</footer>