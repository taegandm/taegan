<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="../CSS/driver.css" rel="stylesheet" type="text/css"/>
      <link rel="shortcut icon" href="/media/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <body>
        <nav class="navbar navbar-dark sticky-top color-msu">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img id="logo" src="..\media\msu.png" alt="MSU Logo"></a>
            <span class="navbar-brand mb-0 h1 header-text display-1 text-left">Select Bus and Route</span>            
          </div>
        </nav>

        <section id="buses">
            <div id="bus-container" class="container ms-auto">
                <div class="row g-2">
                  <div class="col p-2">
                    <h5 id="bus-title" class="display-6 text-left subtitle">Select Bus</h5>
                  </div>
                </div>
                <div class="row g-2 text-wrap align-middle">
                  <div id="route-col" class="col-12 col-md-6 p-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Bus Number:</span>
                        </div>
                        <input id="busNumber" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                  </div>
                </div>
            </div>
        </section>

        <section id="routes">
          <div id="route-container" class="container ms-auto">
            <div class="row g-2">
              <div class="col p-2">
                <h5 id="route-title" class="display-6 text-left subtitle">Select Route</h5>
              </div>
            </div>
            <div class="row g-2 text-wrap align-middle">
              <table id="route-table" class="table table-striped table-bordered text-center">
                <?php
                include __DIR__ . '../db_connect.php';

                // Create connection
                $conn = OpenCon();

                // Check connection
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                // SQL query to retrieve data from "routes" table
                $sql = "SELECT * FROM routes";

                // Execute query and store result
                $result = mysqli_query($conn, $sql);

                // Check if result contains any rows
                if (mysqli_num_rows($result) > 0) {
                  // Output table header
                  echo "<tr><th>Route Number</th><th>Stop 1</th><th>Stop 2</th><th>Stop 3</th><th>Stop 4</th></tr>";
                  
                  // Loop through rows of result and output data in table rows
                  while($row = mysqli_fetch_assoc($result)) {
                    // Output a new row for each route
                    echo "<tr>";
                    
                    // Output the route ID
                    echo "<td>".$row["route_number"]."</td>";

                    // Determine the number of stop columns by counting the number of columns in the row and subtracting 2 (for the "id" and "route_number" columns)
                    $num_stops = mysqli_num_fields($result) - 1;
                    
                    // Loop through the "stop" columns and output each stop until a null value is reached or all stops have been output
                    for ($i = 1; $i <= $num_stops; $i++) {
                      $stop = "stop".$i;
                      if ($row[$stop] != null) {
                        echo "<td>".$row[$stop]."</td>";
                      } else {
                        break;
                      }
                    }
                    
                    // Output the closing tag for the row
                    echo "</tr>";
                  }
                  
                } else {
                  echo "No routes found.";
                }
                ?>
              </table>
            </div>
            <div class="row g-2 text-wrap align-middle">
              <div id="route-col" class="col-12 col-md-6 p-2">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="First group">
                    <?php
                    // Create connection
                    $conn = OpenCon();

                    // Check connection
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }

                    // SQL query to retrieve data from "routes" table
                    $sql = "SELECT route_number FROM routes";

                    // Execute query and store result
                    $result = mysqli_query($conn, $sql);

                    // Check if result contains any rows
                    if (mysqli_num_rows($result) > 0) {
                      // Loop through rows of result and output data in table rows
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '<td><button type="button" onClick="choose('.$row["route_number"].')" class="btn btn-danger">Route '.$row["route_number"].'</button></td>';
                      }
                    }
                    // Close connection
                    CloseCon($conn);
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="submit">
          <div class="container-fluid ms-auto">
            <div class="row gx-3 px-5 text-wrap align-middle subtitle mb-3">
              <form action="driver_submit.php" method="POST" id="register-form">
                <input type="hidden" id="busNumber-submit" name="busNumber" value="">
                <input type="hidden" id="route-submit" name="route" value="">
                <button type="submit" class="btn btn-color-msu btn-lg btn-block">Submit</button>
              </form>
            </div>
          </div>
        </section>

        <!-- Footer section -->
        <section id="footer-section">
            <div class="container text-center">
            <div class="row">
                <div class="col-12">
                <p class="align-middle">&copy Montclair State University 2023</p>
                </div>
            </div>
            </div>
        </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script>
      var route = -1;
      var bus = document.getElementById("busNumber");
      const registerForm = document.getElementById("register-form");
    
      function choose(choice) {
        route = choice;

        //send data into hidden input field so it is accessible in driver_submit.php
        document.getElementById("route-submit").value = route;
      }
    
      registerForm.addEventListener("submit", (event) => {
        document.getElementById("busNumber-submit").value = bus.value;
        if (bus.value == "" || route == -1) {
          event.preventDefault();
          alert("Please fill in both fields");
        }
      });
    </script>
  </body>
</html>