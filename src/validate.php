<?php
$email = $_POST['email'];
$pass = $_POST['pass'];


// Connect to the database
$host = "localhost";
$username = "root";
$password = "YOUR PASSWORD HERE";
$database = "swe2";

$conn = mysqli_connect($host, $username, $password, $database);
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
        header('Location: admin.html');
    } else {
        header('Location: login.html');
    }
} else {
    header('Location: login.html');
}

// Close the database connection
mysqli_close($conn);

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
