@extends('layouts.default')


@section('title','CityHub:Login')

@section('content')
    <div class="padding container row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group col-md-8 col-md-offset-4">
                <h2>Login</h2>
            </div>
            <div>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="login-form">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                </form>
            </div>
            <div class="form-group col-md-8 col-md-offset-4">
                <p>
                    Don't have an account?

                    <a class="btn btn-link" href="{{ route('register') }}">
                            Sign Up
                    </a>
                </p>
                <a class="btn btn-block btn-social btn-google" href="/login/google">
                    <span class="fa fa-google"></span> Sign in with Google
                </a>
                <a class="btn btn-block btn-social btn-facebook" href="#" disabled>
                    <span class="fa fa-facebook"></span> Sign in with Facebook
                </a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection