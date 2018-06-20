@extends('layouts.app')

@section('content')
	<div class="profile">
		<div class="bredcrumbs">HOME / USER PROFILE</div>
		<div class="profile__cover" style="background-image: url({{ asset('img/bg_1.jpg') }})"></div>
		<div class='container'>
			<div class="row">
				<div class="col-md-12">
					<div class="profile__info">
						<img src="{{ asset('img/1528841908.jpg') }}" alt="">
						<h3> 
							{{ $profileUser->name }}
							<div class="status" style=" background-color: {{ Auth::check() ?  '#1CFF0C' : 'red' }} "></div>
						</h3>
						<p>{{ $profileUser->created_at->diffForHumans() }}</p>
						<div>
							<button class="btn btn--gradient btn-lg">Follow</button>
						<a href="{{ url('/profile/'.Auth::check().'/settings')}}"><i class="fa fa-cog" aria-hidden="true"></i></a>
						</div>
						
					</div>	
				<hr>
					<div class="profile__details">
						<div>
							<p>FOLLOWERS</p>
							<h3>100</h3>
						</div>
						<div>
							<p>FOLLOWING</p>
							<h3>100</h3>
						</div>
						<div>
							<p>POST</p>
						<h3>{{ count($profileUser->threads())}}</h3>
						</div>

					</div>
					<div class="profile__comments">
						<h4>Activites</h4>
						<div class="profile__activities">
							{{-- <div class="profile__activity"> --}}
								@forelse($activities as $date => $activity)
								{{-- <h3 class='page-header'>{{ $date }}</h3> --}}
								@foreach($activity as $record)
									@if(view()->exists("profiles.activities.{$record->type}"))
										@include("profiles.activities.{$record->type}", ["activity" => $record])
									@endif
								@endforeach
								@empty
									<p>There is no activity for this user yet.</p>
								@endforelse 
							{{-- </div> --}}
						</div>
					</div>
				</div>
							
							{{-- <div class='page-header'>
								<h1>
									{{ $profileUser->name }}
									<small>User since {{ $profileUser->created_at->diffForHumans() }}</small>
								</h1>
							</div>
				
							@forelse($activities as $date => $activity)
								<h3 class='page-header'>{{ $date }}</h3>
				
								@foreach($activity as $record)
									@if(view()->exists("profiles.activities.{$record->type}"))
										@include("profiles.activities.{$record->type}", ["activity" => $record])
									@endif
								@endforeach
							@empty
								<p>There is no activity for this user yet.</p>
							@endforelse --}}
				
							@if($profileUser == Auth::user() )
							<div> <a href="/threads/create">Created Thread</a> </div>
							@endif
						</div>
						
					</div>
			</div>
	</div>


@endsection