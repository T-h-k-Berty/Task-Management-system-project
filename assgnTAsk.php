  <?php
$Taskid=$_POST["Tasktid"];
$TAct=$_POST["Act"];

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
$sql="INSERT INTO taskactivities(ActivityId,Tid,Activity) VALUES ('', '$Taskid' ,'$TAct')";

if(mysqli_query($conn ,$sql)){
	header("Location: taskManagerDashbord.html");
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}


mysqli_close($conn);


?>