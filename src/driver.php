<?php
  include __DIR__ . '../db_connect.php';

  //save bus number to a local php variable
  session_start();
  $bus_number = $_SESSION['bus_number'];
  $route = $_SESSION['route'];
  $starting_stop = $_SESSION['starting_stop'];

  $conn = OpenCon();

  // Build the MySQL query
  $query = "SELECT * FROM routes WHERE route_number = $route";

  // Execute the query and retrieve the result set
  $result = mysqli_query($conn, $query);

  // Get the first row of the result set
  $row = mysqli_fetch_assoc($result);

  // Initialize an array to hold the stop columns
  $columns = [];

  // Initialize an array to hold the retrieved data
  $data = [];

  // Iterate through the row's columns until a NULL value is encountered
  foreach ($row as $key => $value) {
      // Skip the 'route_number' column
      if ($key === 'route_number') {
          continue;
      }

      // Stop iterating if a NULL value is encountered
      if ($value === null) {
          break;
      }

      // Add the column value to the array
      $data[] = $value;
    }
    
    // Encode the PHP array as a JSON string
    $json_data = json_encode($data);

    // Output the JSON string to your JavaScript code
    echo '<script>var stops = ' . $json_data . ';</script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="..\CSS\driver.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body onload="startup()" >
    <nav class="navbar navbar-dark sticky-top color-msu">
        <div class="container-fluid">
          <a class="navbar-brand display-1 header-text" href="#"><img id="logo" src="..\media\msu.png" alt="MSU Logo">Driver Home</a>
          <div class="navbar-nav">
            <form method="post" action="driver_logout.php" id="logout-form">
              <input type="hidden" id="bus_number_current" name="bus_number" value="">
              <button type="submit" class="btn btn-link btn-color-msu">Logout</button>
            </form>
          </div>       
        </div>
      </nav>
    
      <section id="content">
        <div class="container-fluid">
            <div class="row g-2">
                <div class="col-md-6 col-sm-12 g-2 text-center">
                    <h5 id="current-title" class="display-6 text-left stop-text-size pb-2 subtitle">Current Stop: <span id="current-stop"></span></h5>
                    <h5 id="next-title" class="display-6 text-left stop-text-size pb-2">Next Stop: <span id="next-stop"></span></h5>
                    <button id="stop-button" type="button" class="btn btn-color-msu-scaling active col-6 mt-3" data-bs-toggle="button" onclick="switchStop()">In Transit</button> 
                </div>
                <div class="col-md-6 col-sm-12 g-2 text-center">
                    <!-- Button trigger modal -->
                    <h5 id="current-title" class="display-6 text-left stop-text-size pb-2 subtitle">Manage Alerts</h5>
                    <button type="button" class="btn btn-color-msu-scaling col-6" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create Alert
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Alert</h5>
                          </div>
                          <form action="submit_alert.php" method="POST" id="alert-form">
                          <input type="hidden" id="bus_number_alert" name="bus_number" value="">
                          <input type="hidden" id="route_current" name="route" value="">
                          <input type="hidden" id="starting_stop_current" name="starting_stop" value="">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="alertTitle" class="form-label">Alert Title</label>
                                <input type="text" class="form-control" id="alertTitle" name="alertTitle">
                              </div>
                              <div class="mb-3">
                                <label for="alertDetails" class="form-label">Alert Details</label>
                                <textarea class="form-control" id="alertDetails" name="alertDetails"></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-color-msu">Submit Alert</button>
                            </div>
                          </form>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row subtitle mt-4">
                  <!--View Alert Section-->
                  <h5 id="current-title" class="display-6 text-center stop-text-size pb-2 subtitle">Recent Alerts</h5>
                  <div class="col-1"></div>
                  <div class="col-10">
                    <table id="alerts-table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Details</th>
                          <th scope="col">Date/Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- The table body will be updated dynamically -->
                      </tbody>
                    </table>
                  </div>
                  <div class="col-1"></div>
                </div>
            </div>
        </div>
      </section>

      <!-- Footer section -->
      <section id="footer-section">
        <div class="container text-center stick-footer">
          <div class="row">
            <div class="col-12">
              <p class="align-middle">&copy Montclair State University 2023</p>
            </div>
          </div>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
      //variables to store bus information
      var bus_number;
      var route;
      var starting_stop;

      //get the alert form, as well as the text sections for title and details
      const alertForm = document.getElementById("alert-form");
      const alertTitleInput = document.getElementById("alertTitle");
      const alertDetailsInput = document.getElementById("alertDetails");

      //store the locations for the current and next stop to be displayed
      const current_stop = document.getElementById("current-stop");
      const next_stop = document.getElementById("next-stop");
      const stop_button = document.getElementById("stop-button");

      //variables for storing which stop driver is on
      var current_counter;
      var next_counter;

      //switch current and next stop
      var change_stop = 0;
      const num_stops = stops.length;

      //save bus number to a hidden input box on the page, that way the 
      //$bus_number variable can change to accomodate multiple bus drivers
      function startup() {
        //save php variables into a javascript variable
        bus_number = "<?php echo $bus_number ?>";
        route = "<?php echo $route ?>";
        starting_stop = "<?php echo $starting_stop ?>";

        //insert into the hiddent input boxes
        document.getElementById("bus_number_current").value = bus_number;
        document.getElementById("bus_number_alert").value = bus_number;
        document.getElementById("route_current").value = route;
        document.getElementById("starting_stop_current").value = starting_stop;

        //set values for counter
        current_counter = parseInt(document.getElementById("starting_stop_current").value);
        next_counter = current_counter + 1;

        //make sure counters stay in stop range
        if(current_counter >= num_stops) {
          current_counter = 0;
          next_counter = 1;
        }

        if(next_counter >= num_stops) {
          next_counter = 0;
        }

        //set initial stops
        current_stop.textContent = stops[current_counter];
        next_stop.textContent = stops[next_counter];

        //get initial alerts
        updateAlerts();
        bus_in_transit(bus_number, stops[current_counter], stops[next_counter]);
      }

      function switchStop() {
        //if toggled
        if(change_stop) 
        {
          //switch current and next stop
          current_stop.textContent = stops[current_counter];
          next_stop.textContent = stops[next_counter];
          stop_button.textContent = "In Transit";
          change_stop = 0;
          bus_in_transit();
        } 
        
        //if untoggled
        else 
        {
          //increment the counters to grab the next stop from the array
          current_counter++;
          next_counter++;
          stop_button.textContent = "Arrived at Stop";
          if(current_counter == num_stops) {
            current_counter = 0;
          }
          if(next_counter == num_stops) {
            next_counter = 0;
          }
          change_stop = 1;
          bus_arrived();
        }
      }

      alertForm.addEventListener("submit", (event) => {
        //save the current stop so that it matches the driver when the page is reloaded
        document.getElementById("starting_stop_current").value = current_counter;

        //check that both fields have some text in them
        if (!alertTitleInput.value || !alertDetailsInput.value) {
          event.preventDefault();
          alert("Please fill in both fields");
        }
      });

      // Define the function that updates the table
      function updateAlerts() {
        // Send an AJAX request to fetch the data
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Parse the JSON response
            var data = JSON.parse(this.responseText);

            // Build the HTML for the table body
            var tbodyHtml = "";
            for (var i = 0; i < data.length; i++) {
              tbodyHtml += "<tr>";
              tbodyHtml += "<td>" + data[i].title + "</td>";
              tbodyHtml += "<td>" + data[i].details + "</td>";
              tbodyHtml += "<td>" + data[i].dt + "</td>";
              tbodyHtml += "</tr>";
            }

            // Update the table body
            document.getElementById("alerts-table").getElementsByTagName("tbody")[0].innerHTML = tbodyHtml;
          }
        };
        xmlhttp.open("GET", "get_alerts.php", true);
        xmlhttp.send();
      }

      // Update the table every 5 seconds
      setInterval(updateAlerts, 5000);

      function bus_in_transit()
      {
        $.ajax({
          type: 'POST',
          url: 'bus_in_transit.php',
          data: {
            bus_number: bus_number,
            current_stop: stops[current_counter],
            next_stop: stops[next_counter],
            arrived: 0
          },
          success: function(response) {
            console.log(response);
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      }

      function bus_arrived()
      {
        $.ajax({
          type: 'POST',
          url: 'bus_arrived.php',
          data: {
            bus_number: bus_number,
            arrived: 1
          },
          success: function(response) {
            console.log(response);
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      }
    </script>
</body>
</html>
