<?php
// Include the database connection file
include __DIR__ . '../db_connect.php';
$conn = OpenCon();

//start session to access bus number in logout
session_start();
$bus_number = $_SESSION['bus_number'];

//create the sql statement to remove from the table
$sql = "DELETE FROM current_buses WHERE bus_number = '$bus_number'";

mysqli_query($conn, $sql);

CloseCon($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body onload="redirect_to_driver_home()">

<script>
//   At this point the database has been updated and the user should be routed back to the login page
    function redirect_to_homepage(){
        window.location.href = "../index.html";
    }
</script>
</body>
</html>