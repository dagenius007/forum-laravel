@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="searchpage">
                <div class="searchpage__header">
                    <div>
                        <p class="searchpage__header--title">Search for Keywords "{{ucfirst($q)}}"</p>
                        <p>Found {{ count($results) }}</p>
                    </div>
                    <div class="searchpage__header--input">
                        <form action="/search" method="post">
                            {{ csrf_field() }}
                            <div class="search__input">
                                <input type="text" name="search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach($results as $result)
                <div class="searchpage__result">
                    <div class="col-md-4">
                        <img class="search__result--img" src="{{ asset('img/'.$result->thread_img)}}" alt="">
                    </div>
                    <div class="col-md-8 searchpage__details">
                        <div class="">
                            <div class="searchpage__title">
                                <a href=""> {{ $result->title }} by <span>{{$result->creator->name}}</span></a>
                            </div>
                            <div class="searchpage__body">
                                {{ $result->body }}
                            </div>
                            <div class="searchpage__footer">
                                <p><i>{{$result->channel->name}}</i></p>
                                <p>{{$result->created_at}}</p>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            {{-- {{$results}} --}}
        </div>
    </div>
</div>
@endsection