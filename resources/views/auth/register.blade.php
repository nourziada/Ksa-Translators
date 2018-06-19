@extends('layouts.website')
@section('content')

<section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">{{trans('main.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('main.Sign_In_Up')}}</li>
                </ol>
            </nav>
        </section>

        <section class="about-us">
            
            
            <div class="row contact-form">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <h3 class="second-title mt-4 text-uppercase" style="font-weight: 900;">
                               {{trans('main.Sign_In')}}
                            </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-md-12 top-address">
                            <p class="paragraph main-text-login">{{trans('main.Sing_Up_text')}}</p>
                            
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input required type="email" class="form-control" placeholder="{{trans('main.email')}}" name="email" aria-label="E-mail" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input required type="password" name="password" class="form-control" placeholder="{{trans('main.password')}}" aria-label="Title" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-lg-12 quik-link-list" style="margin-bottom: 15px;">
                                <a href="javascript:void(0)" style="color: #000;">{{trans('main.forgot_password')}}</a>
                            </div>
                            
                            <div class="col-lg-12 mb-5">
                                <button type="submit" class="btn btn-primary text-uppercase">{{trans('main.Sign_In')}}</button>
                            </div>
                        </div>
                    </form>


                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <h3 class="second-title mt-4 text-uppercase" style="font-weight: 900;">
                                {{trans('main.Sign_Up')}}
                            </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-md-12 top-address">
                            <p class="paragraph main-text-login">{{trans('main.Sing_Up_text')}}</p>
                            
                        </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input required type="text" name="name" class="form-control" placeholder="{{trans('main.Name')}}" aria-label="Name" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input required type="email" class="form-control" placeholder="{{trans('main.email')}}" name="email" aria-label="E-mail" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input required type="text" name="mobile" class="form-control" placeholder="{{trans('main.mobile')}}" aria-label="Title" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <input required type="text" name="country" class="form-control" placeholder="{{trans('main.Country')}}" aria-label="Title" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker"></i></span>
                                    </div>
                                    <input required type="text" name="city" class="form-control" placeholder="{{trans('main.City')}}" aria-label="Title" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input required type="password" name="password" class="form-control" placeholder="{{trans('main.password')}}" aria-label="Title" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input required type="password" name="password_confirmation" class="form-control" placeholder="{{trans('main.password_confirmation')}}" aria-label="Title" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-images"></i></span>
                                    </div>
                                    <input type="file" class="form-control" placeholder="Image" aria-label="Title" name="image" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 mb-5">
                                <button type="submit" class="btn btn-primary text-uppercase">{{trans('main.Sign_Up')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

@stop