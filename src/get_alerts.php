<?php
	// Include the database connection file
    include __DIR__ . '../db_connect.php';

    // Connect to the database
    $conn = OpenCon();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Execute the SQL query
    $sql = "SELECT title, details, dt FROM alerts ORDER BY id DESC LIMIT 5";
    $result = $conn->query($sql);

    // Get the results as an associative array
    $rows = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    // Return the results as a JSON-encoded string
    echo json_encode($rows);

    // Close the database connection
    CloseCon($conn);
?>