<?php
	session_start();

	  $link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","users");	
	if(mysqli_connect_error()){
		die ("connection error");
	}
	
	
	$query="SELECT * FROM signupOfficers WHERE email='".$_SESSION['username']."'";
	echo $query ;
	
?>