@extends('layouts.website')
@section('content')

<section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}"> {{trans('main.Home')}} </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('main.contact')}}</li>
                </ol>
            </nav>
        </section>

        <section class="about-us">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <h3 class="second-title mt-4">
                        {{trans('main.contact')}}:
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1 top-address">
                    <p class="paragraph main-text-contact">{{trans('main.contact_text')}}</p>
                   
                </div>
            </div>
            <div class="row contact-form">
                <div class="col-lg-10 col-md-12 offset-lg-1 ">
                	@include('includes.errors')
                    <form action="{{ route('contact.send') }}" method="post">
                    	{{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input required type="text" class="form-control" placeholder="{{trans('main.Name')}}" aria-label="Name" name="name" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input required type="email" class="form-control" placeholder="{{trans('main.email')}}" aria-label="E-mail" aria-describedby="basic-addon1" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-comment"></i></span>
                                    </div>
                                    <input required type="text" class="form-control" placeholder="{{trans('main.Title')}}" aria-label="Title" name="title" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea required class="form-control" placeholder="{{trans('main.Message')}}" name="msg"  id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-5">
                                <button type="submit" class="btn btn-primary">{{trans('main.Submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

@stop