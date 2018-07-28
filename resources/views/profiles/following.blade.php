@extends('layouts.app')

@section('content')
	<div class="following">
		<div class="container">
			<div class="bredcrumbs" style="padding: 30px;padding-left:0px;font-size: 1.3em;color:#0A0A8D;">HOME / USER PROFILE</div>
        </div>

        <div class="profile__cover" style="background-image: url({{ asset('img/bg_1.jpg') }})"></div>
        
        <div class="container">
            <div class="following__header">
                Followings
            </div>

            @foreach($followings as $following)
                <div class='row'>
                    <div class="col-md-7">
                        {{ $following->name }}
                    </div>
                    <div class="col-md-5">
                            <a href="{{ route('user.unfollow', $following->id) }}">Unfollow</a>
                    </div>
                </div>
            @endforeach
        </div>
        
	</div>


@endsection