
<!--
This file is loaded from signup.html.
The purpose of this file is to catch all the form data submitted during the registration process.
Once all the data has been collected and inserted into the DB the user should be re-routed to login.html
-->


<?php

$firstName = $_POST['first'];
$lastName = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['number'];
$account_type = $_POST['account'];

//This would be expanded to accommodate for more roles
if ($account_type == 'Student') {
    $type = 0;
} else {
    $type = 1;
}



// **IMPORTANT**
// Unless you connect your IDE to the Database this line and other SQL lines will throw an error
// You can ignore the error in your IDE however, the paramters should coincide with your hosting service
// This line handles connecting to the Database
// The parameters are (hostname, your username, your password, the name of your database)
$mysqli = new mysqli('localhost', 'username', 'password', 'database');




//echo mysqli_connect_errno();
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit;
}

// **IMPORTANT**
// This is the exact syntax you must use for SQL commands
// First line is the table that's being updated and the column names, second line are the PHP variable values being passed in
$sql = "INSERT INTO auth_info (username, password, account_type, email, phone)
VALUES ('$firstName', '$password', '$type', '$email', '$phone')";


// This line is what runs the query against the DB
$result = $mysqli->query($sql);
$mysqli->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body onload="returnHome()">

<script>

//   At this point the database has been updated and the user should be routed back to the login page
    function returnHome(){
        window.location.href = "http://cyan.csam.montclair.edu/~mcgratr1/Final%20Project/src/";
    }
</script>
</body>
</html>
