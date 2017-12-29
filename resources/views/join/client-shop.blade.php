@extends('layouts.default')

@section('title','CityHub:My Shop')

@section('content')
	<div class="padding container">
		<div>
			<h4>My Shop
			<a href="{{ route('client.dashboard') }}" class="pull-right"><input type="button" value="Client Dashboard"></a>
			</h4>
		</div>
		<div class="row">
			<div class="myproducts col-md-8">
				<div class="client_products">
					<table>
						<tr>
							<th>Dish</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
						@foreach($products as $product)
						<tr>
							<td>{{$product->product_name}}</td>
							<td>{{$product->quantity}}</td>
							<td>{{$product->price}}</td>
							<td><a href="{{route('clientproduct.update',['id'=>$product->id])}}">Update</a>     <a href="{{route('clientproduct.delete',['id'=>$product->id])}}">Delete</a></td>
						</tr>
						@endforeach
					</table>
				</div>
				<div id="myproducts">
					<form action="{{ route('client.shop') }}" method="post">
						{{ csrf_field() }}
						<input type="text" name="product_name" placeholder="Name of product">
						<input type="text" name="quantity" placeholder="Quantity(eg. half plate/250gm/300ml etc)">
						<input type="number" name="price" placeholder="Price(in INR)">
						<button>Add</button>
					</form>
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					@if(Session::has('message'))
					<p class="alert alert-info">{{Session::get('message') }}</p>
					@endif
				</div>
				<div id="addproduct"></div>
			</div>
			<div class="myorders col-md-2"></div>
		</div>
	</div>
@endsection