<?php
include 'db_connect.php';
$conn = OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];

  // Delete the account from the database
  $sql = "DELETE FROM accounts WHERE id = '$id'";
  if ($conn->query($sql) === TRUE) {
    // Account deleted successfully
    echo "<script>alert('Account deleted successfully.');</script>";
    echo "<script>window.location.href='your_current_php_file.php';</script>";
  } else {
    // Error occurred while deleting the account
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }
}

$conn->close();
?>
