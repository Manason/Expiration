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
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "SELECT name, exp_date FROM Food";
$result = mysqli_query($conn, $sql);

echo "<table>
<tr>
<th>Name</th>
<th>Expiration Date</th>
</tr>";

while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['exp_date'] . "</td>";
	echo "</tr>";
}

echo "</table>";
mysqli_close($conn);