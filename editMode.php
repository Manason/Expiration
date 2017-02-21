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

$sql = "SELECT id, name, exp_date FROM " . $tablename;
$result = mysqli_query($conn, $sql);

echo
"<table align=\"center\">
<tr>
<th>ID</th>
<th>Name</th>
<th>Date</th>
<th>Delete Entry</th>
</tr>";

while($row = mysqli_fetch_array($result)){
	echo
	"<tr>
	 <td>" . $row['id'] . "</td>
	 <td><input type=\"text\" value=\"". $row['name'] ."\"</input></td>
     <td>" . $row['exp_date'] . "</td>
	 <td><input type=\"checkbox\"></input></td>
	 </tr>";

}

echo "</table>";

$sql = "TRUNCATE TABLE Food";
mysqli_query($conn, $sql);

mysqli_close($conn);
