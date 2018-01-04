<!DOCTYPE html>
<html>
<head>
	<title>CityHub</title>
	<style>
	table {
	    font-family: arial, sans-serif;
	    border-collapse: collapse;
	    width: 100%;
	}

	td, th {
	    border: 1px solid #dddddd;
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even) {
	    background-color: #dddddd;
	}
	</style>
</head>
<body>
	<div>
		<center><h4>Contact Us Mail</h4></center>
	</div>
	<table>
		<tr>
			<td>
				<p>Name - {{$details['name']}}</p>
			</td>
		</tr>
		<tr>
			<td>
				<p>Email - {{$details['email']}}</p>
			</td>
		</tr>
		<tr>
			<td>
				<p>Contact No- {{$details['phone']}}</p>
			</td>
		</tr>
		<tr>
			<td>
				<p>Subject - {{$details['subject']}}</p>
			</td>
		</tr>
		<tr>
			<td>
				<p>Message - {{$details['message']}}</p>
			</td>
		</tr>
		<tr>
			<th>Authorised Reply to {{$details['email']}} ASAP.</th>
		</tr>

		<tr>
			<td>By - Admin@CityHub.com</td>
		</tr>
	</table>
</body>
</html>