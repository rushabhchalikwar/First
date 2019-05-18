<?php
session_start();
if(isset($_SESSION['username'])){	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Waste Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="bootstrap-hover-dropdown.js"></script>
  <link rel="stylesheet" href="style.css">
  </head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">SMART WASTE MANAGEMENT SYSTEM</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
		  <li><a href="index.php#myPage">HOME</a></li>
        <li><a href="index.php#tour">ABOUT</a></li>
        <li><a href="index.php#contact">CONTACT</a></li>
        <li><a href="info_table.php" id="tableInfo" style="display: none">INFO TABLE</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle"  data-hover="dropdown" href="#" id="loginBtn" onClick="show()"><span class="glyphicon glyphicon-log-in"><?php 
								if (isset($_SESSION['username'])) 
 								echo $_SESSION['username']; 
								else{ 
								?>
								LOGIN
								<?php
								}
								?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#">Extras</a></li>
            <li><a href="signout.php">Logout</a></li> 
          </ul>
        </li>
    </div>
  </div>
</nav>
<table id="customers" style="width:60% ; height:40%">
    <th>Area</th>
    <th>Filled(%)</th>
    <th>Date And Time</th>
  </tr>
  <tr>
    <td>Area</td>
    <td></td>
    <td>27 April</td>
  </tr>
  </table>

<div id="login-form" class="login-form" style="position:relative;top: 50px;display: none">
    <form action="signIn.php" method="get">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>      
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>
<!-- Container (The Band Section) -->
<!-- Footer -->
<footer class="text-center" style="position: fixed;bottom: 0px;width: 100%">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Smart Waste Management System </p> 
</footer>


</script>

<script type="text/javascript">
	function show(){
		document.getElementById("login-form").style.display="block";
		document.getElementById("myCarousel").style.display="none";
	}
	
	var ab=document.getElementById("loginBtn").innerHTML;
		var ru="LOGIN";
		var n = ab.includes(ru);
		if(n!=true){
			document.getElementById("tableInfo").style.display="block";
		}
</script>

<script src="https://www.gstatic.com/firebasejs/4.8.2/firebase.js"></script>
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

<script type="text/javascript">
var myTable=document.getElementById("customers");
var ref=firebase.database().ref();
	//var ref2=ref.child('name');
	ref.on('value', function(snapshot){
		var users=snapshot.val();
		var keys=Object.keys(users);
		console.log(keys);
		var tt="<?php echo $_SESSION['area']; ?>";
		for(var i=0;i<keys.length;i++){
		var key=keys[i];
		var name=users[key];
		if(key==tt){
			var name1=users[key];
		}
		
		}
		myTable.rows[1].cells[0].innerHTML =tt;
		myTable.rows[1].cells[1].innerHTML =name1;
		});
</script>

</body>
</html>

<?php
}
else{
	header("Location:index.php");
}
?>

