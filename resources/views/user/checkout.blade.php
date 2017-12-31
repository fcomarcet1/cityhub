@extends('layouts.default')

@section('title','CityHub:Checkout')

@section('content')
	<div class="container padding">
			<div>
				<center></center>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<h3>Checkout Details</h3>
					<form action="{{ route('checkout') }}" method="post" id="checkout-form">
				  		<div class="form-row">
			   	    		<hr>
			   	    			@if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
							    <div class="form-group col-md-6">
							      <label for="Name" class="col-form-label">Name</label>
							      <input type="text" class="form-control" id="name" name="name" >
							    </div>
							    <div class="form-group col-md-6">
							      <label for="phone_no" class="col-form-label">Phone Number</label>
							      <input type="text" class="form-control" id="phone_no" name="phone_no">
							    </div>

							    <div class="form-group col-md-6">
							      <label for="pincode" class="col-form-label">Pincode</label>
							      <input type="text" class="form-control" id="pincode" name="pincode">
							    </div>
							    <div class="form-group col-md-6">
							      <label for="locality" class="col-form-label">Locality</label>
							      <input type="text" class="form-control" id="locality" name="locality">
							    </div>
							    <div class="form-group" id="address_div">
							      <label for="address">Address(Area and Street):</label>
							      <textarea class="form-control" rows="5" cols="30" name="address" id="address"></textarea>
							    </div>
								<div class="form-group col-md-6">
							      <label for="inputCity" class="col-form-label">City/District/Town</label>
							      <input type="text" class="form-control" id="inputCity" name="city" value="Gorakhpur" readonly>
							    </div>
							    <div class="form-group col-md-6">
							      <label for="inputState" class="col-form-label">State</label>
							      <select id="inputState" class="form-control" name="state">
							      	<option>Select</option>
							      	<option value="Uttar Pradesh">Uttar Pradesh</option>
							      </select>
							    </div>
							    <div class="form-group">  
							    	<div class="form-group col-md-6">
							      	<input type="text" class="form-control" id="landmark" placeholder="Landmark(Optional)" name="landmark">
							    	</div>
							    	<div class="form-group col-md-6">
							     
							      	<input type="text" class="form-control" id="alternate_phone" placeholder="Alternate Phone(Optional)" name="alternate_no">
							    	</div>
							    </div>
							    <div class="form-group">
							    	<button type="submit" class="btn btn-primary">Proceed to pay</button>
							    	 <span>Total : {{$total}}</span>
							    </div>
							</div>
				  			{{ csrf_field() }}
					</form>
				</div>
			</div>
	</div>
@endsection