<?php
session_start();
$_SESSION['user'] = "admin";
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
<input type="text" id="username" placeholder="username">
<input type="password" id="password" >
<select class="select" id="select1" onChange="show()">
	<option>Officer</option>
	<option>User</option>
</select>
<button id="button1" onClick="submit1()">Submit</button>
</div>

<script type="text/javascript">
		function submit1(){
			if(document.getElementById("username").value=="admin" && document.getElementById("password").value=="admin"){
				if(document.getElementById("select1").value=="User")
				window.location.href="signup/pr_signup.php";
				else
				window.location.href="signup/officer_signup.php";
			}
		}
</script>
</body>
</html>
