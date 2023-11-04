<?php
$Fname=$_POST["fullname"];
$email=$_POST["email"];
$uname=$_POST["uname"];
$pw=$_POST["password"];
$Role=$_POST["role"];

$conn = mysqli_connect("localhost", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

// Insert
$sql = "INSERT INTO register(id,email,UserName,Password,Role,FullName) VALUES ('','$email','$uname','$pw','$Role','$Fname')";

if (mysqli_query($conn, $sql)) {
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
