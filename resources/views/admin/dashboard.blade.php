@extends('layouts.default')

@section('title','CityHub:Admin')

@section('content')
	<div class="padding admindash">
		<!-- <div>
			<center><h1>Hey Admin!</h1></center>
		</div> -->

		<div class="row">
			<div class="tab">
			  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'dashboard')">Dashboard</button>
			  <button class="tablinks" onclick="openCity(event, 'service_req')">Service Requests</button>
			  <button class="tablinks" onclick="openCity(event, 'clients')">Clients</button>
			  <button class="tablinks" onclick="openCity(event, 'customers')">Customers</button>
			</div>

			<div id="dashboard" class="tabcontent">
			  <h3>Dashboard</h3>
			  <p>London is the capital city of England.</p>
			</div>

			<div id="service_req" class="tabcontent">
			  <h3>Service Requests</h3>
			  <p>London is the capital city of England.</p>
			</div>

			<div id="clients" class="tabcontent">
			  <h3>Clients</h3>
			  <p>Paris is the capital of France.</p>
			</div>

			<div id="customers" class="tabcontent">
			  <h3>Customers</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div> 
		</div>	
	</div>
@endsection
