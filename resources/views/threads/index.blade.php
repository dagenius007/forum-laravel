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
        <div class="col-md-12">
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
                            <h3 class="card__content--title"><a href="/threads/{{$thread->channel->slug}}/{{$thread->slug}}">{{ strlen($thread->title) < 20 ? $thread->title : substr($thread->title ,0,40).'.....' }}</a></h3>
                            <p class="card__content--details"> {{ $thread->counts()
                                < 40 ? $thread->body : substr($thread->body ,0,40).'.....' }} </p>
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
    </div>
</div>
@endsection