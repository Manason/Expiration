<?php

if(file_exists('db-config.php')){
	require_once 'db-config.php';
}
else{
	die("Error: db-config.php not found");
}
$servername = SERVER_NAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DATABASE_NAME;
$tablename = "Food";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "TRUNCATE TABLE " . $tablename;
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
