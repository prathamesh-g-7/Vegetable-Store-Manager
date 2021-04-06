<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <style>
        #chart-container{
            width:640px;
            height:auto;
            margin-left:auto;
            margin-right:auto;
        }
        #myChart{
            
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="heading">
        <span class="float-left mt-5 dash"><a href="home.php" id="dashboard" style="font-size:18px">Dashboard</a> / Sale Report</span>
        <h2 class="text-center mt-5 " style="color:red">Your Sale</h2>
      </div>
    
    <div id="chart-container" class="mt-5">
      <canvas id="myChart" width="400px" height="400px"></canvas>
    </div>  
      

    

<table class="table w-75 mx-auto text-center" id="dataTable">
  <thead>
    <th>Date</th>
    <th>Selling Price</th>
    <th>Quantity</th>
    <th>Total</th>
  </thead>
  <tbody>
  <?php
        include '../connect.php';

        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{
            $user = $_SESSION["username"];
            $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
            $output = mysqli_query($conn, $mob);
            $value = mysqli_fetch_assoc($output);
            $mobile = $value['mobile_no'];

            $sql = "SELECT Date,Selling_Price,Quantity,Total FROM `products` WHERE mobile_no='$mobile'";
            $result = mysqli_query($conn, $sql);
            // echo var_dump($result);
            
            $num = mysqli_num_rows($result);

            if($num > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    // echo var_dump($row);
                    echo "<tr><td>". $row['Date']."</td><td>". $row['Selling_Price']."</td><td>". $row['Quantity']."</td><td>". $row['Total']."</td></tr>";
                    echo "<br>";
                   
                }
                $data = array();
                    foreach($result as $roww){
                        $data[] = $roww;
                    }
                // print json_encode($data);
            }

        }
      ?>
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/showChart.js" type="text/javascript"></script>
    <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        } 
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>