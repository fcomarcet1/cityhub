@extends('layouts.default')
@extends('layouts.slide')
@section('title','CityHub:Home')

@section('content')
	
	<!-- recommended services starts-->
		<div class="servicelist container">
			<div>
				<h4>Trending</h4>
			</div>
			<div class="row">
			  <div class="col-xs-6 col-md-3">
				    <a href="{{ route('cab') }}" class="thumbnail">
				      <img  class="scale" src="images/cab.jpg" alt="...">
				    </a>
				    <p>Book a cab</p>
			  </div>
			  <div class="col-xs-6 col-md-3">
				    <a href="{{ route('food.index') }}" class="thumbnail">
				      <img  class="scale" src="images/electrician.jpg" alt="...">
				    </a>
				    <p>Electrician</p>
			  </div>
			  <div class="col-xs-6 col-md-3">
				    <a href="{{ route('food.index') }}" class="thumbnail">
				      <img  class="scale" src="images/plumber.jpg" alt="...">
				    </a>
				    <p>Plumber</p>
			  </div>
			  <div class="col-xs-6 col-md-3">
				    <a href="{{ route('food.index') }}" class="thumbnail">
				      <img  class="scale" src="images/tutor.jpg" alt="...">
				    </a>
				    <p>Tutor</p>
			  </div>
			</div>
		</div>
	<!-- recommended services ends-->

	<!-- all services start -->
		<div class="container allservices">
			<div>
				<h4>Our Full Bucket</h4>
			</div>
			<div class="row">
				@foreach($services as $service)
			  <div class="col-xs-6 col-md-3 service">
				    <a href="{{ route('service',['id'=>$service->id]) }}" class="thumbnail">
				      <img  class="scale" src="{{ asset('storage/upload/'.$service->img_path) }}" alt="...">
				    </a>
				    <p>{{$service->title}}</p>
			  </div>
			  @endforeach
			</div>
		</div>
	<!-- all services end -->

	<!-- how it works starts-->
		<div class="working">
			<div class="container layer">
				<div>
					<center><h3>How we work</h3></center>
				</div>

				<div class="row">
					<center>
					<div class="col-md-3 wpro">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<h5>Vist Our Website</h5>
						<p>Share your information with us<br> and make a booking.</p>
					</div>
					<div class="col-md-3 wpro">
						<i class="fa fa-users" aria-hidden="true"></i>
						<h5>We Work On Your Request</h5>
						<p>Our team works on your request & finds the<br> best possible way to serve you.</p>
					</div>
					<div class="col-md-3 wpro">
						<i class="fa fa-handshake-o" aria-hidden="true"></i>
						<h5>Assign Task</h5>
						<p>We assign your request to the best amongst our service providers.</p>	
					</div>
					<div class="col-md-3 wpro">
						<i class="fa fa-home" aria-hidden="true"></i>
						<h5>Service Delivery</h5>
						<p>One of our representatives visits you to serve you as per your request.</p>
					</div>
					</center>
				</div>
			</div>
		</div>
	<!-- how it works ends -->

	<!-- join us as a service provider starts-->
		<div>
			<div class="joinus container">
				<center>
					<h2>Need a platform to serve others & add some cash to your wallet?
					<a href="{{ route('join.client') }}"><input type="button" value="Join Us"></a>
					</h2>
				
				</center>
			</div>
		</div>
	<!-- join us as a service provider ends-->




@endsection