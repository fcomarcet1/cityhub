<!DOCTYPE html>
<html>
<head>
	<title>Service Request</title>
</head>
<body>
	<div class="container">
		<h4>We have recieved your request for {{$order['service']}} we are working on that.</h4>		
		{{$order['service']}}
		{{$order['name']}}
		{{$order['phone_no']}}
		{{$order['address']}}
		{{$order['answers']}}
	</div>
</body>
</html>