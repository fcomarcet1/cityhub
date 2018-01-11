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
			  <!-- <button class="tablinks" onclick="openCity(event, 'customers')">Customers</button> -->
			  <button class="tablinks" onclick="openCity(event, 'services')">Services</button>
			</div>

			<div id="dashboard" class="tabcontent">
			  <h3>Dashboard</h3>
			  <p>London is the capital city of England.</p>
			</div>

			<div id="service_req" class="tabcontent">
			  <h3>Service Requests</h3>
			  <p>London is the capital city of England.</p>
			</div>


			<!-- clients section starts -->
			<div id="clients" class="tabcontent">
			  <h3>Clients</h3>
			  <div>
			  	<form action="{{ route('sendSms') }}">
			  		<div class="form-group">
			  			<label>Phone Number</label>
			  			<input type="number" name="phone" placeholder="Clients Phone Number">
			  		</div>
			  		<div class="form-group">
			  			<label>Message</label>
			  			<textarea placeholder="Enter Your Message" name="message"></textarea>
			  		</div>
			  		<button>Send Message</button>
			  		{{ csrf_field() }}
			  	</form>
			  </div>
			</div>
			<!-- clients section end -->

			<div id="customers" class="tabcontent">
			  <h3>Customers</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div>


			<div id="services" class="tabcontent">
			  <h3>All Services</h3>
			  <form class="form-inline" action="{{ route('admindashboard') }}" enctype="multipart/form-data" method="post">
			  	<div>
			  		<h4>
			  			Task:
			  			<input type="text" name="task" value="addService" readonly style="border: none;">
			  		</h4>
			  	</div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="title" placeholder="Service Name" name="title">
			    </div>
			    <div class="form-group">
			    	<label>Service Image(thumbnail)</label>
			      <input type="file" id="img_path" name="img_path">
			    </div>
			    <button type="submit" class="btn btn-default">Submit</button>
			    {{ csrf_field() }}
			  </form>

			  <!-- form fields -->
			  <form class="form-inline" action="{{ route('admindashboard') }}" enctype="multipart/form-data" method="post">
			  	<div>
			  		<h4>
			  			Task:
			  			<input type="text" name="task" value="addFormFields" readonly style="border: none;">
			  		</h4>
			  	</div>
			  	 <div class="form-group">
			      <input type="text" class="form-control" id="service" placeholder="Service Name(database name)" name="service">
			    </div>
			    <div class="form-group">
			    	<label>Banner Image(Hq)</label>
			      <input type="file" id="banner_image" name="banner_image">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="banner_heading" placeholder="Banner Heading" name="banner_heading">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="banner_paragraph" placeholder="Banner Paragraph" name="banner_paragraph">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="question1" placeholder="Question 1" name="question1">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="question2" placeholder="Question 2" name="question2">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="question3" placeholder="Question 3" name="question3">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="question4" placeholder="Question 4" name="question4">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="question5" placeholder="Question 5" name="question5">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="question6" placeholder="Question 6" name="question6">
			    </div>
			    	<div class="form-group">
			      <input type="text" class="form-control" id="question7" placeholder="Question 7" name="question7">
			    </div>
			    <button type="submit" class="btn btn-default">Submit</button>
			    {{ csrf_field() }}
			  </form>
			  		

			  <form action="{{ route('admindashboard') }}" method="post" >
			  	<div>
			  			<h4>
			  				Task:
			  				<input type="text" name="task" value="addOptions" readonly style="border: none;">
			  			</h4>
			  		</div>
			  		<div class="form-group">
				      <input type="text" class="form-control" id="service" placeholder="Service Name(As in list,*case sensitive)" name="service">
				    </div>
			  		<div class="form-group">
				      <input type="text" class="form-control" id="question_no" placeholder="Question No(check list as for question1 or  question2 etc,*case sensitive " name="question_no">
				    </div>
				    <div class="form-group">
				      <input type="text" class="form-control" id="option" placeholder="Option" name="option">
				    </div>
				    
				    <button>Update Service</button>

				    {{ csrf_field() }}
			  </form>
			  <div>
			  		@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
			  </div>
			</div> 
		</div>	
	</div>
@endsection
