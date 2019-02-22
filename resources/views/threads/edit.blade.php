{{-- 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Thread</div>

                <div class="panel-body">


                    <form method="POST" action='/threads/update/{{ $title->id }}' enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class='form-group'>
                            <label for='title'>Title:</label>
                            <input type='text' class='form-control' name='title' value="{{ $title->title }}" required>
                        </div>

                        <div class='form-group'>
                            <label for='channel_id'>Choose a Category:</label>
                            <select name='channel_id' id='channel_id' class='form-control' required>
                            <option value='{{ $title->channel->id }}'>{{$title->channel->name}}</option>
                                @foreach($categories as $category)
                                    <!-- associate channel id and remember selected channel -->
                                    <option value="{{ $category->id }}" {{ old('channel_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class='form-group'>
                            <label for='title'>Image</label>
                            <input class='form-control' name="thread_img" type="file">
                        </div>



                        <div class='form-group'>
                            <label for='body'>Body:</label>
                            <textarea name='body' id='body' class='form-control' rows='8' required>{{ $title->body }}</textarea>
                        </div>

                        <div class='form-group'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                        </div>

                        @if(count($errors))
                        <ul class='alert alert-danger'>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}} 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="thread">
            <div class="thread__card">
                <form method="POST" action='/threads/update/{{ $thread->id }}' enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    <div class='form__field'>
                        <div class="form__group form__select">
                            <select name='channel_id' class='form__select--thread form__input' required>
                                <option value='{{ $thread->channel->id }}'>{{$thread->channel->name}}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('channel_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                            <img src="{{asset('img/'.$thread->thread_img)}}" alt="" width="100%" height="200" id="thread-img">
                            <div class="create">Choose an Image<input type="file" class="form__input form__input--img" name="thread_img" id="thread_img"></div>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                            <input type='text' class='form__input' name='title' value="{{ $thread->title }}" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                            <textarea name='body' id='body' class='form__input' rows='8' required placeholder="Write your Post">{{ $thread->body }}</textarea>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form-group'>
                            <button type='submit' class='form__btn form__btn--lg form__btn--full-width'>Edit Thread</button>
                        </div>
                    </div>
                    @if(count($errors))
                    <ul class='alert alert-danger'>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>
@endsection