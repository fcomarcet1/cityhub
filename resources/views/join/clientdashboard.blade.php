@extends('layouts.default')

@section('title','CityHub:Client Dashboard')

@section('content')
	<div class="container padding">
		<div>
			<h3>Client Dashboard</h3>
		</div>
		<div class="row">
			<div class="col-md-3 client_foto">
				<div class="card">
					@if($client->photo!=NULL)
				  	<img src="images/c1.jpeg" alt="John" style="width:100%">
				  	@else
				  	<img src="https://www.signextreme.com/wp-content/uploads/2016/05/fileuploadicon.png">
				  	<center><input type="file" name=""></center>
				  	<p>Upload Your Photo</p>
				  	@endif
				  <h1>{{$client->name}}</h1>
				  <p class="title">{{$client->profession}}</p>
				</div>
				<div>
					<a href="{{ route('client.shop') }}"><input type="button" value="My Shop"></a>
				</div>
			</div>
			<!-- <div class="col-md-1"></div> -->
			<div class="col-md-8 client_details">
				<div>
					<h4>Client Details</h4>
				</div>
				<hr>
				<div>
					<table>
						<tr>
							<tr>
								<th scope="row">Name</th>
								<td>:</td>
								<td>{{$client->name}}</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">Phone</th>
								<td>:</td>
								<td>{{$client->phone}}</td>
							</tr>
							<tr>
								<th scope="row">Profession</th>
								<td>:</td>
								<td>{{$client->profession}}</td>
							</tr>
							<tr>
								<th scope="row">Email</th>
								<td>:</td>
								<td>{{$client->email}}</td>
							</tr>
							<tr>
								<th scope="row">Password</th>
								<td>:</td>
								<td>xxxxxxxxxxxx</td>
							</tr>
							<tr>
								<th scope="row">Address</th>
								<td>:</td>
								@if($client->address!='NULL')
								<td>{{$client->address}}</td>
								@else
								<td>Please update your address<a href="#"><button>Update</button></a></td>
								@endif
							</tr>
						</tr>
					</table>
					
				</div>
			</div>
		</div>			    
	</div>
@endsection