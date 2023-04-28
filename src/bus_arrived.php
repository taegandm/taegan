<?php
// Include the functions for opening/closing the database connection
include __DIR__ . '../db_connect.php';

// Retrieve the values passed in via the AJAX call
$bus_number = $_POST['bus_number'];
$arrived = $_POST['arrived'];

// Open the database connection
$conn = OpenCon();

// Prepare and execute the SQL query to update the relevant row in the current_buses table
$stmt = $conn->prepare("UPDATE current_buses SET arrived = ? WHERE bus_number = ?");
$stmt->bind_param("ii", $arrived, $bus_number);
$stmt->execute();

// Close the database connection
CloseCon($conn);

echo "Bus information updated successfully!";
?>