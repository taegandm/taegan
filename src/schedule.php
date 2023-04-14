<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Bus #</th>
      <th scope="col">Current Stop</th>
      <th scope="col">Next Stop</th>
      <th scope="col">Wait Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'db_connect.php';
    $conn = OpenCon();
    $sql = "SELECT * FROM schedule";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <th scope="row">' . $row["busNum"] . '</th>
                <td>' . $row["currentStop"] . '</td>
                <td>' . $row["nextStop"] . '</td>
                <td>' . $row["waitTime"] . ' minutes</td>
              </tr>';
      }
    } else {
      echo "<tr><td colspan='4'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
  </tbody>
</table>

