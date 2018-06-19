@extends('layouts.website')
@section('content')

<section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}"> {{trans('main.Home')}} </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('main.my_profile')}}</li>
                </ol>
            </nav>
        </section>

        <section class="about-us">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <h3 class="second-title mt-4">
                        {{trans('main.my_profile')}}:
                    </h3>
                </div>
            </div>
            

            <div class="row contact-form">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="col-lg-10 col-md-12 offset-lg-1 ">
                	@include('includes.errors')
                    <form action="{{ route('user.account.update') }}" method="post" enctype="multipart/form-data">
                    	{{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input required type="text" name="name" class="form-control" placeholder="{{trans('main.Name')}}" aria-label="Name" value="{{Auth::user()->name}}" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input required type="email" class="form-control" placeholder="{{trans('main.email')}}" name="email" aria-label="E-mail" value="{{Auth::user()->email}}" aria-describedby="basic-addon1" required disabled>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input required type="text" name="mobile" class="form-control" placeholder="{{trans('main.mobile')}}" aria-label="Title" value="{{Auth::user()->mobile}}" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <input required type="text" name="country" class="form-control" placeholder="{{trans('main.Country')}}" aria-label="Title" value="{{Auth::user()->country}}" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker"></i></span>
                                    </div>
                                    <input required type="text" name="city" class="form-control" placeholder="{{trans('main.City')}}" aria-label="Title" value="{{Auth::user()->city}}" aria-describedby="basic-addon1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="{{trans('main.password')}}" aria-label="Title" aria-describedby="basic-addon1" style="    min-width: 60%;">
                                    <p style="color: red">{{trans('main.If_do_to_leave_blank')}}</p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{trans('main.password_confirmation')}}" aria-label="Title" aria-describedby="basic-addon1" style="    min-width: 60%;">
                                    <p style="color: red">{{trans('main.If_do_to_leave_blank')}}</p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-images"></i></span>
                                    </div>
                                    <input type="file" class="form-control" placeholder="Image" aria-label="Title" name="image" aria-describedby="basic-addon1" style="min-width: 60%;">
                                    <br>
                                    <p style="color: red">{{trans('main.If_do_to_leave_blank')}}</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 mb-5">
                                <button type="submit" class="btn btn-primary text-uppercase">{{trans('main.update_profile')}}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>

@stop