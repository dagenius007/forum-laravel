@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row height">
        <div class="settings">
            <button data-toggle="modal" data-target="#changepassword" class="btn btn--primary">Change Password</button>
            <div class="settings__card">
                <form method="POST" action='/profiles/{{$user->slug}}/update' enctype="multipart/form-data">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form__field">
                            <div class='form__group'>
                                <img src="{{ asset('img/users/'.$user->display_img) }}" width="200" alt="" id="user-img">
                                <div>Change Image<input type="file" class="form__input form__input--img" name="display_img" id="display_img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-pad">
                        <div class="form__field">
                            <div class='form__group'>
                                <input type='text' class='form__input' name='name' value="{{$user->name}}" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form__field">
                            <div class='form__group'>
                                <input type='email' class='form__input' name='email' value="{{ $user->email }}" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form__field">
                            <div class='form__group'>
                                <button type='submit' class="form__btn form__btn--lg form__btn--full-width">Edit</button>
                            </div>
                        </div>

                        @if(count($errors))
                        <ul class='alert alert-danger'>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/profile/{{$user->id}}/password" method="post">
                        {{ csrf_field() }}
                        <div class="form__field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form__group">
                                <input id="password" type="password" class="form__input" name="password" placeholder="Password" required>                                @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
                            </div>
                        </div>
                        <div class="form__field">
                            <div class="form__group">
                                <input id="password-confirm" type="password" class="form__input" name="password_confirmation" placeholder="Confrim Password"
                                    required>
                            </div>
                        </div>
                        <div class="form__field">
                            <button type="submit" class="form__btn form__btn--lg form__btn--full-width">
                                Change
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection