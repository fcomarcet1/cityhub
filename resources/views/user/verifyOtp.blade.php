@extends('layouts.default')

@section('content')

	<div class="padding" style="margin-top: 100px;">
	<h1>verify otp</h1>
		<form action="#" method="post">
			<input type="number" name="otp">
			<button>Verify Otp</button>
			{{ csrf_field() }}
		</form>
		
		<span class="badge">{{ Session::has('otp')? Session::get('otp') : 'no otp found'}}</span>
	</div>
@endsection