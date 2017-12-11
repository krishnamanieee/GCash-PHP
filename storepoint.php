<?php

	$partnercode = $_POST["partnercode"];
	$customercard = $_POST["customercard"];
	$date =$_POST["date"];
	$invoice =$_POST["invoice"];
	$amount =$_POST["amount"];
	$paid = "Success";
	$totallimit = $_POST["totallimit"];
	/*$partnercode = "krishna";
	$customercard = "7812369452489637";
	$date = "123";
	$invoice = "123";
	$amount = "123";
	$paid = "123";
	$totallimit = "123";*/
	
 
	include('connection.php');
	$stmt = $conn->prepare("INSERT INTO shoppay (partnercode,customercard,date,invoice,amount,paid) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("ssssss",$partnercode,$customercard,$date,$invoice,$amount,$paid);
	$stmt->execute();
	$stmt->close;
	
	$stmt1 = $conn->prepare("INSERT INTO customerpay (customercard,partnercode,date,invoice,amount) VALUES (?,?,?,?,?)");
	$stmt1->bind_param("sssss",$customercard,$partnercode,$date,$invoice,$amount);
	$stmt1->execute();
	$stmt1->close;
	
	$stmt2 =$conn->prepare("update customer set totallimit=? where card = '$customercard'");
	$stmt2->bind_param("s",$totallimit );
	$stmt2->execute();
	echo $partnercode;
	$stmt2->close; 
	$conn->close

?>