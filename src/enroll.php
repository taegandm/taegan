<?php

// Include the database connection file
include __DIR__ . '../db_connect.php';
$conn = OpenCon();

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO swe2.auth_info (firstName, lastName, email, password, phone, account_type) VALUES (?, ?, ?, ?, ?, ?)");

// bind the parameters with their respective types
$stmt->bind_param("ssssss", $firstName, $lastName, $email, $hashedPassword, $phone, $account_type);

// set the parameters
$firstName = $_POST['first'];
$lastName = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // hash the password using password_hash
$phone = $_POST['number'];
$account_type = $_POST['account'];

// execute the statement
if ($stmt->execute()) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// close the statement and connection
$stmt->close();
CloseCon($conn);
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
        window.location.href = "login.php";
    }
</script>
</body>
</html>
