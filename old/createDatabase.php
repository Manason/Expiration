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

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE " . $dbname;
if (mysqli_query($conn, $sql)){
	echo "Database successfully created";
}
else{
	die("Error creating database: " . mysqli_error($conn));
}
mysqli_close($conn);



$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE Food (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
exp_date DATE
)";

if(mysqli_query($conn, $sql)){
	echo "Table Food successfully created";
}
else{
	die("Error creating table: " . mysqli(error($conn)));
}

mysqli_close($conn);
?> 