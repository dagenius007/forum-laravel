<?php use App\Follower; ?>
@extends('layouts.app')

@section('content')
<thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template>
<div class="container">
    <div class="row">
        <div class="col-md-12 topic">
            <div class="breadcrumbs">HOME / {{ $thread->channel->name }} / Topic </div>
            <div class="topic__img" style="background-image: url({{ $thread->thread_img ? asset('img/'.$thread->thread_img) : asset('img/forum_bg.jpeg') }})"></div>
            <div class="row">
                <div class="col-md-2">
                    <div class="topic__profile-pic">
                        <img src="{{ asset('img/users/'.$thread->creator->display_img )}}" alt="{{ $thread->creator->name }}">
                    </div>
                    @if( $thread->creator)
                        <div class="topic__user-info">
                            <a href="/profiles/{{ $thread->creator->id }}">{{ $thread->creator->name}}</a>
                            @if(Auth::user()->name != $thread->creator->name )
                                <following :isfollowing="{{ json_encode(Follower::yourFollowing($thread->creator->id))  }}" :user="{{ json_encode($thread->creator->id)}}"></following>
                            @endif  
                        </div>
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="topic__content">
                        <div class="topic__header">
                            <h4>{{ $thread->title }}</h4>
                            <div class="option">
                                <div class="option__date">{{ $thread->created_at }}</div>
                                @can('update', $thread)
                                    <div class="option__edit">
                                        <form action="{{$thread->path()}}" method='POST'>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type='submit' class='btn btn--primary'>Delete Thread</button>
                                        </form>
                                    </div>
                                    <div class="option__delete">
                                        <a href="/threads/edit/{{ $thread->id }}" class='btn btn--primary'>Edit Thread</a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="topic__body">{{ $thread->body }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="topic__replies">
                    <replies @added='repliesCount++' @removed='repliesCount--'></replies>
                </div>
            </div>
        </div>
    </div>
</div>
</thread-view>

@endsection