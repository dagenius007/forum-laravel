@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <script>toastr.success('<div><i class="em em-slightly_smiling_face"></i> We are happy to have you here. </div>')</script>
    <script>toastr.success('<div>Feel free to create threads and edit your profile</div>')</script>
@endif

<div class="container home height">
    <div class="row">
        {{-- {{$threads}} --}}
        <div class="col-md-9">
                <div class="home-top">
                    <h1 class="header">LATEST TOPIC</h1>
                    <p><a href="/threads/create" data-toggle="tooltip" data-placement="left" title="Create Thread"><i class="fa fa-plus"></i></a></p>
                </div>
                
                @forelse($threads as $thread)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card__profile" style="background-image: url({{ $thread->thread_img ? asset('img/'.$thread->thread_img) : asset('img/forum_bg.jpeg') }})">
                                <img src="{{ asset('img/users/'.$thread->creator->display_img) }}" alt="">
                            </div>
                            <div class="card__content">
                                <h3 class="card__content--title"><a href="/threads/{{$thread->channel->name}}/{{$thread->id}}">{{ strlen($thread->title) < 20 ? $thread->title : substr($thread->title ,0,40).'.....' }}</a></h3>
                                <p class="card__content--details"> {{ $thread->counts() < 40 ? $thread->body : substr($thread->body ,0,40).'.....' }} </p>
                                <div class="card__content--footer">
                                    <div class="card__content--left">
                                        <p>{{ $thread->channel->name }}</p>
                                    </div>
                                    <div class="card__content--right">
                                        <div class="badge">
                                            {{ $thread->replies_count }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>There are no threads in this category yet. <a href='/threads/create'>Create one!</a></p>
                @endforelse 
           
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
                                <a href="/threads/{{$topic->channel->name}}/{{$topic->id}}" class="white"> {{ strlen($topic->title) < 10 ? $topic->title : substr($topic->title ,0,10).'.....' }}</a>
                        </div>
                        <div class="sidebar__content--details">
                            {{ $topic->counts() < 10 ? $topic->body : substr($topic->body ,0,20).'.....' }}
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
