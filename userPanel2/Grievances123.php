<?php	
session_start();
$link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","signupforusers");	
	if(mysqli_connect_error()){
		die ("connection error");
	}

        $Name=$_GET["Name"];
	$Email=$_GET["Email"];
	$Comments=$_GET["Comments"];
	$Area=$_GET["Area"];	

	$query="INSERT INTO grievelences VALUES('$Name','$Email','$Comments','$Area')";
	$result=mysqli_query($link,$query);
	header("Location: index.php");
?>
