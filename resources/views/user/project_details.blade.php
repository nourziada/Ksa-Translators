@extends('layouts.website')
@section('content')

<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css" media="all">

		<section class="breadcrumb-section mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}">{{trans('main.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('main.Project_Details')}}</li>
                </ol>
            </nav>
        </section>

        <section class="project-details bg-gry">
            <div class="row">
                <div class="col-lg-4 order-lg-1">
                    <div class="project-card bg-white mb-4">
                        <div class="container border-bottom">
                            <div class="row">
                                <div class="col">
                                    <h3 class="dark-blue-color pt-2 pb-1">{{trans('main.project_card')}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="container pt-2">
                            <div class="row">
                                <div class="col">
                                    <p><span>{{trans('main.Delivery_time')}}:</span> {{trans('main.in_some_days')}} {{$project->recivied_date}} {{trans('main.in_days_some')}}</p>

                                    <p><span>{{trans('main.Date_of_application_creation')}}:</span> {{$project->created_at->toDateString()}}</p>

                                    <p><span>{{trans('main.Project_Budget')}}:</span> {{$project->price}} {{trans('main.SR')}}</p>
                                    <p><span>{{trans('main.project_status')}}:</span> 
                                        @if($project->status == 1)
                                            {{trans('main.Waiting_admin')}}
                                        @elseif($project->status == 2)
                                            <a href="{{route('user.check.project',$project->id)}}">{{trans('main.Waiting_for_payment')}}</a>
                                    	@elseif($project->status == 3)
                                    		{{trans('main.in_Translation')}}
                                    	@elseif($project->status == 4)
                                    		{{trans('main.Waiting_for_delivery')}}
                                    	@elseif($project->status == 5)
                                    		{{trans('main.delivered')}}
                                    	@endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                @if($project->status == 4 && Auth::user()->admin == 0)
                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#acceptProjectModal">{{trans('main.Accept_Project')}}</button>
                @endif
                </div>
                <div class="col-lg-8 order-lg-0">
                    <div class="project-details-card bg-white">
                        <div class="container border-bottom">
                            <div class="row">
                                <div class="col">
                                    <h3 class="dark-blue-color pt-2 pb-1">{{$project->title}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="container pt-2">
                            <div class="row">
                                <div class="col">
                                    <p>
                                        {{$project->notes}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-comment-card bg-white mt-4">
                        <div class="container border-bottom">
                            <div class="row">
                                <div class="col">
                                    <h3 class="dark-blue-color pt-2 pb-1">{{trans('main.Replies')}}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- start comment container  -->

                    @forelse($replies as $reply)
                        <div class=" pt-2 container border-bottom">
                                <div class="row">
                                    <div class="col">
                                        <div class="media">
                                            <img class="mr-3 media-img img-thumbnail" src="
                                            @if(\App\User::find($reply->user_id)->admin == 0)
                                            	{{\App\User::find($reply->user_id)->image}}
                                            @else
                                            	{{asset('images/logo.png')}}
                                            @endif
                                            "
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="m-0">{{\App\User::find($reply->user_id)->name}}</h5>
                                                <p class="m-0"><i class="far fa-calendar-alt"></i> {{$reply->created_at->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                        <p class="comment-desc">
                                            {!! nl2br($reply->content) !!}

                                        </p>

                                    @if($reply->files != null)

                                    	@forelse(json_decode($reply->files,true) as $file)
                                        <p class="file-in-comment"><i class="far fa-file-alt"></i> <a
                                                    href="{{$file}}" download="file-name">{{trans('main.attached_file')}}</a></p>
                                        @empty
                                        @endforelse
                                    @endif
                                    </div>
                                </div>
                        </div>
                    @empty
                    @endforelse
                        <!-- End comment  -->
                        
                    </div>

                    <div class="project-add-comment bg-white mt-4">
                        <div class="container border-bottom">
                            <div class="row">
                                <div class="col">
                                    <h3 class="dark-blue-color pt-2 pb-1">{{trans('main.Add_Reply_Now')}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="container pt-2">
                            <form action="{{ route('user.add.reply') }}" method="post" enctype="multipart/form-data">
                            	{{csrf_field()}}
                            	<input type="hidden" name="project_id" value="{{$project->id}}">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('main.Message')}}</label>
                                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" required></textarea>
                            </div>
                                <p>
                                <button class="btn btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    {{trans('main.Attach_files')}}
                                </button>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <div class="file-loading">
                                            <input class="inputUploadDataProject2" type="file" name="documents[]" multiple>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-2 mb-4">{{trans('main.Add_Reply')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="acceptProjectModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">{{trans('main.Accept_Project')}}</h4>
		      </div>
		      <form action="{{ route('user.add.rating')}}" method="post">
		      	{{csrf_field()}}
		      	<input type="hidden" name="project_id" value="{{$project->id}}">
		      <div class="modal-body">
		      	<div class="col-md-12" style="text-align: center;">
		        <div class="starss">

																    <input class="star1 star-5" id="star-5" type="radio" name="star" value="5" />
																    <label class="star1 star-5" for="star-5"></label>
																    <input class="star1 star-4" id="star-4" type="radio" name="star" value="4"/>
																    <label class="star1 star-4" for="star-4"></label>
																    <input class="star1 star-3" id="star-3" type="radio" name="star" value="3"/>
																    <label class="star1 star-3" for="star-3"></label>
																    <input class="star1 star-2" id="star-2" type="radio" name="star" value="2"/>
																    <label class="star1 star-2" for="star-2"></label>
																    <input class="star1 star-1" id="star-1" type="radio" name="star" value="1"/>
																    <label class="star1 star-1" for="star-1"></label>

																</div>
																</div>
				<textarea class="form-control" name="review" rows="3" placeholder="{{trans('main.add_your_review')}} 100 {{trans('main.max_lenght_text')}}" maxlength="100" required></textarea>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">{{trans('main.Accept_Project')}}</button>
		      </div>
		    </div>
		    </form>

		  </div>
		</div>


		<style type="text/css">
div.starss {
  width: 270px;
  display: inline-block;
}

input.star1 { display: none; }

label.star1 {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star1:checked ~ label.star1:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star1:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star1:before { color: #F62; }

label.star1:hover { transform: rotate(-15deg) scale(1.3); }

label.star1:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
@stop