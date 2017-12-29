@extends('layouts.default')

@section('title','CityHub:Restaurant')

@section('content')
	<div class="container padding restaurant">
	
		@foreach($details as $detail)
		<h4>{{$detail->name}}</h4>
		@endforeach

		<div class="row">
			<div class="col-md-8 menu">
				<table>
					<tr>
						<th>Dish</th>
						<th>Quantity</th>
						<th>Price(INR)</th>
					</tr>

					@foreach($products as $product)
					<tr>
						<td>{{$product->product_name}}</td>
						<td>{{$product->quantity}}</td>
						<td>{{$product->price}}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
		
		
	</div>

@endsection