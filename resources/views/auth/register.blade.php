@extends('layouts.default')

@section('title','CityHub:SignUp')
@section('content')
    <div class="container padding">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="form-group col-md-8 col-md-offset-4">
                <h2>SignUp</h2>
            </div>
            <div>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="login-form">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">

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
                            <label for="password-confirm" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="form-group col-md-8 col-md-offset-4">
                <p>
                    Already have an account?

                    <a class="btn btn-link" href="{{ route('login') }}">
                            Login
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
