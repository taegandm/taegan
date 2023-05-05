<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<table class="table">
  <thead class = "table table-striped thead-dark">
    <tr>
      <th scope="col">Bus #</th>
      <th scope="col">Route</th>
      <th scope="col">Current Stop</th>
      <th scope="col">Next Stop</th>
      <th scope="col">Wait Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'db_connect.php';
    $conn = OpenCon();
    $sql = "SELECT bus_number, current_stop, next_stop, arrived, route FROM current_buses";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
            <th scope="row">' . $row["bus_number"] . '</th>
            <td>' . $row["route"] . '</td>
            <td>' . $row["current_stop"] . '</td>
            <td>' . $row["next_stop"] . '</td>';

        if ($row["arrived"] == 1) {
            echo '<td>Arrived</td>';
        } 
        else {
          $waitTimeQuery = "SELECT wait_time FROM WaitTime WHERE current_stop = '" . $row["current_stop"] . "' AND next_stop = '" . $row["next_stop"] . "'";
            $waitTimeResult = $conn->query($waitTimeQuery);

            if ($waitTimeResult->num_rows > 0) {
                $waitTimeRow = $waitTimeResult->fetch_assoc();
                $waitTime = $waitTimeRow["wait_time"];
                echo '<td>' . $waitTime . ' minutes</td>';
            } else {
                echo '<td>Wait time not available</td>';
            }
        }

        echo '</tr>';
    }
}

    else {
      echo "<tr><td colspan='4'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
  </tbody>
</table>
