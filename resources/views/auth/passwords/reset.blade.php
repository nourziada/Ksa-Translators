@extends('layouts.website')
@section('content')

<section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">{{trans('main.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('main.Reset_Password_reset')}}</li>
                </ol>
            </nav>
        </section>

        <section class="about-us">
            
            @include('includes.errors')
            <div class="row contact-form">
                
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <h3 class="second-title mt-4 text-uppercase" style="font-weight: 900;">
                               {{trans('main.Reset_Password_reset')}}
                            </h3>
                        </div>
                    </div>


                    <form method="POST" action="{{ route('password.request') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="token" value="{{ $token }}">

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

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input required type="password" name="password_confirmation" class="form-control" placeholder="{{trans('main.password_confirmation')}}" aria-label="Title" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 mb-5">
                                <button type="submit" class="btn btn-primary text-uppercase">{{trans('main.Reset_Password')}}</button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </section>

@stop