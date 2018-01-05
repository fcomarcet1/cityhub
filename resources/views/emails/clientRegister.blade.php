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
     			<p style="font-size: 12px;">Welcome {{$client['name']}},</p>
     			<p style="font-size: 12px;">Congratulations! You have successfully registered as a client.</p>
     			<p style="font-size: 12px;">Your login email ID : {{ $client['email'] }}</p>
     			<p style="font-size: 12px;">
     				Thanks for registering with us.Keep checking the requests section in your dashboard to get the best of the projects available. 
     			</p>
     			<p style="font-size: 12px;">In case you have questions or need further assistance you can  <a href="http://18.217.70.42/contact">contact us</a>. We would be glad to help you.<br> We are available 24 hours a day, 7 days a week. </p>
                    <p>Please update your documents as soon as possible.Once your documents are verified you will start getting projects.</p>
     			<p style="font-size: 12px;">Sincerely, </p>
     			<p style="font-size: 12px;">The CityHub Team</p>
     			<p style="font-size: 12px;">...................................................................................................................................................................</p>
     			<p style="font-size: 12px;">CityHub.com... Always Ready To Serve You. | <a href="#">http://www.cityhub.com</a></p>
     		</td>
     	</tr>
     </table>
</body>
</html>