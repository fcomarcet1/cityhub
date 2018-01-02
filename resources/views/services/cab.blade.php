@extends('layouts.default')

@section('title','CityHub:Book A Cab')

@section('content')
	<div class="service-hero">
		 <div class="hero-image">
		  <div class="hero-text">
		    <h1>Going Out , Need a cab ??</h1>
		    <p>We'll get you one.</p>
		    <button>Book Now</button>
		  </div>
		</div> 
		<div class="row container">
			<div class="col-md-8">
				<div>
					<h4>Your cab is just a few steps away!!!</h4>
				</div>
				<div>
					<form id="regForm" action="#" onclick="return false">
					  <!-- <h1>Register:</h1> -->
					  <!-- One "tab" for each step in the form: -->
					  <div class="tab">Name:
					    <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
					    <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
					  </div>
					  <div class="tab">Contact Info:
					    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
					    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
					  </div>
					  <div class="tab">Birthday:
					    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
					    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
					    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
					  </div>
					  <div class="tab">Login Info:
					    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
					    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
					  </div>
					  <div style="overflow:auto;">
					    <div style="float:right;">
					      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
					      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
					    </div>
					  </div>
					  <!-- Circles which indicates the steps of the form: -->
					  <div style="text-align:center;margin-top:40px;">
					    <span class="step"></span>
					    <span class="step"></span>
					    <span class="step"></span>
					    <span class="step"></span>
					  </div>
					</form>
				</div>
				
			</div>	
		</div>
		
	</div>
@endsection