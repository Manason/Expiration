<?php
if(file_exists('db-config.php')){
	require_once 'db-config.php';
}
else{
	die("Error: db-config.php not found");
}
//connect to server
$servername = SERVER_NAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DATABASE_NAME;
$tablename = "Food";

//get stuff for email
$visitor_email = EMAIL;//$_POST['email'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $food = "SELECT name FROM ". tablename . "WHERE exp_date = CURDATE()";
$food = "SELECT GROUP_CONCAT(name) FROM ".tablename." WHERE exp_date = CURDATE()"
$result = mysqli_query($conn, $food);
echo $food;

// $email_from = 'yourname@yourwebsite.com';
// $email_subject = $food . "About To Expire!";
// $email_body = "Here are some recipes to use!";
// $headers = "From: $email_from \r\n";
// $headers .= "Reply-To: $visitor_email \r\n";
//
// mail($visitor_email,$email_subject,$email_body,$headers)

mysqli_close($conn);
?>
