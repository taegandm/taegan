<?php
    // Include the database connection file
    include __DIR__ . '../db_connect.php';
    $conn = OpenCon();

    //store current bus information for retrieval
    session_start();
    $_SESSION['bus_number'] = $_POST["bus_number"];
    $_SESSION['route'] = $_POST["route"];
    $_SESSION['starting_stop'] = $_POST["starting_stop"];

    //set default timezone to GMT
    date_default_timezone_set('America/New_York');

    // Get the values submitted from the modal
    $title = $_POST['alertTitle'];
    $details = $_POST['alertDetails'];
    $dt = date("m\/d\/y   g:i a");

    //create the sql statement to insert into the table
    $sql = "INSERT INTO alerts (title, details, dt) 
                VALUES ('$title', '$details', '$dt')";
        
    //query the sql statement
    $result = mysqli_query($conn, $sql);

    // Redirect back to the previous page
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
