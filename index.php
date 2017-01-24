<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/form.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <!-- If IE use the latest rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- calendar scripts -->
    <link href="css/calendarview.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="prototype.js"></script>
    <script type="text/javascript" src="calendarview.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            Calendar.setup({
                dateField     : 'date',
                parentElement : 'calendar'
            })
        }
    </script>
    <!-- end calendar scripts -->
    <!-- Title of website -->
    <title>Test Title</title>
</head>

<body>
    <!-- Title -->
   <h1>Name Here!</h1>

   <form action="fill_db.php", method="post">
      Food: <input type="text" size="21" maxlength="30" name="food"><br />
      <br />
      Expiration: <input type="date" size="24" name="expiration" disabled="true" id="expiration"></label><br>
      <br />
      <input type="submit" name="submit" value="Submit"/>
   </form>

   <!-- calendar -->
<div id="calendar"></div>
<div id="date">Select Date</div>

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

    $sql = "SELECT id, name, exp_date FROM Food";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

    	echo "<table><tr><th>ID</th><th>Name</th></tr>";
        // output data of each row

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]." ".$row["exp_date"]."</td></tr>";
        }
    	echo "</table>";
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
?>
</body>

</html>
