

<?php
$con=mysqli_connect("localhost","root","","fitserv_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM trainers (name,town_city, county_region,phone_number, gender,rating)
VALUES
('$_POST[name]','$_POST[location]','$_POST[city]','$_POST[phone]','$_POST[gender]','$_POST[rating]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
header("Location: search_trainer.php");

mysqli_close($con);
?>
