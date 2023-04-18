<?php
// Include the database connection file
include __DIR__ . '../db_connect.php';
$conn = OpenCon();



CloseCon($Conn);
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
        window.location.href = "driver.html";
    }
</script>
</body>
</html>