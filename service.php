<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "automobile";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	echo "fail";
  die("Connection failed: " . $conn->connect_error);
}
$carmodel=$_POST["carmodel"];
$stype=$_POST["tservice"];
$username=$_POST["uname"];
$date1=$_POST["date1"];
echo$date1;
$emp=$_POST["emp"];
  $sq1="INSERT INTO request_service (c_u,car_n) VALUES ('".$username."','".$carmodel."')";
  $query=mysqli_query($conn,$sq1);
  if(mysqli_affected_rows($conn) > 0){
    $sq2="INSERT INTO services (car_name,type,date,provision,e_id) VALUES ('".$carmodel."','".$stype."','".$date1."','yes','".$emp."')";
  $query=mysqli_query($conn,$sq2);
   $message="BOOKED";  
   echo "<script type='text/javascript'>alert('$message');</script>";
   echo "<script> location.href='temp1.html'; </script>";
 } 
 else {
   $message="Enter a valid username";  
   echo "<script type='text/javascript'>alert('$message');</script>";
   echo "<script> location.href='services.html'; </script>";
 }

?>