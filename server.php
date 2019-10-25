<?php
$con=mysqli_connect("localhost","my_user","my_password","recepti");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries
mysqli_query($con,"SELECT * FROM Persons");
mysqli_close($con);
?>
