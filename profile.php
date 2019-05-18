<?php
 session_start();

if (isset($_SESSION['username'])) {
	  $link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","users");	
	if(mysqli_connect_error()){
		die ("connection error");
	}
	
	
	$query="SELECT * FROM signupOfficers WHERE email='".$_SESSION['username']."'";
	
	$result=mysqli_query($link,$query);
	
	$row=mysqli_fetch_array($result);
 ?>
   <!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>Provider Registration</title>
<link rel="stylesheet" type="text/css" href="pr_signin_and_signup_css.css">
</script>
</head>
<body>
<div class="page">
<div class="form">
<form id="pr_reg" action="registrationOfUsers.php" method="post">
<h2 align="center">Profile</h2>
<img src="http://rushabhchalikwar-com.stackstaging.com/smartdustbin/signup/upload/<?php echo $_SESSION['username'].".jpg"; ?>" ><br>
<label>Name     :</label>
<input type="text" id="pr_name" name="pr_name" value="<?php echo $row[0] ?>" placeholder="Enter Full Name" required>
<label>Username :</label>
<input type="text" id="pr_username" name="pr_username" value="<?php echo $row[1] ?>" placeholder="Enter Username" required>
<label>Address  :</label>
<input type="text" id="pr_add" name="pr_add" value="<?php echo $row[2] ?>" placeholder="Enter Address" required>
<label>Contact  :</label>
<input type="number" id="pr_cont" name="pr_cont" value="<?php echo $row[3] ?>" placeholder="Enter Contact" required>
<label>Email    :</label>
<input type="email" id="pr_email" name="pr_email" value="<?php echo $row[4] ?>" placeholder="Enter Email" required>
<label>Date     :</label>
<input type="date" id="pr_date" name="pr_date" value="<?php echo $row[5] ?>" required>
<label>Area     :</label>
<input type="text" id="pr_area" name="pr_area" value="<?php echo $row[6] ?>" placeholder="Enter Area" required>
<input type="submit" id="signup" name="signup" value="submit"><br>
<span class="message">Already registered? <a href="../userPanel/index.php">Sign In</a></span>
</form>
</div>
</div>



</body>
</html>
 <?php

 } else {
	 echo "Please Log In First";
   ?>
   <br> <a href="index.php">Click here to Login</a>
   
   <?php
 }
