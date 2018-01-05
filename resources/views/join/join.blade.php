@extends('layouts.default')

@section('title','CityHub:Join Us')

@section('content')
	<div class="padding container">

		@if ($errors->any())
		    <center><div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div></center>
		@endif
		@if(Session::has('message'))
			<center><p class="alert alert-info">{{ Session::get('message') }}</p></center>
		@endif
		<div class="signup_form">
			<div>
				<h2>Join Us As A Service Provider</h2>
				<a class=" pull-right" href="{{route('login.client')}}">Sign In</a>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="{{ route('join.client') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
					      <label for="name">FULL NAME</label>
					      <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
				    </div>
				    <div class="form-group">
					      <label for="phone">PHONE NUMBER</label>
					      <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
				    </div>
				    <div class="form-group">
					      <label for="profession">YOUR PROFESSION</label>
					      <select name="profession">
					      	@foreach($professions as $profession)
					      	<option value={{ $profession->title }}>{{ $profession->title }}</option>
					      	@endforeach
					      </select>
				    </div>
				    <div class="form-group">
					      <label for="email">EMAIL</label>
					      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				    </div>
				    <div class="form-group">
					      <label for="password">Password</label>
					      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
				    </div>
				    	<button type="submit" class="btn btn-default">Submit</button>
		  		</form>
		  		<p>Have an acount? <a href="{{ route('login.client') }}">Sign In</a></p>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
@endsection