<?php
    // Include the database connection file
    include 'db-connect.php';
    $conn = OpenCon();

    // Get the values submitted from the modal
    $alertTitle = $_POST['alertTitle'];
    $alertDetails = $_POST['alertDetails'];

    // Prepare the SQL statement to insert the data into the alerts table
    $stmt = $pdo->prepare("INSERT INTO alerts (title, details) VALUES (?, ?)");

    // Bind the parameters to the statement
    $stmt->bindParam(1, $alertTitle);
    $stmt->bindParam(2, $alertDetails);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    CloseCon($conn);
    exit();
?>
