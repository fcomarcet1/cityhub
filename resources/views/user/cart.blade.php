@extends('layouts.default')

@section('title','CityHub:Cart')

@section('content')
   @if(Session::has('cart'))

       <div id="cart" class="padding">
         <center><h2>CART</h2></center>
       </div>
       <div class="row" >
       	  <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       	  	<ul class="list-group">
       	  		@foreach($products as $product)
       	  		  <li class="list-group-item">
       	  		  	<span class="pull-right">
                  <a href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                  <span class="badge">{{ $product['qty'] }}</span>
                  <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </span>
       	  		  	<strong>{{ $product['item']['product_name'] }}</strong>
       	  		  	<span class="label label-success">{{ $product['price'] }}</span>
       	  		  </li>
       	  		@endforeach
       	  	</ul>
       	  </div>
       </div>
        <div class="row">
       	  <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       	  	<strong>Total: {{ $totalPrice }}</strong>
       	  </div>
       </div>
       <hr>
       <div class="row">
       	  <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       	  	<a href="#" type="button" class="btn btn-success">Checkout</a>
            <a href="#" type="button" class="btn btn-success pull-right  ">Empty Cart</a>
       	  </div>
       </div>
       
    
   @else
        <div class="row" id="cart">
       	  <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       	  	<h2>No items</h2>
       	  </div>
       </div>
   @endif
@endsection