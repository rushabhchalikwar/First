<?php	
session_start();
$link=mysqli_connect("shareddb-g.hosting.stackcp.net","rushabh","Rushabh@123","sample-32371144");
	//$link=mysqli_connect("localhost","rushabh","Rushabh@123","signupforusers");	
	if(mysqli_connect_error()){
		die ("connection error");
	}
	
        $fullName=$_POST["pr_name"];
	$username=$_POST["username"];
	$Address=$_POST["pr_add"];
	$contact=$_POST["pr_cont"];
	$email=$_POST["pr_email"];
	$date=$_POST["pr_date"];
	$area=$_POST["pr_area"];
	$password=$_POST["password"];	
	$query="INSERT INTO signupOfficers(fullName,username,Address,contact,email,date,area,password) 					 VALUES('$fullName','$username','$Address','$contact','$email','$date','$area','$password')";
	$result=mysqli_query($link,$query);
	//echo '<img src="thank-you.jpg">';


$target_dir = "upload/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$new_file=$target_dir.$email.".jpg";
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>