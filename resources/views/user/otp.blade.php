@extends('layouts.default')

@section('content')
	<div class="padding">
		<form action="{{ route('sendOtp') }}" method="post">
			<input type="email" name="email">
			<button>Send Otp</button>
			{{ csrf_field() }}
		</form>
	</div>
@endsection