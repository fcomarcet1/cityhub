@extends('layouts.default')

@section('title','CityHub:Join Us')

@section('content')
	<div class="padding container">

		
		@if(Session::has('message'))
			<center><p class="alert alert-info">{{ Session::get('message') }}</p></center>
		@endif
		<div class="signup_form">
			<div>
				<h2>Join Us As A Service Provider</h2>
				<a class=" pull-right" href="{{route('login.client')}}">Sign In</a>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6" id="join-formdiv">
				<form action="{{ route('join.client') }}" method="post" id="login-form">
					{{ csrf_field() }}
					<div class="form-group">
					      <label for="name">FULL NAME</label>
					      <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
					      @if($errors->has('name'))
					      <span class="help-block" style="color: red;">
					      	<strong>{{$errors->first('name')}}</strong>
					      </span>
					      @endif
				    </div>
				    <div class="form-group">
					      <label for="phone">PHONE NUMBER</label>
					      <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" required>
					      @if($errors->has('phone'))
					      <span class="help-block" style="color: red;">
					      	<strong>{{$errors->first('phone')}}</strong>
					      </span>
					      @endif
				    </div>
				    <div class="form-group">
					      <label for="profession">YOUR PROFESSION</label><br>
					      <select name="profession" style="width: 100% !important;">
					      	<option value="">Select</option>
					      	@foreach($professions as $profession)
					      	<option value={{ $profession->title }}>{{ $profession->title }}</option>
					      	@endforeach
					      </select>
					      @if($errors->has('profession'))
						      <span class="help-block" style="color: red;">
						      	<strong>{{$errors->first('profession')}}</strong>
						      </span>
						    @endif
				    </div>
				    <div class="form-group">
					      <label for="email">EMAIL</label>
					      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
					      @if($errors->has('email'))
						      <span class="help-block" style="color: red;">
						      	<strong>{{$errors->first('email')}}</strong>
						      </span>
						    @endif
				    </div>
				    <div class="form-group">
					      <label for="password">Password</label>
					      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
					      @if($errors->has('password'))
					      <span style="color: red;">
					      	<strong>{{$errors->first('password')}}</strong>
					      </span>
					      @endif
				    </div>
				    	<button type="submit" class="btn btn-default">Submit</button>
		  		</form>
		  		<p>Have an acount? <a href="{{ route('login.client') }}">Sign In</a></p>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
@endsection