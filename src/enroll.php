<?php
$username = $_POST['name'];
$password = $_POST['password'];
$account_type = $_POST['account_type'];
$email = $_POST['email'];
$phone = $_POST['phone'];

//This would be expanded to accomdate for more roles
if ($account_type == 'Customer') {
    $type = 0;
} else {
    $type = 1;
}


$mysqli = new mysqli('localhost', 'mcgratr1', 'Thompson16!', 'mcgratr1_Test');

//echo mysqli_connect_errno();

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit;
}

//ignore error
$sql = "INSERT INTO auth_info (username, password, account_type, email, phone)
VALUES ('$username', '$password', '$type', '$email', '$phone')";

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
    function returnHome(){
        window.location.href = "http://cyan.csam.montclair.edu/~mcgratr1/Final%20Project/src/";
    }
</script>
</body>
</html>