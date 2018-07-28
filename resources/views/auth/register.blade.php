@extends('layouts.app')

@section('content')
    <div class="loginform">
            <div class="loginform__logo">
                    <img src="" alt="">
            </div>
            <div class="loginform__card animated fadeIn slower delay-4s">
                <form class="form" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form__field{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form__group">
                            <span><i class="fa fa-user-o form__icon" aria-hidden="true"></i></span>
                            <input placeholder="Name" type="text" class="form__input" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form__field{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form__group">
                            <span><i class="fa fa-envelope-o form__icon" aria-hidden="true"></i></span>
                            <input placeholder="Email" type="email" class="form__input" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form__field{{$errors->has('password') ? ' has-error' : '' }}">
                        <div class="form__group">
                            <span><i class="fa fa-key form__icon" aria-hidden="true"></i></span>
                            <input id="password" type="password" class="form__input" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form__field">
                        <div class="form__group">
                                <span><i class="fa fa-key form__icon" aria-hidden="true"></i></span>
                            <input id="password-confirm" type="password" class="form__input" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <div class="form__field">
                        <button type="submit" class="form__btn form__btn--lg form__btn--full-width">
                            Register
                        </button>
                    </div>
                    </form>
                    <div class="loginform__account"><span>Have an account already?</span><a href="/login"> Login</a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
