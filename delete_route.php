<?php
include 'db_connect.php';
$conn = OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $route_number = $_POST["route_number"];

  // Delete the route from the database
  $sql = "DELETE FROM routes WHERE route_number = '$route_number'";
  if ($conn->query($sql) === TRUE) {
    // Route deleted successfully
    echo "<script>alert('Route deleted successfully.');</script>";
    echo "<script>window.location.href='your_current_php_file.php';</script>";
  } else {
    // Error occurred while deleting the route
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }
}

$conn->close();
?>
