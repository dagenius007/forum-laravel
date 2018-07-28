@extends('layouts.app')

@section('content')

            <div class="loginform">
                <div class="loginform__logo">
                    <img src="" alt="">
                </div>
                <div class="loginform__card animated fadeIn slower delay-4s">
                    {{-- <div class="col-md-12"> --}}
                        <form class="form" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form__field{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                                    <div class="form__group">
                                        <span><i class="fa fa-user-o form__icon" aria-hidden="true"></i></span>
                                        <input id="email" type="email" class="form__input" name="email" value="{{ old('email') }}" required placeholder="Email">
                                    </div>
                                   

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                              
                            </div>

                            <div class="form__field{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{-- <div class="col-md-6"> --}}
                                    <div class="form__group">
                                        <span> <i class="fa fa-key form__icon" aria-hidden="true"></i></span>
                                        <input id="password" type="password" class="form__input" name="password" placeholder="Password" required>
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                {{-- </div> --}}
                            </div>

                            

                            <div class="form__field">
                                    <button type="submit" class="form__btn form__btn--lg form__btn--full-width">
                                        Login
                                    </button>
                            </div>
                        </form>
                        <div class="loginform__account"><a href="/register">Create Account</a> </div>
                    </div>
                {{-- </div> --}}
                <div class="loginform__footer">
                    <div class="checkbox">
                       <label>
                             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                    <div>
                        <a class=" checkbox add_color" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                                
                </div>
            </div>
@endsection
