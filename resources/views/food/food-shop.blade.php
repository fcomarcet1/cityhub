@extends('layouts.default')

@section('title','CityHub:Restaurant')

@section('content')
	<div class="container padding menu">

		@foreach($details as $detail)
		<h4>{{$detail->name}}</h4>
		@endforeach

		<div class="row">
			<div class="col-md-8">
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
						<td>
							{{$product->price}}
							<a href="{{ route('addToCart',['id'=>$product->id]) }}" class="pull-right"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
						</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-3 cart">
				@if(Session::has('cart'))
				<table>
					<tr>
						<th colspan="3"><center>My Cart</center></th>
					</tr>
					<tr>
						<th>Dish</th>
						<th>Qty</th>
						<th>Price</th>
					</tr>
					@foreach($cartproducts as $product)
					<tr>
						<td>{{$product['item']['product_name']}}</td>
						<td>
							<a href="{{ route('reduceByOne',['id'=>$product['item']['id']])}}">
							    <span id="reduce">-</span>
							</a>
							<span class="badge">{{ $product['qty'] }}</span>
							<a href="{{ route('increaseByOne',['id'=>$product['item']['id']])}}">
							    <span id="increase">+</span>
							</a>
						</td>
							<td>
								{{ $product['price'] }}
								<a href="{{ route('trash',['id'=>$product['item']['id']]) }}" class="pull-right">
						          <span class="glyphicon glyphicon-trash"></span>
						        </a>
							</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="2">Total: {{ $totalPrice }}</td>
						<td><a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a></td>
					</tr>
				</table>
				@else
					<table>
						<tr>
							<th colspan="3"><center>My Cart</center></th>
						</tr>
						<tr>
							<td colspan="3">Your cart is empty</td>
						</tr>
					</table>
				@endif
			</div>
		</div>
		
		
	</div>

@endsection