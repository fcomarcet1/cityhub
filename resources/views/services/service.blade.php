@extends('layouts.default')

@section('title','CityHub:Service')
@section('style')
<style>
	.service-hero .hero-image {
		background-image: url({{"../images/pexels-photo-534210.jpeg"}});
	}
</style>
@endsection

@section('content')

	<div class="service-hero">
		@foreach($details as $detail)
		 <div class="hero-image">
		  <div class="hero-text">
		    <h1>{{$detail->banner_heading}}</h1>
		    <p>We'll get you one.</p>
		    <button>Book Now</button>
		  </div>

		</div> 
		{{$detail->service}}
		<div class="row container">
			<div class="col-md-8">
				<div>
					<h4>Your cab is just a few clicks away!!!</h4>
				</div>
				<div>
					@if(Session::has('message'))
					<center><p class="alert alert-info">{{Session::get('message')}}</p></center>
					@endif
				</div>
				<div>
					<form id="regForm" action="{{ route('cab') }}" method="post">					  
					<!-- One "tab" for each step in the form: -->
					  <div class="tab">Duration & Purpose Booking
						    <select onselect="this.className = ''" name="purpose">
						    	<option value="">Purpose of hiring</option>
						    	<option value="Going outstation">Going outstation</option>
						    	<option value="Roam inside the city">Roam inside the city</option>
						    </select>
						    <select onselect="this.className = ''" name="duration">
						    	<option value="">Duration For Hiring</option>
						    	<option value="1">1day</option>
						    	<option value="2">2day</option>
						    	<option value="3">3day</option>
						    </select>	
					  </div>
					  <div class="tab">Cab Details:
						    <select onselect="this.className=''" name="cab_type">
						    	<option value="">Cab Type</option>
						    	<option value="Honda City(Sedan) @Rs2000/1day">
						    		Honda City(Sedan) @Rs2000/1day
						    	</option>
						    	<option value="Scorpio(SUV)@Rs1500/1day"> 
						    		Scorpio(SUV)@Rs1500/1day
						    	</option>
						    	<option value="Indica(Hatchback)@Rs1000/1day">
						    		Indica(Hatchback)@Rs1000/1day
						    	</option>
						    </select>
					  </div>
					  <div class="tab">Date of journey:
					    <p><input id="date" name="somedate" type="text" oninput="this.className = ''"></p>
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
					  {{ csrf_field() }}
					</form>
				</div>
				
			</div>	
		</div>
		@endforeach
	</div>
@endsection