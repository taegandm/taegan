<?php
    // Include the database connection file
    include __DIR__ . '../db_connect.php';
    $conn = OpenCon();
    
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
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    CloseCon($conn);
    exit();
?>
