@extends('layouts.website')
@section('content')


        <section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}">{{trans('main.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('main.Add_Your_Project')}}</li>
                </ol>
            </nav>
        </section>

        <section class="about-us mb-3 project-section">
            <div class="row">
                <div class="col">
                    <h3 class="second-title mt-4">
                        {{trans('main.Add_Your_Project')}}:
                    </h3>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8">
                    @include('includes.errors')
                    <form class="project-form" action="{{ route('projects.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                    	{{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="pro-name">{{trans('main.Type_title_service')}}
                                    	<span class="small-f">{{trans('main.Example')}}</span>
                                    </label>

                                    <input type="text" name="title" class="form-control" required placeholder="" id="pro-name" data-parsley-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-19">
                                    <label for="exampleFormControlSelect1">{{trans('main.Document_v_language')}}</label>
                                    <select id="input-draggable" name="doc_language" data-parsley-required="true">
                                        <option value=""></option>
                                        <option value="العربية">العربية</option>
                                        <option value="English">English</option>
                                        <option value="German">German</option>
                                        <option value="Turkish">Turkish</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="pro-l">{{trans('main.Languages_to_translate')}}</label>
                                    <br>
                                    <span style="font-size: 13px;color: #000;">( {{trans('main.Type_the_language_enter')}} )</span>

                                    <select id="mulit_lang2" name="tran_language[]">
                                        <option value="العربية">العربية</option>
                                        <option value="English">English</option>
                                        <option value="German">German</option>
                                        <option value="Turkish">Turkish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="d-c">{{ trans('main.Document_v_content')}}</label>
                                    <br>
                                    <br>
                                    <span style="padding-top: 15px;"> &nbsp; <br></span>
                                    <select name="doc_content" class="form-control" required id="d-c">
                                        <option value="عام">{{ trans('main.public')}}</option>
                                        <option value="قناون">{{ trans('main.law')}}</option>
                                        <option value="علاج">{{ trans('main.Therapy')}}</option>
                                        <option value="تقرير">{{ trans('main.report')}}</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{trans('main.Notes_to_translator')}}</label>
                                    <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="3" data-parsley-required="true" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="d-t">{{trans('main.Delivery_time')}}
                                    <span class="small-f">{{trans('main.translation_time_pages')}}</span>
                                    </label>
									<input type="number" data-parsley-required="true" name="recivied_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-38">
                                    <label for="p-m">{{trans('main.Payment_method')}}</label>
                                    <select name="payment_method" required class="form-control" id="p-m">
                                        <option value="PayPal">PayPal</option>
                                        <option value="Master Card">Master Card</option>
                                        <option value="Visa">Visa</option>
                                        <option value="{{trans('main.Convert_on_account')}}">{{trans('main.Convert_on_account')}}</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="file-loading">
                                    <input class="inputUploadDataProject" data-parsley-required="true" id="input-20" type="file" name="documents[]" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="v-code">{{trans('main.Do_discount_code')}}</label>
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" id="v-code" aria-label="Recipient's username" name="coupon" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                    

                                        <a href="#" class="btn btn-outline-secondary"  onclick="checkCode(event)">{{trans('main.Check_the_code')}}</a>
                                        
                                    
                                    </div>

                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" required type="checkbox" value="" id="defaultCheck1" data-parsley-required-message="{{ trans('main.you_must_accept_term') }}">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{trans('main.agree_to_the')}} <a href="#">{{trans('main.terms_of_use')}}</a>
                                    </label>
                                </div>
                                <button id="submit_project" type="submit" class="btn btn-primary" style="margin-top: 15px;">{{trans('main.Submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="project-content">

                    @forelse($datas as $data)
                        <h4>{{unserialize($data->title)[LaravelLocalization::getCurrentLocale()]}}</h4>
                        <p>{{unserialize($data->desc)[LaravelLocalization::getCurrentLocale()]}}</p>
                    @empty
                    @endforelse
                        
                    </div>
                </div>
            </div>

   
        </section>

<style type="text/css">
    .parsley-required
    {
        background-color: #f2dede;
        padding: 8px;
    }
</style>
@stop