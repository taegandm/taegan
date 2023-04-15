<?php
// Include the database connection file
include __DIR__ . '../db_connect.php';

$email = $_POST['email'];
$pass = $_POST['pass'];


// Connect to the database
$conn = OpenCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare a query to select the hashed password and account type for the given user
$email = mysqli_real_escape_string($conn, $_POST['email']);
$query = "SELECT password, account_type FROM swe2.auth_info WHERE auth_info.email='$email'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if the password matches
$row = mysqli_fetch_assoc($result);
$hash = $row['password'];
if (password_verify($pass, $hash)) {
    $account_type = $row['account_type'];

    if ($account_type == 'Student') {
        header('Location: student.html');
    } else if ($account_type == 'Driver') {
        header('Location: driver.html');
    } else if ($account_type == 'Admin') {
        header('Location: Admin.html');
    } else {
        header('Location: login.php?error=1');
    }
} else {
    header('Location: login.php?error=1');
}

// Close the database connection
CloseCon($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

</body>
</html>
