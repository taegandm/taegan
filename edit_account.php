<?php
include 'db_connect.php';
$conn = OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
  $id = $_GET["id"];

  // Fetch the account details from the database
  $sql = "SELECT * FROM accounts WHERE id = '$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  // Display the edit form with the existing account details
  echo '
  <form method="post" action="update_account.php">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="' . $row["username"] . '" readonly>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="' . $row["email"] . '">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>';
}
?>
