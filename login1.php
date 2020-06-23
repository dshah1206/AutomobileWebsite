<?php   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "automobile";

if(isset($_POST["submit"])){  

    if(!empty($_POST['uname']) && !empty($_POST['pass'])) {  
        $user=$_POST['uname'];  
        $pass=$_POST['pass'];  

        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); }

            $query=mysqli_query($conn,"SELECT * FROM client WHERE cus_username='".$user."' AND cus_pass='".$pass."'");  
            $numrows=mysqli_num_rows($query);  
            if($numrows!=0)  
            {  
                while($row=mysqli_fetch_assoc($query))  
                {  
                    $dbusername=$row['cus_username'];  
                    $dbpassword=$row['cus_pass'];  
                }  

                if($user == $dbusername && $pass == $dbpassword)  
                {  

                    /* Redirect browser */  
                    header("Location: temp1.html");  
                }  
            } 
            else {  
               $message="Login Unsuccessful";  
               echo "<script type='text/javascript'>alert('$message');</script>";
               echo "<script> location.href='login.html'; </script>";
           }  

       } else {  
        echo "All fields are required!";  
    }  
} 
?>