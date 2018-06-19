@extends('layouts.website')
@section('content')

 <section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}"> {{trans('main.Home')}} </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('main.Projects')}}</li>
                </ol>
            </nav>
        </section>

        <section class="about-us projects">

        @forelse($projects as $project)
            <div class="border-bottom ">
                <div class="row ">

                    <div class="col-md-9 col-sm-8">
                        <h5 class="text-capitalize pt-3"><a href="{{ route('projects.show',$project->id)}}">{{$project->title}}</a></h5>
                        <p class="project-sub-details">
                            <span><i class="far fa-calendar-alt"></i> {{$project->created_at->diffForHumans()}}</span>
                            <span class="project-comment"><i class="far fa-comment-dots"></i> {{\App\Reply::where('project_id',$project->id)->get()->count()}} {{trans('main.replyies')}}</span></p>
                    </div>
                    <div class="col-md-3 col-sm-4 d-flex align-self-center justify-content-center">
                        <div class="project-case text-center">

                        @if($project->status == 1)
                            <p class="d-inline-block m-0 bg-warning">

                                {{trans('main.Waiting_admin')}}
                            </p>
                        @elseif($project->status == 2)
                        	<p class="d-inline-block m-0 bg-info">

                                <a href="{{route('user.check.project',$project->id)}}" style="color: #fff;">{{trans('main.Waiting_for_payment')}}</a>
                            </p>
                        @elseif($project->status == 3)
                        	<p class="d-inline-block m-0 bg-primary">

                                {{trans('main.in_Translation')}}
                            </p>
                        @elseif($project->status == 4)
                        	<p class="d-inline-block m-0 bg-success">

                                {{trans('main.Waiting_for_delivery')}}
                            </p>
                        @elseif($project->status == 5)
                        	<p class="d-inline-block m-0 bg-success">

                                {{trans('main.delivered')}}
                            </p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty

            <div class="border-bottom " style="min-height: 300px;">
                <h4 style="padding-top: 50px;text-align: center;">{{ trans('main.no_projects')}}</h4>
            </div>
        @endforelse
            
        </section>

@stop