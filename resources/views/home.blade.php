@extends('layouts.default')
@extends('layouts.slide')
@section('title','CityHub:Home')

@section('content')
	
	<!-- recommended services starts-->
		<div class="servicelist container">
			<div>
				<h4>Top Pics</h4>
			</div>
			<div class="row">
			  <div class="col-xs-6 col-md-3">
				    <a href="#" class="thumbnail">
				      <img src="images/slide1.jpeg" alt="...">
				    </a>
				    <p>Bakery</p>
			  </div>
			  <div class="col-xs-6 col-md-3">
				    <a href="#" class="thumbnail">
				      <img src="images/slide2.jpeg" alt="...">
				    </a>
				    <p>Vehicle Repair</p>
			  </div>
			  <div class="col-xs-6 col-md-3">
				    <a href="#" class="thumbnail">
				      <img src="images/slide3.jpeg" alt="...">
				    </a>
				    <p>Photoshoot</p>
			  </div>
			  <div class="col-xs-6 col-md-3">
				    <a href="#" class="thumbnail">
				      <img src="images/slide1.jpeg" alt="...">
				    </a>
				    <p>Kirana Store</p>
			  </div>
			</div>
		</div>
	<!-- recommended services ends-->

	<!-- all services start -->
		<div class="container">
			<div>
				<h4>Our Full Bucket</h4>
			</div>
		</div>
	<!-- all services end -->


@endsection