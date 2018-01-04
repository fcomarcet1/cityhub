@extends('layouts.default')

@section('title','CityHub:Contact Us')

@section('content')
	<div class="contact">
		<div class="hero-image">
			<div class="hero-text">
				<h1>Contact Us</h1>
				<p>Suggest us what we can do for you.</p>
			</div>
		</div>


		<div class="row container padding">
			<div class="col-md-6 about">
				<div>
					<center><h3>About Us</h3></center>
				</div>
				<div>
					<ul>
						<li>Our goal is to bring each and every service to everyone's doorstep by just a click of a button.</li>
					</ul>
				</div>
			</div>

			<div class="col-md-1"></div>
			<!-- contact form starts -->
				<div class="col-md-5">
					<form id="contact-form" action="{{ route('contact') }}" method="post">
						<div>
							<h3>Leave A Message.</h3>
						</div>
						<div class="form-group">
						    <!-- <label for="name">Full Name:</label> -->
						    <input type="text" class="question" id="name" name="name" placeholder="FULL NAME">
						</div>

						<div class="form-group">
						    <!-- <label for="email">Email</label> -->
						    <input type="email" class=" question" id="email" name="email" placeholder="EMAIL">
						</div>
						<div class="form-group">
						    <!-- <label for="phone">Contact No</label> -->
						    <input type="number" class=" question" id="phone" name="phone" placeholder="CONTACT NO" min="0">
						</div>

						<div class="form-group">
						    <!-- <label for="subject">Subject</label> -->
						    <input type="text" class=" question" id="subject" name="subject" placeholder="SUBJECT">
						</div>

						<div class="form-group">
						    <!-- <label for="message">Subject</label> -->
						    <!-- <input type="text" class="" id="message" name="subject" placeholder="YOUR PROBLEM OR SUGGESTION OR ANY QUERY"> -->
						    <textarea class="form-control question" id="message" name="message" placeholder="YOUR PROBLEM OR SUGGESTION OR ANY QUERY"></textarea>
						</div>
						<div class="form-group">
							<button>SUBMIT</button>
						</div>
						{{ csrf_field() }}
					</form>
				</div>
			<!-- contact form ends -->

		</div>
	</div>
@endsection