<!DOCTYPE html>
<html>
<head>
  <title> login form</title>
  <link rel="import" href="temp1.html">
  <script src="temp.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="header" style="padding-bottom:10px !important;margin-bottom: 0px ; padding: 1px; text-align: center ;background-color:#000000 ; color:white">
  <h1 style="font-family: fontawesome;font-size: 40px ">CONGRATULATIONS</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top mx-100">
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="cursor: pointer;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="temp1.html">HOME</a>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="car_model.html">
       CAR MODEL
      </a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="services.html">SERVICES</a>
      </li>   
     <li class="nav-item">
        <a class="nav-link" href="contact_us.html">CONTACT</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT US</a>
      </li> 
    </ul>
  </div> 
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="cursor: pointer;">
    <ul class="navbar-nav ml-auto">  
      <li class="nav-item ">
        <a class="nav-link" href="home.html">LOGOUT</a>
      </li> 
    </ul>
  </div>
</nav>
<div class="jumbotron jumbotron-fluid text-center text-dark" style="width:100%;height:100% !important; margin-bottom:0; background-color: white; font-family: fontawesome !important; font-size: 25px ;font-weight: bolder">
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
$carmodel=$_POST["model"];
$carcolor=$_POST["colour1"];
$username=$_POST["uname"];
$pass=$_POST["pass"];
$sq2="SELECT * FROM quotes where carmodel='".$carmodel."' having availability > 0";
$query=mysqli_query($conn,$sq2);
if(mysqli_affected_rows($conn) > 0)
{
  $sq1="INSERT INTO request_quotes (c_u,car_m) VALUES ('".$username."','".$carmodel."')";
  $query=mysqli_query($conn,$sq1);
  if(mysqli_affected_rows($conn) > 0){
    $sq3="SELECT availability FROM quotes where carmodel='".$carmodel."' ";
    $query=mysqli_query($conn,$sq3);
    $result=mysqli_fetch_row($query);
    --$result[0];
    $sq4="UPDATE quotes SET availability ='".$result[0]."' where carmodel='".$carmodel."'"; 
    $query=mysqli_query($conn,$sq4);
    $sq5="SELECT * FROM car where model='".$carmodel."' having car.status = 0";
    $query=mysqli_query($conn,$sq5);
    $result1=mysqli_fetch_assoc($query);
    $sq6="UPDATE car SET status = 1 where Registration_Number='".$result1['Registration_Number']."'";
    $query=mysqli_query($conn,$sq6);
   $message="BOOKED";  

   echo "<script type='text/javascript'>alert('$message');</script>";
   //echo "<script> location.href='temp1.html'; </script>";
 } 
 else {
   $message="Enter a valid username";  
   echo "<script type='text/javascript'>alert('$message');</script>";
   echo "<script> location.href='book.html'; </script>";
 }
}
else {
 $message="not available";  
 echo "<script type='text/javascript'>alert('$message');</script>";
 echo "<script> location.href='book.html'; </script>";
 mysqli_close($conn);
}
?>
<p align="center"> REGISTRATION NUMBER:<?php echo $result1['Registration_Number']?></p>
<p align="center"> STATE:<?php echo $result1['state']?></p>
<p align="center"> COST:RS.<?php echo $result1['COST']?></p>
<p align="center"> COLOR:<?php echo $result1['color']?></p>
<p align="center"> MODEL:<?php echo $result1['model']?></p>
<p align="center"> VERSION:<?php echo $result1['version']?></p>
<div class="jumbotron jumbotron-fluid text-center text-danger" style=" position:fixed !important;width: 100% !important; height:auto ;margin-bottom:0; background-color: black !important;">
  <p>
      By using this service, you accept the terms of our Visitor Agreement.Privacy Statement. AdChoices
      © 2018 Autotrader, Inc. All Rights Reserved.<br> "Autotrader" is a registered trademark of TPI Holdings, Inc. used under exclusive license.
  </p>
</div> 
</body>
</html>