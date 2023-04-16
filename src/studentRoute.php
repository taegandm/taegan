<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<table class="table">
  <thead class = "table table-sm">
    <tr>
      <th scope="col">Route</th>
      <th scope="col">Stops</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'db_connect.php';
    $conn = OpenCon();
    $sql = "SELECT route_number, stop1, stop2, stop3, stop4 FROM routes;";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <th scope="row">' . $row["route_number"] . '</th>
                <td>' . $row["stop1"] . '</td>
                <td>' . $row["stop2"] . '</td>
                <td>' . $row["stop3"] . '</td>
                <td>' . $row["stop4"] . '</td>
              </tr>';
      }
    } else {
      echo "<tr><td colspan='4'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
  </tbody>
</table>