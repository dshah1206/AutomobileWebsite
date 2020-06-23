<?php/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "automobile";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["submit"])){
  $username=$_POST["uname"];
  $pass=$_POST["pass"];
  $sq1="SELECT * FROM client where cus_username='".$username."' AND cus_password ='".$pass."'";
            $resu=mysql_query($sq1)
            {}
      $rows = mysqli_num_rows($resu);
      if(!$resu && mysqli_num_rows($resu)==0 )
      {

           
          $message="Login Successful";  
              echo "<script type='text/javascript'>alert('$message');</script>";  
              echo "<script> location.href='temp1.html'; </script>";
      }
      else{
        $message="Login Unsuccessful";  
              echo "<script type='text/javascript'>alert('$message');</script>";
              echo "<script> location.href='login.html'; </script>";
      }

 }
 */