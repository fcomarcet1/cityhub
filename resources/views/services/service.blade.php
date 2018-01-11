@extends('layouts.default')

@section('title','CityHub:Service')
@section('style')
<style>
	@foreach($questions as $question)
	.service-hero .hero-image {
		background-image: url({{asset('storage/upload/'.$question->banner_image)}});
	}
	@endforeach
</style>
@endsection

@section('content')

	<div class="service-hero">
		@foreach($questions as $question)
		 <div class="hero-image">
		  <div class="hero-text">
		    <h1>{{$question->banner_heading}}</h1>
		    <p>{{$question->banner_paragraph}}</p>
		    <button>Book Now</button>
		  </div>

		</div> 
		{{$question->service}}
		<div class="container">
			<div class="col-md-8">
				<div>
					<h4>Your <span style="text-transform: 
					lowercase;">{{$question->service}}</span> is just a few clicks away!!!</h4>
				</div>
				<div>
					@if(Session::has('message'))
					<center><p class="alert alert-info">{{Session::get('message')}}</p></center>
					@endif
				</div>
				<div id="form_div">
					<form id="regForm" action="{{ route('service',['id'=>$id]) }}" method="post">					  
					<!-- One "tab" for each step in the form: -->
						<?php
							 $check1=$question->question1;
							 $check2=$question->question2;
							 $check3=$question->question3;
							 $check4=$question->question4;
							 $check5=$question->question5;
							 $check6=$question->question6;
							 $check7=$question->question7;
						 ?>
						
						 
						@if($check1!=NULL || $check2!=NULL)
					  <div class="tab">
					  		@if($check1!=NULL)
					  		<span>{{$check1}}</span>
						    <select onselect="this.className = ''" name="ans1">
						    	<option value="">Select</option>
						    	@foreach($option1 as $option1)
						    	<option value= {{$option1->option}} >{{$option1->option}}</option>
						    	@endforeach
						    </select>
							@endif
							<br><br>
							<span>{{$check2}}</span>
							@if($check2!=NULL)
						    <select onselect="this.className = ''" name="ans2">
						    	<option value="">Select</option>
						    	@foreach($option2 as $option2)
						    	<option value={{$option2->option}}>{{$option2->option}}</option>
						    	@endforeach
						    </select>
						    @endif	
					  </div>
					  @endif

					  @if($check3!=NULL || $check4!=NULL)
					  <div class="tab">
					  		@if($check3!=NULL)
					  		<span>{{$check3}}</span>
						    <select onselect="this.className=''" name="ans3">
						    	<option value="">Select</option>
						    	@foreach($option3 as $option3)
						    	<option value={{$option3->option}}>{{$option3->option}}</option>
						    	@endforeach
						    </select>
						    @endif
						    <span>{{$check4}}</span>
						    @if($check4!=NULL)
						    <select onselect="this.className=''" name="ans4">
						    	<option value="">Select</option>
						    	@foreach($option4 as $option4)
						    	<option value={{$option4->option}}>{{$option4->option}}</option>
						    	@endforeach
						    </select>
						    @endif
					  </div>
					  @endif



					  @if($check5!=NULL || $check6!=NULL)
					  <div class="tab">
					  		@if($check5!=NULL)
					  		<span>{{$check5}}</span>
						    <select onselect="this.className=''" name="ans5">
						    	<option value="">Select</option>
						    	@foreach($option5 as $option5)
						    	<option value={{$option5->option}}>{{$option5->option}}</option>
						    	@endforeach
						    </select>
						    @endif
						    <span>{{$check6}}</span>
						    @if($check6!=NULL)
						    <select onselect="this.className=''" name="ans6">
						    	<option value="">Select</option>
						    	@foreach($option6 as $option6)
						    	<option value={{$option6->option}}>{{$option6->option}}</option>
						    	@endforeach
						    </select>
						    @endif
					  </div>
					  @endif


					  <div class="tab">
					  		@if($check7!=NULL)
					  		<span>{{$check7}}</span>
						    <select onselect="this.className=''" name="ans7">
						    	<option value="">Select</option>
						    	@foreach($option7 as $option7)
						    	<option value={{$option7->option}}>{{$option7->option}}</option>
						    	@endforeach
						    </select>
						    @endif

						  <span>When you want us to serve you:</span>
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
			<!-- form ends	 -->
			<div class="col-md-1"></div>
			<!-- ad starts -->
			<div class="col-md-3 ad">
				<div>
					<h4 style="color: #fff;">You May Also Like</h4>
				</div>
				<div id="ad-item">
				    <a href="{{ route('cab') }}" class="thumbnail">
				      <img  class="scale" src="../images/cab.jpg" alt="...">
				    </a>
				    <p>Book a cab</p>
			  	</div>
			  	<div id="ad-item">
				    <a href="{{ route('food.index') }}" class="thumbnail">
				      <img  class="scale" src="../images/electrician.jpg" alt="...">
				    </a>
				    <p>Electrician</p>
			  	</div>
			  	<div id="ad-item">
				    <a href="{{ route('food.index') }}" class="thumbnail">
				      <img  class="scale" src="../images/plumber.jpg" alt="...">
				    </a>
				    <p>Plumber</p>
			 	 </div>
			  	<div id="ad-item">
				    <a href="{{ route('food.index') }}" class="thumbnail">
				      <img  class="scale" src="../images/tutor.jpg" alt="...">
				    </a>
				    <p>Tutor</p>
			 	</div>
			</div>
			<!-- ad ends -->
		</div>
		@endforeach
	</div>
@endsection