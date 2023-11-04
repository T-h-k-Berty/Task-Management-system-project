<?php

$aEid=$_POST["aEid"];
$aTid=$_POST["AsTid"];
$aAct=$_POST["aActivityId"];
$ADate=$_POST["Asdate"];
$aRemark=$_POST["remark"];
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
$sql="INSERT INTO assign(Eid,Tid,dateassign,ActivityId,remark) VALUES ('$aEid','$aTid','$ADate','$aAct','$aRemark')";

if(mysqli_query($conn ,$sql)){
	header("Location: taskManagerDashbord.html");
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}


mysqli_close($conn);

?>