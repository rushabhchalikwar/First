<?php
	$link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","signupforusers");	
	if(mysqli_connect_error()){
		die ("connection error");
	}

	$query="SELECT * FROM signupforusers WHERE username='".$_GET["username"]."' ";
	$result=mysqli_query($link,$query);
	
	$row=mysqli_fetch_array($result);
	
	if($row[7]==$_GET["password"]){
		header("Location: index.php");
		echo "<p>Welcome ".$row[0]."! </p>";
		session_start();
		$_SESSION['username'] = $_GET["username"];
		$_SESSION['area'] = $row[6];
	}
	else{
		echo "<script type='text/javascript'>alert('Username or Password is Wrong !!!');</script>";	
		header("Location: index.php");
	}

?>