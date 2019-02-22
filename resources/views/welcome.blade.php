@extends('layouts.app') 
@section('content') @if(Session::has('message'))
<script>
    toastr.success('<div><i class="em em-slightly_smiling_face"></i> We are happy to have you here. </div>')

</script>
<script>
    toastr.success('<div>Feel free to create threads and edit your profile</div>')

</script>
@endif

<div class="container home height">
    <div class="row">
        {{-- {{$threads}} --}}
        <div class="col-md-9">
            <div class="home-top">
                <h1 class="header">CATEGORIES</h1>
                <p><a href="/threads/create" data-toggle="tooltip" data-placement="left" title="Create Thread"><i class="fa fa-plus"></i></a></p>
            </div>

            @foreach($channels as $channel)
            <div class="col-md-4 ">
                <a href="/threads/{{$channel->slug}}"> 
                        <div class="category hvr-shutter-out-horizontal" style="background-image: url({{ asset('img/category/'.$channel->channel_img) }})">
                            <div class="category__overlay"></div>
                            <div class="category__content">
                                <div class="category__title">{{ucfirst($channel->name)}}</div>
                                <div class="category__number">{{ $channel->countthread($channel->id) > 1 ? $channel->countthread($channel->id) . ' TOPICS' : $channel->countthread($channel->id) . ' TOPIC'  }} </div>
                            </div>
                        </div>
                    </a>
            </div>
            @endforeach
        </div>

        <div class="col-md-3">
            <h1 class="header header--orange">featured topics</h1>
            @foreach($topics as $topic)
            <div class="sidebar">
                <div class="sidebar__img">
                    <img src="{{ $topic->thread_img ? asset('img/'.$topic->thread_img) : asset('img/forum_bg.jpeg') }}" class="featured-img">
                </div>
                <div class="sidebar__content">
                    <div class="sidebar__content--title">
                        <a href="/threads/{{$topic->channel->slug}}/{{$topic->slug}}" class="white"> {{ strlen($topic->title) < 10 ? $topic->title : substr($topic->title ,0,10).'.....' }}</a>
                    </div>
                    <div class="sidebar__content--details">
                        {{ $topic->counts()
                        < 10 ? $topic->body : substr($topic->body ,0,20).'.....' }}
                    </div>
                    <div class="sidebar__content--footer">
                        <p>{{ $topic->channel->name }}</p>
                    </div>
                </div>
            </div>
            <div class="sidebar--border" style="display : {{ $loop->last ? 'none' : 'last' }}"></div>
            @endforeach

        </div>
    </div>
</div>
@endsection