<?php
    // Include the database connection file
    include __DIR__ . '../db_connect.php';
    $conn = OpenCon();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body onload="redirect_to_homepage()">

<script>
//   At this point the database has been updated and the user should be routed back to the login page
    function redirect_to_homepage(){
        window.location.href = "../index.html";
    }
</script>
</body>
</html>