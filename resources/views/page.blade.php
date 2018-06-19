@extends('layouts.website')
@section('content')

<section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">{{trans('main.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{unserialize($data->title)[LaravelLocalization::getCurrentLocale()]}}</li>
                </ol>
            </nav>
        </section>

        <section class="about-us">
           {!! unserialize($data->content)[LaravelLocalization::getCurrentLocale()] !!}
        </section>

@stop