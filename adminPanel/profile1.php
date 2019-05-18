<?php
 session_start();
 $link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","users");	
	if(mysqli_connect_error()){
		die ("connection error");
	}
	
	
	$query="SELECT * FROM signupforusers";
	
	$result=mysqli_query($link,$query);
	
	//$row=mysqli_fetch_array($result);
 if (isset($_SESSION['username'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Smart Waste Management System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php">Smart Waste Management System</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
			<img src="http://rushabhchalikwar-com.stackstaging.com/smartdustbin/signup/upload/<?php echo $_SESSION['username'].".jpg"; ?>" class="img-responsive">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><p id="userStatus">Username</p></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="profile1.php"><em class="fa fa-address-book-o">&nbsp;</em> Profile</a></li>
			<li><a href="addDustbin.php"><em class="fa fa-toggle-off">&nbsp;</em> Add Dustbin</a></li>
			<li><a href="#" onClick="logout()"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="panel panel-container">
			<div class="row">
			<iframe src="profile.php" width="600" height="800" scrolling="no" frameborder="0">
    		</iframe>
			</div>
			</div><!--/.row-->

		<br><br>
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
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
		
</body>
</html>

<?php

} else {
	header("Location:login.php");
}
?>
