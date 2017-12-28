@extends('layouts.default')

@section('title','CityHub:Restaurant')

@section('content')
	<div class="container padding restaurant">
		<h2>{{$rest->name}}</h2>
		
		<div class="row">
			<div class="col-md-8">
				<table>
					<tr>
						<th>Dish</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
					<tr>
						@foreach($restaurant as $restaurant)
						<td>{{$restaurant->name}}</td>
						<td>{{$restaurant->price}}</td>
						@endforeach
					</tr>
				</table>
			</div>
		</div>
		
		
	</div>

@endsection