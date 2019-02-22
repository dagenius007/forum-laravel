<?php use App\Follower; ?> 
@extends('layouts.app') @if(Session::has('edit'))
<script>
	toastr.success('<div><i class="em em-slightly_smiling_face"></i> We are happy to have you here. </div>')

</script>
@endif 
@section('content')
<div class="profile">
	<div class="container">
		<div class="breadcrumbs"><a href="/">HOME</a> / {{ $profileUser->name }}</div>
	</div>
	<div class="profile__cover" style="background-image: url({{ asset('img/bg_1.jpg') }})"></div>
	<div class='container'>
		<div class="row">
			<div class="col-md-12">
				<div class="profile__info">
					<img src="{{ asset('img/users/'. $profileUser->display_img) }}" alt="">
					<h3>
						{{ $profileUser->name }}
						<div class="status" style=" background-color: {{ Auth::check() ?  '#1CFF0C' : 'red' }} "></div>
					</h3>

					@if(Auth::user()->name == $profileUser->name )
						<div> 
						 @if($profileUser->blocked ==  0)
							<a href="/threads/create">Created Thread</a> 
						  @elseif($profileUser->blocked ==  1)
						    <p>You have been blocked</p>
						  @endif
						</div>
						<a href="{{ url('/profiles/'.Auth::user()->slug.'/edit')}}"><i class="fa fa-cog" aria-hidden="true"></i></a> @endif
						@if(Auth::user()->name != $profileUser->name )
							<div>
								<following :isfollowing="{{ json_encode(Follower::yourFollowing($profileUser->id))  }}" :profileuser="{{ json_encode($profileUser->id)}}"></following>
							</div>
						@endif
				</div>

				<hr class="add_color">

				<div class="profile__details">
					<div>
						<p>FOLLOWERS</p>
						<h3 data-toggle="modal" data-target="#followers">{{ count($followers) }}</h3>
					</div>
					<div>
						<p>FOLLOWING</p>
						<h3 data-toggle="modal" data-target="#following">{{ count($followings) }}</h3>
					</div>
					<div>
						<p>POST</p>
						<h3>{{ count($profileUser->threads())}}</h3>
					</div>
				</div>
				<!-- Followers -->
				<div class="modal fade" id="followers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Followers</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							</div>
							<div class="modal-body">
								@forelse($followers as $follower )
									<div class="row" style="border-bottom-width:{{$loop->last ? 0 : '1px'}}">
										<div class="col-md-7">
											{{ $follower->name }}
										</div>
										<div class="col-md-5">
											@if($follower->id != Auth::user()->id)
												<following :isfollowing="{{ json_encode(Follower::yourFollowing($follower->id))  }}" :user="{{ json_encode($follower->id)}}"></following>
											@endif
										</div>
									</div>
								@empty
									<p>No follower</p>
								@endforelse
							</div>
						</div>
					</div>
				</div>


				<div class="modal fade" id="following" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Following</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
							</div>
							<div class="modal-body">
								@forelse($followings as $following )
								<div class="row">
									<div class="col-md-7">
										{{ $following->name }}
									</div>
									<div class="col-md-5">
										@if($following->id != Auth::user()->id)
										<following :isfollowing="{{ json_encode(Follower::yourFollowing($following->id))  }}" :user="{{ json_encode($following->id)}}"></following>
										@endif
									</div>
								</div>
								@empty
								<p>Not following</p>
								@endforelse
							</div>
						</div>
					</div>
				</div>

				<div class="profile__comments">
					<h4>Activites</h4>
					<div class="profile__activities">
						@if($activities != '') @forelse($activities as $date => $activity) @foreach($activity as $record) @if(view()->exists("profiles.activities.{$record->type}"))
	@include("profiles.activities.{$record->type}", ["activity" => $record]) @endif @endforeach @empty
						<p>There is no activity for this user yet.</p>
						@endforelse @endif

					</div>
				</div>
			</div>



		</div>

	</div>
</div>
@endsection