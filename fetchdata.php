<?php
	//$card = $_POST[ "card" ];
  
   $card = "7349813246987256";


include('connection.php');
$sql = "SELECT * from customer where card='$card'";

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