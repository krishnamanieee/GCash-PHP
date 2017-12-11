<?php

	$otp= $_POST["otp"];
	$phone= $_POST["phone"];
	
	
	include('connection.php');
	$sql = "SELECT * from shoppay ORDER BY invoice ASC";

	$result = $conn->query($sql);

	if ($result->num_rows >0) {
 
	 
	 while($row = $result->fetch_assoc()) {
	 
	 
		 $tem = $row;
		 
		 $json = json_encode($tem);
		 
	 
		}
	 
	}
	else {
	 echo "No Results Found.";
	}
	 echo $json;
	
	
//	$otp= "4586";
//	$phone= "9788008481";


// Authorisation details.
	$username = "murugaproxy@gmail.com";
	$hash = "4fb8cae885046bc837d4ead88a999c655ed24c379a460f9bbb013fbd8100c7a1";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "IDUSBL"; // This is who the message appears to be from.
	$numbers = $phone; // A single number or a comma-seperated list of numbers
	$message = "$otp";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	// Dear %%|customername^{"inputtype" : "text", "maxlength" : "20"}%%, Thank you for the payment of Rs. %%|amountreceived^{"inputtype" : "text", "maxlength" : "10"}%%. Balance amount due Rs. %%|balanceamountdue^{"inputtype" : "text", "maxlength" : "10"}%%
	
	// %%|OTP^{"inputtype" : "text", "maxlength" : "6"}%%
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://sms.qadir.co.in/api2/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	//echo $result 
?>