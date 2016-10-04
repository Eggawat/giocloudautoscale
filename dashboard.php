<?php
    //monitoring
    $cpu = shell_exec("top -bn2 | awk '/Cpu\(s\):/ { print 100-$8 }'| awk 'NR==2'");
    $memory = shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
            <div class="row">
                <h3>Autoscaling</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>CPU Usage</th>
                      <th>Memory Usage</th>
                      <th>Last VM Created</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			// Check connection
                        if (mysqli_connect_errno())
                        {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        // Perform queries
                        $query = "SELECT * FROM vm ORDER BY id DESC LIMIT 1";
                        $result = mysqli_query($con,$query);
                        $row=mysqli_fetch_assoc($result);

                            echo '<tr>';
                            echo '<td>'. $cpu . '</td>';
                            echo '<td>'. $memory . '</td>';
                            echo '<td>'. $row['vmname'] . '</td>';
                            echo '</td>';
                            echo '</tr>';

                   mysqli_close($con);
                  ?>
                  </tbody>
            </table>
        </div>

           <div class="row">
                <h3>Current VM Running</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>VM Name</th>
                      <th>VM ID</th>
                      <th>IP</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			// Check connection
                        if (mysqli_connect_errno())
                        {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        // Perform queries
                        $query = "SELECT * FROM vm ORDER BY id DESC";
                        $result = mysqli_query($con,$query);

                        if ($result->num_rows > 0){
                            while ($row=$result->fetch_assoc()){
                                $status = shell_exec("ping ".$row['ip']." -c 1 -W 1 |grep received|awk '{print substr($4,1,100)}'");
                                echo '<tr>';
                                echo '<td>'. $row['id'] .'</td>';
                                echo '<td>'. $row['vmname'] .'</td>';
                                echo '<td>'. $row['vmid'] .'</td>';
                                echo '<td>'. $row['ip'] .'</td>';
                                if ($status == 0){
                                    echo '<td> NOT OK </td>';
                                } else {
                                    echo '<td> OK </td>';
                                }
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                        echo "0results";
                        }
                   mysqli_close($con);
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>

