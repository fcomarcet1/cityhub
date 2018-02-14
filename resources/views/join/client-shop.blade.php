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
			<div class="myorders col-xs-12 col-md-8">
				<div>
					<div class="tab">
					  <button class="tablinks" onclick="openCity(event, 'pending')" id="defaultOpen">Pending Orders</button>
					  <button class="tablinks" onclick="openCity(event, 'completed')">Completed Orders</button>
					</div>


					@foreach($orders as $order)
					@foreach($order->cart->items as $item)
					<?php 
						$shop = $item['item']['shopid'];$= ($shop==$shopid);	
						$placed=($order->status=='Placed');
					?>
					@endforeach
					@endforeach
					{{$}}

					<div id="pending" class="tabcontent">
						@foreach($orders as $order)
						@if($order->status=='Placed')
						  	<table>
						  	<tr>
						  		<th colspan="4">Dish</th>
						  		<th colspan="1">Qty</th>
						  		<th colspan="1">Price</th>
						  		<th>Status</th>
						  	</tr>
						  	@foreach($order->cart->items as $item)
						  	<?php $shop = $item['item']['shopid'];?>  <!-- assigned to variable due to error in if statement -->
						  	@if($shop==$shopid)
						  	<tr>
						  		<td colspan="4">{{$item['item']['product_name']}}</td>
						  		<td colspan="1">{{$item['qty']}}</td>
						  		<td colspan="1">{{$item['price']}}</td>
						  	</tr>
						  	@endif
						  	@endforeach
						  	@if($!=0)
						  	<tr style="background: #111;color: #fff;">
						  		<td>Customer Name:{{$order->name}}</td>
						  		<td colspan="1">Contact No:{{$order->phone_no}}    	{{$order->alternate_no}}</td>
						  		<td colspan="3"><span>Address:</span>{{$order->locality}},{{$order->address}},{{$order->landmark}},{{$order->city}},{{$order->state}}</td>
						  		<td><span>Total:{{$order->cart->totalPrice}}</span></td>
						  		<td>
						  			<form action="{{ route('statusUpdate',['id'=>$order->id]) }}" method="post">
						  				<select name="status">
							  				<option value="Placed">Placed</option>
							  				<option value="Cancelled">Cancelled</option>
							  				<option value="Processing">Processing</option>
							  				<option value="Processing">Out for delivery</option>
							  				<option value="Delivered">Delivered</option>
							  			</select>
							  			<button>Update</button>
							  		{{ csrf_field() }}
						  			</form> 
						  				
						  		</td> 
						  	</tr>
						  	@endif
						  </table><br><br>
						  @endif
						  @endforeach
						</div>

						<!-- completed orders -->
						<div id="completed" class="tabcontent">
						  <div>
						  	 @foreach($orders as $order)
						  	 	@if($order->status=='Delivered' || $order->status=='Cancelled')
					                <div class="panel panel-default">
					                    <div class="panel-header">
					                        <ul class="list-group">
					                            @foreach($order->cart->items as $item)
					                            <?php $shop = $item['item']['shopid'];?>
					                            @if($shop==$shopid)
					                                <li class="list-group-item">
					                                    <span class="badge">Rs {{ $item['price'] }}</span>
					                                    {{ $item['item']['product_name'] }} | {{ $item['qty'] }} Units
					                                </li>
					                            @endif
					                            @endforeach
					                        </ul>
					                    </div>
					                    <div class="panel-footer">
					                        <strong>Total Price: Rs {{ $order->cart->totalPrice }}</strong>
					                        <strong class="pull-right">Status:Order {{$order->status}}</strong>
					                        </span>
					                    </div>
					                </div>
			                @endif
			            @endforeach
					  </div>
					</div>
				</div>
			</div>


			<!-- clients products -->
			<div class="myproducts col-md-4">
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
			
		</div>
	</div>
@endsection