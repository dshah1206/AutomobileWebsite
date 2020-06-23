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
  $name=$_POST["name"];
  $address=$_POST["address"];
  $email=$_POST["email"];
  $contact=$_POST["contact"];
  $username=$_POST["uname"];
  $pass=$_POST["pass"];
  $sq1="INSERT INTO client (cus_username,cus_pass,cus_name,cus_email,cus_contact,cus_addr) VALUES ('".$username."','".$pass."','".$name."','".$email."','".$contact."','".$address."')";
  $query=mysqli_query($conn,$sq1);
 if(mysqli_affected_rows($conn) > 0){
 $message="REGISTERED";  
              echo "<script type='text/javascript'>alert('$message');</script>";
              echo "<script> location.href='login.html'; </script>";
} else {
 $message="Already exists,try another username";  
              echo "<script type='text/javascript'>alert('$message');</script>";
              echo "<script> location.href='registration.html'; </script>";
}
mysqli_close($conn);
?>