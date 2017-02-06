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

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}



// $food = "SELECT GROUP_CONCAT(name) FROM ".tablename." WHERE exp_date = CURDATE()"
// $visitor_email = EMAIL; //address the email will be sent to
// $email_from = 'yourname@yourwebsite.com'; //address the email is from
// $email_subject = $food . "About To Expire!"; //subject of email with food added in
// $email_body = "Here are some recipes to use!"; //body of email
// $headers = "From: $email_from \r\n"; //headers for email
// $headers .= "Reply-To: $visitor_email \r\n"; //more headers

//send email (send to, subject, body, headers)
// mail($visitor_email,$email_subject,$email_body,$headers)

mysqli_close($conn);
?>
