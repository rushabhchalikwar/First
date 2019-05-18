<?php
 session_start();
 if (isset($_SESSION['user'])) {
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
<form id="pr_reg" action="registrationOfUsers.php" method="post" enctype="multipart/form-data">
<h2 align="center">Create Account</h2>
<input type="text" id="pr_name" name="pr_name" value="" placeholder="Enter Full Name" required>
<input type="text" id="pr_username" name="pr_username" value="" placeholder="Enter Username" required>
<input type="text" id="pr_add" name="pr_add" value="" placeholder="Enter Address" required>
<input type="number" id="pr_cont" name="pr_cont" value="" placeholder="Enter Contact" required>
<input type="email" id="pr_email" name="pr_email" value="" placeholder="Enter Email" required>
<input type="date" id="pr_date" name="pr_date" required>
<input type="text" id="pr_area" name="pr_area" value="" placeholder="Enter Area" required>
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="password" id="pr_pass" name="pr_pass" value="" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<input type="password" id="pr_confirm_pass" name="pr_confirm_pass" value="" placeholder="Enter Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<input type="submit" id="signup" name="signup" value="submit">
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
   <br> <a href="http://rushabhchalikwar-com.stackstaging.com/smartdustbin/admin.php">Click here to Login</a>
   
   <?php
 }
