<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>

	  
		table{
			/*border:1px solid #111;*/
			width: 50%;
		}
		th{
			border:none;
			/*padding: 15px 0 15px 0;*/
			border-top-right-radius: 5px;
			border-top-left-radius: 5px;
		}
		tr{
			border:none !important;

		}
        

		@media(max-width: 480px){

			table{
				width: 100%;
			}
       		}
	</style>
</head>
<body>
     <table align="center" style="width: 100%;max-width: 620px;">
          <tr style="background: #00496F;border: none;">
               <!-- <td><img src="http://127.0.0.1:8000/images/logo.png" style="float: right;"></td> -->
          </tr>
          <tr style="background: #00496F;">
               <td>
                    <h4 style="color: #fff;font-weight: 100;padding-left: 5px;">Welcome To CityHub</h4>
               </td>
          </tr>
     	<tr style="background: #fff;border: none;">
     		<td style="padding-left: 7px;">
     			<p style="font-size: 12px;">Welcome {{$user['name']}},</p>
     			<p style="font-size: 12px;">Congratulations! You have successfully created a new account with CityHub.</p>
     			<p style="font-size: 12px;">Your login email ID:{{ $user['email'] }}</p>
     			<p style="font-size: 12px;">
     				As a registered user you can now order from various restaurants registered with us and also request form the services listed on our website. 
     			</p>
     			<p style="font-size: 12px;">In case you have questions or need further assistance you can  <a href="3">contact us</a>. We would be glad to help you.<br> We are available 24 hours a day, 7 days a week. </p>
     			<p style="font-size: 12px;">Keep Ordering Delicious Food & Keep Requesting Services!!! </p>
     			<p style="font-size: 12px;">Sincerely, </p>
     			<p style="font-size: 12px;">The CityHub Team</p>
     			<p style="font-size: 12px;">...................................................................................................................................................................</p>
     			<p style="font-size: 12px;">CityHub.com... Always Ready To Serve You | <a href="#">http://www.cityhub.com</a></p>
     		</td>
     	</tr>
     </table>
</body>
</html>