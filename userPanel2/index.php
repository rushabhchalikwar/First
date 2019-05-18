<?php
session_start();
$link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","users");	
	if(mysqli_connect_error()){
		die ("connection error");
	}
	
	
	$query="SELECT * FROM signupforusers WHERE username='".$_SESSION['username']."'";
	
	$result=mysqli_query($link,$query);
	
	$row=mysqli_fetch_array($result);
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
      <a class="navbar-brand" href="#myPage">SMART WASTE MANAGEMENT SYSTEM</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
		  <li><a href="#myPage">HOME</a></li>
        <li><a href="#tour">ABOUT</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="info_table.php" id="tableInfo" style="display: none">INFO TABLE</a></li>
        <li><button id="notify" type="button" class="btn btn-default btn-sm" style="border: none;background: none;display: none" title="Message" data-toggle="popover" data-placement="bottom" data-content="<?php echo $row[8] ?>">
          <span class="glyphicon glyphicon-bell"></span>
        </button></li>
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

<div class="container" style="display: none">
   <a href="#" title="Message" data-toggle="popover" data-placement="top" data-content="Content">Top</a></li>
    <li><a href="#" title="Message" data-toggle="popover" data-placement="bottom" data-content="Content">Bottom</a></li>
    <li><a href="#" title="Header" data-toggle="popover" data-placement="left" data-content="Content">Left</a></li>
    <li><a href="#" title="Header" data-toggle="popover" data-placement="right" data-content="Content">Right</a></li>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="display: block">
      <div class="item active">
        <img src="img/smart1.png" alt="New York" width="1200" height="700">   
      </div>

      <div class="item">
        <img src="img/smart2.jpg" alt="Chicago" width="1200" height="700">    
      </div>
    
      <div class="item">
        <img src="img/smart3.jpg" alt="Los Angeles" width="1200" height="700">   
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
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
</div>
<!-- Container (The Band Section) -->


<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">ABOUT</h3>
    <p class="text-center">Developed By</p>
   
    
    <div class="row text-center">
      <div class="col-sm-3">
        <div class="thumbnail">
          <img src="img/rushabh.jpg" alt="Rushabh" width="200" height="100">
          <p><strong>Rushabh Chalikwar</strong></p>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="thumbnail">
          <img src="img/nagesh.jpg" alt="Nagesh" width="200" height="100">
          <p><strong>Nagesh Badgude</strong></p>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="thumbnail">
          <img src="img/akshay.jpg" alt="Akshay" width="200" height="100">
          <p><strong>Akshay Tambake</strong></p>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="thumbnail">
          <img src="img/onkar.jpg" alt="Onkar" width="200" height="100">
          <p><strong>Onkar Dudgikar</strong></p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->

</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>Suggetions and Grievances accepted here</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Solapur, India</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: 8855885712</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: rushabhchalikwar@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
         <form action="Grievances123.php">
          <input class="form-control" id="Name" name="Name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="Email" name="Email" placeholder="Email" type="email" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="Area" name="Area" placeholder="Area" type="text" required>
        </div>
      </div>
      <textarea class="form-control" id="Comments" name="Comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>

<!-- Add Google Maps
<div id="googleMap"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(41.878114, -87.629798);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Smart Waste Management System </p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})


</script>

<script type="text/javascript">
	var count=0;
	function show(){
		document.getElementById("login-form").style.display="block";
		document.getElementById("myCarousel").style.display="none";
	}
	
	var ab=document.getElementById("loginBtn").innerHTML;
		var ru="LOGIN";
		var n = ab.includes(ru);
		if(n!=true){
			document.getElementById("tableInfo").style.display="block";
			document.getElementById("notify").style.display="block";
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

<script type="text/javascript" src="checkview.js"></script>
</body>
</html>


