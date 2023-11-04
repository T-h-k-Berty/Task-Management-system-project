<?php

$Tid=$_POST["Tid"];
$tname=$_POST["tname"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$nature=$_POST["nat"];
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
$sql="INSERT INTO task(Tid,Name,StartDate,EndDate,Nature) VALUES ('$Tid','$tname','$sdate','$edate','$nature')";

if(mysqli_query($conn ,$sql)){
	header("Location: taskManagerDashbord.html");
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>