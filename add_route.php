<?php
include 'db_connect.php';
$conn = OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $route_number = $_POST["route_number"];
  $stops = $_POST["stops"];

  // Perform any necessary validation on the input data

  // Insert the new route into the database
  $sql = "INSERT INTO routes (route_number, stop1, stop2, stop3, stop4)
          VALUES ('$route_number', $stops)";
  if ($conn->query($sql) === TRUE) {
    // Route added successfully
    echo "<script>alert('Route added successfully.');</script>";
    echo "<script>window.location.href='your_current_php_file.php';</script>";
  } else {
    // Error occurred while adding the route
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }
}

$conn->close();
?>
