<?php
 $link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","users");	
	if(mysqli_connect_error()){
		die ("connection error");
	}
	
	
	$query="SELECT * FROM signupforusers";
	
	$result=mysqli_query($link,$query);
	
	//$row=mysqli_fetch_array($result);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SmartDustbin</title>

<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type="text/javascript">
	function validate(){
	if(document.getElementById("username").value==""){
		document.getElementById("required").innerHTML="&nbsp &nbsp &nbsp &nbspFill Username First";
		document.getElementById("username").focus();
	}
	else if(document.getElementById("password").value==""){
		document.getElementById("required").innerHTML="&nbsp &nbsp &nbsp &nbspFill Password First";
		document.getElementById("password").focus();
	}
	else
		pressed();	
	}
	
	function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("secid3").style.marginLeft = "250px";
	document.getElementById("sec4").style.marginLeft = "250px";
	document.getElementById("logoId").style.marginLeft = "180px";
	document.getElementById("threeLine").style.marginLeft = "180px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}
	
	function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("secid3").style.marginLeft= "0";
	document.getElementById("logoId").style.marginLeft = "0px";
	document.getElementById("threeLine").style.marginLeft = "0px";
	document.getElementById("sec4").style.marginLeft = "0px";
    document.body.style.backgroundColor = "white";
}
	function send(yy){
		alert(yy);
	}
</script>
<script>
function valueSet(set){
		var fac=document.getElementById("select1");
		fac.selectedIndex=set;		
		show();
	}	
</script>
</head>
<body onLoad="show()">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="profile.php">Profile</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#" onClick="logout()">Logout</a>
</div>

<nav id="nav">
	<div class="logo" id="logoId"><button id="threeLine" onClick="openNav()" style="width: 50px;background-color:#111;position:absolute;top:3px;left:60px;font-size:30px">&#9776</button>SMART WASTE MANAGEMENT</div>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php">About</a></li>
	<li>
	<select class="select" id="select1" onChange="show()">	
	</select>

	</li>
	<li><button class="active" name="login" id="login" onClick="show2()">LOGIN</button></li>
	
</ul>
</nav>

<section class="sec1" id="MainLoginform">
<p>
<div id="canvasd" class="canvas4" style="display: none">
<canvas id="myCanvas" height="300" width="300" style="background-position: center"></canvas>
			<div id="myLegend"></div>
</div>
</p>
		
<div id="loginform" class="board" style="display: none">
		<div class="board">
		<form method="get" action="session.php" target="_blank">
		<p id="required"></p>
		<p style="color: white"><label><b>&nbsp&nbsp&nbsp&nbsp USERNAME</b></label><br>
			&nbsp&nbsp&nbsp&nbsp<input class="textbox" type="text" id="username" name="username"/></p>
			<p style="color: white"><label><b>&nbsp&nbsp&nbsp&nbsp PASSWORD</b></label><br>
			&nbsp&nbsp&nbsp&nbsp<input class="textbox" type="password" id="password"/></p>
		<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<button class="buttonapp" id="button1" onClick="validate()">LOGIN</button>
		</p>
		</form>
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<button class="buttonapp" id="logout" onClick="logout()">LOGOUT</button>				
		</div>	
</div>
</section>

<section class="sec3" id="secid3" style="display: none">
<h1>Area wise Dustbin Status</h1>
<table id="customers">
    <th>Area</th>
    <th>Filled(%)</th>
    <th>Date And Time</th>
    <th>Graphical</th>
  </tr>
  </table>

</section>

<section class="sec4" id="sec4" style="display: none">
<h1> User Details </h1>
	<table id="myTable">
  <tr>
    <th>Full Name</th>
    <th>Username</th>
    <th>Area</th>
    <th>Contact No.</th>
    <th>Message</th>
  </tr>
  <tbody>	 
  <?php 		
	  	while($row=mysqli_fetch_array($result)){
			
        echo "<tr><td>" . $row["0"]. "</td><td>" . $row["1"]. "</td><td>" . $row["2"]. "</td><td>".$row[3]."</td><td><a target='_blank' href='msg.php?username=".$row[1]."&email=".$row[4]."'>SEND</a></td></tr>";
	  
		 //echo "<tr><td>" . $row["0"]. "</td><td>" . $row["1"]. "</td><td>" . $row["2"]. "</td><td>".$row["3"]."</td><td><a href='#' onClick='send(\"".$row['0']."\")'>SEND</a></td></tr>";
	  
			
		// echo "<tr><td>" . $row["0"]. "</td><td>" . $row["1"]. "</td><td>" . $row["2"]. "</td><td>".$row[3]."</td><td><button onClick='send(".$row[0].")'>SEND</button></td></tr>";
		}
	 ?>
  </tbody>
</table>


<div class="form">
<h3>ADD DUSTBIN</h3>
<input class="input" type="text" id="area" placeholder="Area">
<input class="input" type="text" id="filled" placeholder="Filled">
<button id="addDust" onClick="addDustbin()">Add</button>
</div>

<br><br><br><br><br>
<h1> Grievelences Details </h1>
	<table id="myTable12" class="table table-bordered" style="width: 50%">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Comments</th>
  </tr>
  <tbody>	 
  <?php 		
	  
	  $query1="SELECT * FROM grievelences";
	
	$result1=mysqli_query($link,$query1);
	  	while($row1=mysqli_fetch_array($result1)){
			
        echo "<tr><td>" . $row1["0"]. "</td><td>" . $row1["1"]. "</td><td>" . $row1["2"]."</td></tr>";
		}
	 ?>
  </tbody>
</table>
</section>





<script type="text/javascript">
	var counter1=0;
	function show(){
		var option=document.getElementById("select1");
		var ref4=firebase.database().ref();
			 ref4.on('value',function(snapshot){
				var users=snapshot.val();
				var keys=Object.keys(users);
				console.log(keys);
				if(counter1<(keys.length-1)){				
				for(var i=0;i<keys.length;i++){
				var key=keys[i];
			    //alert(counter1);
				var x = document.getElementById("select1");
    			var option = document.createElement("option");
    			option.text = key;
    			x.add(option);
				counter1++;
			}
				}
			});
		firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
			// User is signed in.
			var displayName = user.displayName;
			var email = user.email;
			 document.getElementById("login").innerHTML=email;
			  
			var ref3=firebase.database().ref().child(option.value);			  
			//tableCont();
			ref3.on('value',function(snapshot){
				data=snapshot.val();
				//setValue(data);
				pressed();
				document.getElementById("canvasd").style.display="block";
				document.getElementById("secid3").style.display="block";
				document.getElementById("sec4").style.display="block";
			});
		  }

		});		
	}
	
	function show2(){
		document.getElementById("canvasd").style.display="none";
		document.getElementById("loginform").style.display="block";
		document.getElementById("secid3").style.display="none";
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

<script type="text/javascript" src="auth1.js"></script>
<script type="text/javascript" src="dustbinAdd.js"></script>


<!--<script src="script.js"></script> -->
</body>
</html>