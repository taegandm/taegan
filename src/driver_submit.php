<?php
// Include the database connection file
include __DIR__ . '../db_connect.php';
$conn = OpenCon();

$bus_number = $_POST['busNumber'];
$route = $_POST['route'];

//create the sql statement to insert into the table
$sql = "INSERT INTO current_buses (bus_number, `route`) 
VALUES ('$bus_number', '$route')";

//query the sql statement
$result = mysqli_query($conn, $sql);

session_start();
$_SESSION['busNumber'] = $bus_number;

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
    function redirect_to_driver_home(){
        window.location.href = "driver.php";
    }
</script>
</body>
</html>
