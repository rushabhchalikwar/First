<?php
 session_start();


 if (isset($_SESSION['user'])) {
 ?>
   <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<style>
input{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}	
	
select{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	
}	
	
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 200px auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

}
	
button {
    background-color: #4CAF50;
	text-transform: uppercase;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
</style>

<div class="form">
<form action="signupOfficer.php" method="post" enctype="multipart/form-data">
<input type="text" id="pr_name" name="pr_name" value="" placeholder="Enter Full Name" required>
<input type="text" id="username" name="username" placeholder="username">
<input type="password" id="password" name="password" placeholder="password">
<input type="text" id="pr_add" name="pr_add" value="" placeholder="Enter Address" required>
<input type="number" id="pr_cont" name="pr_cont" value="" placeholder="Enter Contact" required>
<input type="email" id="pr_email" name="pr_email" value="" placeholder="Enter Email" required>
<input type="date" id="pr_date" name="pr_date" required>
<input type="text" id="pr_area" name="pr_area" value="" placeholder="Enter Area" required>
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" id="signup" name="signup" value="submit" onClick="submit2()">
</form>
</div>



<script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyA8J1Rxt-2MFhhzovQWzisl8BeLimWdnsM",
    authDomain: "smartdustbin-46601.firebaseapp.com",
    databaseURL: "https://smartdustbin-46601.firebaseio.com",
    projectId: "smartdustbin-46601",
    storageBucket: "smartdustbin-46601.appspot.com",
    messagingSenderId: "635668809848"
  };
  firebase.initializeApp(config);
</script>

<script src="officer_signup.js"></script>
</body>
</html>

 <?php

 } else {
	 echo "Please Log In First";
   ?>
   <?php
 }
