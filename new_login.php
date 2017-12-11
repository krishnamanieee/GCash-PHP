<?php
	$username = $_POST[ "email" ];
   $password = $_POST[ "password" ];
 //$username = "krishna";
// $password = "123";

include('connection.php');
$sql = "SELECT * from shop ";

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
	$conn->close

?>