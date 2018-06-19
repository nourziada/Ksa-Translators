@extends('layouts.website')
@section('content')

<style type="text/css">
    .col-lg-8 .mt-lg-5 {
        margin-top: 0px !important;
    }
</style>

		<section class="main-slider mt-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                @forelse($sliders as $slider)
                    <div class="carousel-item 
                    	@if($slider->id == $firstSlide->id)
                    		active
                    	@endif
                    	">
                        <img class="d-block w-100" src="{{ asset('images/slider/bg' .rand(1,3). '.jpg') }}" alt="First slide">
                        <div class="carousel-caption ">
                            <div class="container">
                                <div class="row">

                                    <div class="col text-center">
                                        <img class="img-fluid" src="{{$slider->image}}" alt="">
                                    </div>
                                    <div class="col text-center d-flex justify-content-center align-self-lg-center">
                                        <div class="slider-content">
                                            <h2>{{unserialize($slider->title)[LaravelLocalization::getCurrentLocale()]}}</h2>
                                            <p> {{unserialize($slider->desc)[LaravelLocalization::getCurrentLocale()]}}
                                            </p>
                                            <a href="{{$slider->link}}" class="slider-btn white-btn">{{trans('main.Git_it_Now')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

        <section class="our-service mt-5">
            <div class="row">
                <div class="col text-center">
                    <h2 class="main-title">
                        {{trans('main.our_services')}}
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row mt-3" style="margin-bottom: 30px;">
                        <div class="col-lg-4">
                            <h3 class="second-title">{{unserialize($firstService->title)[LaravelLocalization::getCurrentLocale()]}}</h3>
                            <p class="text-justify paragraph">{{unserialize($firstService->description)[LaravelLocalization::getCurrentLocale()]}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="second-title">{{unserialize($secondService->title)[LaravelLocalization::getCurrentLocale()]}}</h3>
                            <p class="text-justify paragraph">{{unserialize($secondService->description)[LaravelLocalization::getCurrentLocale()]}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="second-title">{{unserialize($thirdService->title)[LaravelLocalization::getCurrentLocale()]}}</h3>
                            <p class="text-justify paragraph">{{unserialize($thirdService->description)[LaravelLocalization::getCurrentLocale()]}}
                            </p>
                        </div>
                    </div>
                    <div class="row " style="margin-bottom: 30px;">
                        <div class="col-lg-4 pt-2 pt-lg-0">
                            <div class="img-container text-center">
                                <img class="img-fluid" src="{{$firstSection->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 pt-2 pt-lg-0">
                            <h3 class="second-title mt-lg-5">{{unserialize($firstSection->title)[LaravelLocalization::getCurrentLocale()]}}</h3>
                            <p class="text-justify paragraph m-0 ">{{unserialize($firstSection->description)[LaravelLocalization::getCurrentLocale()]}}
                            </p>
                            <a href="{{$firstSection->link}}" class="read-more d-inline-block">{{trans('main.read_more')}} <i
                                        class="fas fa-angle-double-right"></i></a>
                        </div>

                    </div>


                    <div class="row " style="margin-bottom: 30px;">
                        <div class="col-lg-4 pt-2 pt-lg-0 order-lg-1">
                            <div class="img-container text-center">
                                <img class="img-fluid" src="{{$secondSection->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 order-lg-0 pt-2 pt-lg-0">
                            <h3 class="second-title mt-lg-5 ">{{unserialize($secondSection->title)[LaravelLocalization::getCurrentLocale()]}}</h3>
                            <p class="text-justify paragraph m-0 ">{{unserialize($secondSection->description)[LaravelLocalization::getCurrentLocale()]}}
                            </p>
                            <a href="{{$secondSection->link}}" class="read-more d-inline-block">{{trans('main.read_more')}} <i
                                        class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-lg-4 pt-2 pt-lg-0">
                            <div class="img-container text-center">
                                <img class="img-fluid" src="{{$thirdSection->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 pt-2 pt-lg-0">
                            <h3 class="second-title mt-lg-5">{{unserialize($thirdSection->title)[LaravelLocalization::getCurrentLocale()]}}</h3>
                            <p class="text-justify paragraph m-0 ">{{unserialize($thirdSection->description)[LaravelLocalization::getCurrentLocale()]}}
                            </p>
                            <a href="{{$thirdSection->link}}" class="read-more d-inline-block">{{trans('main.read_more')}} <i
                                        class="fas fa-angle-double-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>


        </section>
        <section class="team-slider mt-4 pt-4 pb-4 m--30">
            <div class="row">
                <div class="col text-center">
                    <h2 class="main-title">
                        {{trans('main.Our_Rating')}}
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="owl-carousel .owl-theme rate-slider">
                    @forelse($ratings as $rating)
                        <div class="item">
                            <img class="rate-slider-img" src="{{\App\User::find($rating->user_id)->image}}" alt="">
                            <h3>{{\App\User::find($rating->user_id)->name}}</h3>
                            <div class="product-reviews-summary in-comment">
                                <div class="rating-summary">
                                    <div class="rating-result" title="100%">
                                        <span style="width:{{$rating->rating * 20}}%"></span>
                                    </div>
                                </div>
                            </div>
                            <p>{{$rating->review}} </p>
                        </div>
                    @empty
                    @endforelse
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="lets-start ">
            <h2>{{trans('main.Start_first')}}</h2>
            <p>{{trans('main.Raise_service')}}</p>
        </section>
        <section class="img-banner">
            <img src="{{ asset('images/03.png') }}" alt="">
        </section>
        <section class="latest-news-section">
            <div class="row">
                <div class="col-lg-6 d-flex align-self-center">
                    <p>{{trans('main.Subscribe_newsletter')}}</p>
                </div>
                <div class="col-lg-6">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{trans('main.Your_mail')}}"
                                   aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">{{trans('main.Subscribe')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="img-banner m--30">
            <img src="{{ asset('images/5.jpg') }}" alt="">
        </section>

@stop