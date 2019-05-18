<?php


$link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","signupforusers");	
	if(mysqli_connect_error()){
		die ("connection error");
	}

	$username=$_GET['username'];
	$msg="Please Clean the Dustbin ASAP";

 $query="UPDATE signupforusers
 		SET msg='$msg'
		WHERE username='$username'";

mysqli_query($link,$query);

$header="From: rushabhchalikwar@gmail.com";
$subject="Send From Officer Panel";
$text="Please clean the Dustbin ASAP";
	
	if (mail($_GET["email"], $subject, $text, $header)) {
        
        echo "The email was sent successfully to ".$_GET["email"];
        
    } else {
        
        echo "The email could not be sent.";
    }

echo "<script>window.close();</script>";
?>