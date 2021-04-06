<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sales</title>

    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="heading">
        <span class="float-left mt-5 dash"><a href="home.php" id="dashboard" style="font-size:18px">Dashboard</a> / Sales</span>
        <h2 class="text-center mt-5 " style="color:red">Check Sale</h2>
    </div>

      <!-- form start here -->
      <div class="bg-light w-100">
        <div class="w-50 mx-auto mt-5 "> 
            <form action="#" method="post"  autocomlete="off">
                <div class="form-group col-xs-3">
                    <label for="inputdefault" class="form-label">Select a Date To Display Sale From Selected Date :</label><br>
                    <label class="mt-2">From:</label>
                    <input class="form-control mb-3" id="from_date" type="date" name="from_date" placeholder="From" require>
                    <label>To:</label>
                    <input class="form-control" id="to_date" type="date" name="to_date" placeholder="to" require>
                    <div class="mx-auto row mt-3 mb-5">
                    <button type="submit" id="submit_btn" class="btn btn-success btn-lg btn-block text-white" >Check sale Details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table to display sales -->
    <table class="table table-bordered w-75 mx-auto mt-2 mb-5" id="resultTable" data-responsive="table">
	<thead class="bg-secondary text-white text-center">
		<tr>
			<th> Vegetable Name </th>
			<th> Original Price </th>
			<th> Selling Price </th>
			<th> Quantity </th>
			<th> Date </th>
			<th> Amount </th>
			<th> Profit </th>
		</tr>
	</thead>
	<tbody class="bg-light text-center">

    <?php

     // display database records
       include '../connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $from_date = $_POST['from_date'];
       $to_date = $_POST['to_date'];

       if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
       }
        else{

            $user = $_SESSION["username"];
            $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
            $output = mysqli_query($conn, $mob);
            $value = mysqli_fetch_assoc($output);
            $mobile = $value['mobile_no'];

            $sql = "SELECT `Vegetable Name`, `Vegetable Type`, `Supplier_Name`, `Original_Price`, `Selling_Price`, `Quantity`, `Total`, `Date` FROM `products` where Date <='$to_date' AND Date >= '$from_date' AND mobile_no='$mobile' ";

            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            $profit = "SELECT (Selling_Price-Original_Price)*Quantity FROM products WHERE Date >= '$from_date' AND Date <= '$to_date' AND mobile_no='$mobile'";

            if(mysqli_query($conn, $profit)){
                $resultt = mysqli_query($conn, $profit);
            } 
            else{
                echo "not query";
            }   

            if($num > 0){
                while($row = mysqli_fetch_assoc($result) ) {

                    $roww = mysqli_fetch_assoc($resultt);
                        echo "</td><td>". $row['Vegetable Name']."</td><td>". $row['Original_Price']."</td><td>". $row['Selling_Price']."</td><td>". $row['Quantity']."</td><td>".$row['Date']."</td><td>".$row['Total']."</td><td>".$roww['(Selling_Price-Original_Price)*Quantity']."</td></tr>";
                        echo "<br>";
                }
            }
        }
    }
?>

		<tr>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td class="font-weight-bold text-center"> Total Amount </td>
			<td class="font-weight-bold text-center"> Total Profit </td>
			<!-- <th>  </th> -->
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1" class="text-center">
                    <strong style="font-size: 12px; color: #222222;">
                    <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $from_date = $_POST['from_date'];
                        $to_date = $_POST['to_date'];

                        $user = $_SESSION["username"];
                        $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
                        $output = mysqli_query($conn, $mob);
                        $value = mysqli_fetch_assoc($output);
                        $mobile = $value['mobile_no'];

                        $sql = "SELECT SUM(Total) FROM products where Date <='$to_date' AND Date >= '$from_date' AND mobile_no='$mobile'";
                        $result = mysqli_query($conn, $sql);
                        // $num = mysqli_num_rows($result);
                        // $row = mysqli_fetch_assoc($result);

                        while($row = mysqli_fetch_array($result)){
                            echo $row['SUM(Total)'];
                        }
                        
                    }
                    ?>
                    </strong>
                </td>
				<td colspan="1" class="text-center">
                    <strong style="font-size: 12px; color: #222222;">
                    
                    <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $from_date = $_POST['from_date'];
                        $to_date = $_POST['to_date'];


                        $user = $_SESSION["username"];
                        $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
                        $output = mysqli_query($conn, $mob);
                        $value = mysqli_fetch_assoc($output);
                        $mobile = $value['mobile_no'];


                        $sql = "SELECT SUM((Selling_Price-Original_Price)*Quantity) FROM products where Date <='$to_date' AND Date >= '$from_date' AND mobile_no='$mobile'";
                        $result = mysqli_query($conn, $sql);
                        // $num = mysqli_num_rows($result);
                        // $row = mysqli_fetch_assoc($result);

                        while($row = mysqli_fetch_array($result)){
                            echo $row['SUM((Selling_Price-Original_Price)*Quantity)'];
                        }
                        
                    }
                    ?>

                    </strong>		
				</td>
            
			</tr>
	
	</tbody>
</table>


<?php include 'footer.php'; ?>
</body>
</html>