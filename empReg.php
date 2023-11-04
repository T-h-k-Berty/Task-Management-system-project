<?php
$Eid=$_POST["Eid"];
$Tel=$_POST["Tel"];
$Name=$_POST["name"];
$Email=$_POST["email"];
$Desig=$_POST["Des"];
$dbname="project";


$conn=mysqli_connect("localhost","root" , "" , "project");


//Check Connection

if(!$conn){
    die ("Connection faild:" . mysqli_connect_error());
}
else{
    echo "Connect succesfully";
}

//insert 
$sql="INSERT INTO employee(Eid,Telephone,Name,Email,Designation)
 VALUES ('$Eid','$Tel','$Name','$Email','$Desig')";

if(mysqli_query($conn ,$sql)){
	header("Location: login.html");
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>