<?php
    session_start();
     $link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","signupforusers");	
	if(mysqli_connect_error()){
		die ("connection error");
	}

	$username=$_SESSION['username'];

 $query="UPDATE signupforusers
 		SET msg=NULL
		WHERE username='$username'";

mysqli_query($link,$query);
	
    session_destroy();
    header("Location: index.php");
?>