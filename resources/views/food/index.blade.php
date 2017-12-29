@extends('layouts.default')

@section('title','CityHub:FoodCourt')

@section('content')
	<div class="padding container">
		<div>
			<center><h3>CityHub:Food Court</h3></center>
		</div>

		<!-- restaurants start -->
			<div>
				<h4>Restaurants</h4>
			</div>
			<div class="row">
				@foreach($foods as $food)
				<div class="col-xs-6 col-md-2">
				    <a href="{{ route('food.shop',['id'=>$food->id]) }}" class="thumbnail">
				      <img src="images/" alt="...">
				    </a>
				    <p>{{$food->id}}</p>
			  	</div>
			  	@endforeach
			</div>
		<!-- restaurants end -->
			<hr>

		<!-- bakeries start -->
			<div>
				<h4>Bakeries</h4>
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-2">
				    <a href="#" class="thumbnail">
				      <img src="images/rs1.jpg" alt="...">
				    </a>
				    <p></p>
			  	</div>
			</div>
		<!-- bakeries end -->
	</div>
@endsection