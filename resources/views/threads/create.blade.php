@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="thread">
            <div class="thread__card">
                <form method="POST" action='/threads/store' enctype="multipart/form-data" class="form">
                        {{ csrf_field() }}
                    <div class='form__field'>
                        <div class="form__group form__select">
                            <select name='channel_id' class='form__select--thread form__input' required>
                                <option value=''>Choose one category</option>
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
                                <img src="" alt="" width="100%" height="200" id="thread-img">
                                <div class="create" >Choose an Image<input type="file" class="form__input form__input--img" name="thread_img" id="thread_img"></div>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                            <input type='text' class='form__input' name='title' value="{{ old('title') }}" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                            <textarea name='body' id='body' class='form__input' rows='8' required placeholder="Write your Post">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form-group'>
                                <button type='submit' class='form__btn form__btn--lg form__btn--full-width'>Create Thread</button>
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