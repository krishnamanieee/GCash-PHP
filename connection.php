<?php
// Create connection
$conn=mysqli_connect("localhost","qadir_test","tabu@0281","qadir_test");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
