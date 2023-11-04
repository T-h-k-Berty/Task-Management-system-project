<?php
//start the session
session_start();

?>

<html>
    <body>
        <?php

        $uname=$_POST["uname"];
        $password=$_POST["password"];
        $role=$_POST["role"];
        $_SESSION["Role"] =$_POST["role"];


        $conn=mysqli_connect("localhost","root" , "" , "project");
        if(!$conn){
         die ("Connection faild:" . mysqli_connect_error());
            }
     



        $sql = "SELECT UserName,Password,Role FROM register WHERE UserName='$uname' AND Role='$role' AND Password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >0) {
            
            if( $_SESSION["Role"] =="Employee" ){
                header("Location: EmployeDashbord.html");
               
            }
            elseif( $_SESSION["Role"] =="TaskManager"){
                header("Location: taskManagerDashbord.html");
              
            }
            else{
                header("Location: report.php");
            }
              
        } else {

            echo "Login failed. Invalid username or password.";
        }
      
        
        
        mysqli_close($conn);


?>

</body>

</html>