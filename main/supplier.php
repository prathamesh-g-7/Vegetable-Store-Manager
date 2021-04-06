<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>

    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        #foot{
            position:fixed;
            bottom: 0;
            width:100%;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="heading">
        <span class="float-left mt-5 dash"><a href="home.php" id="dashboard" style="font-size:18px">Dashboard</a> / Suppliers</span>
        <h2 class="text-center mt-5 " style="color:red">Supplier's Details</h2>
    </div>


    <!-- form start here -->
    <div class="bg-light w-100">
        <div class="w-50 mx-auto mt-5 "> 
            <form action="#" method="POST"  autocomlete="off">
                <div class="form-group col-xs-3">
                    <label for="inputdefault" class="form-label mt-2 mb-2">Select Supplier Name To Display Details :</label><br>
                    <!-- <label class="mt-2 mb-2">Supplier Name:</label> -->
                    
                    <select class="form-select" aria-label="Default select example" name="sup_name">
                        <?php 

                            include '../connect.php';

                            $user = $_SESSION["username"];
                            $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
                            $output = mysqli_query($conn, $mob);
                            $value = mysqli_fetch_assoc($output);
                            $mobile = $value['mobile_no'];

                            $result = mysqli_query($conn,"SELECT `Supplier_Name` FROM products WHERE mobile_no='$mobile'");
                            while($row = mysqli_fetch_array($result)) 
                            echo "<option >" . $row['Supplier_Name'] . "</option>";
                    ?>
                    </select>
                    
                    <div class="mx-auto row mt-3 mb-5">
                    <button type="submit" id="submit_btn" class="btn bg-info btn-lg btn-block text-white" >See Details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Display data in tabular form -->
    <div class="w-50 mx-auto">
        <table class="table table-bordered mb-5" id="tb">
            <thead class="bg-success">
                <tr class="text-white text-center">
                <th scope="col">Sr.No.</th>
                <th scope="col">Supplied Vegetable</th>
                <th scope="col" >Vegetable Type</th> 
                <th scope="col">Supplied With Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Date of Supply</th>
                <th scope="col">Total Cost</th>
                <!-- <th></th> -->
                </tr>
            </thead>
            <tbody class="bg-light text-center">

                <?php
                    include '../connect.php';
                    $counter = 1;

                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        
                        $sup_name = $_POST['sup_name'];

                        $user = $_SESSION["username"];
                        $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
                        $output = mysqli_query($conn, $mob);
                        $value = mysqli_fetch_assoc($output);
                        $mobile = $value['mobile_no'];
                        
                        $sql = "SELECT `Vegetable Name`,`Vegetable Type`,`Original_Price`,`Quantity`,`Date` FROM `products` WHERE mobile_no='$mobile' AND Supplier_Name = '$sup_name'";
                        $result = mysqli_query($conn, $sql);
                        

                        $sqll = "SELECT Original_Price*Quantity FROM products WHERE mobile_no='$mobile' AND Supplier_Name = '$sup_name'";
                        $resultt = mysqli_query($conn, $sqll);

                        $num = mysqli_num_rows($result);
                        

                        if($num > 0){

                            while($row = mysqli_fetch_assoc($result)) {

                                $roww = mysqli_fetch_assoc($resultt);
                                echo "<tr><td>" .$counter."</td><td>". $row['Vegetable Name']."</td><td>". $row['Vegetable Type']."</td><td>". $row['Original_Price']."</td><td>".$row['Quantity']."</td><td>".$row['Date']."</td><td>".$roww['Original_Price*Quantity']."</td></tr>";
                                echo "<br>";
                                $counter++;
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
                <th>  </th>
                <td class=" text-center">Total:</td>
                </tr>
                <tr>
				<th colspan="6"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
                <td colspan="1" class="text-center">
                    <strong style="font-size: 12px; color: #222222;">
                    <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        

                        $user = $_SESSION["username"];
                        $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
                        $output = mysqli_query($conn, $mob);
                        $value = mysqli_fetch_assoc($output);
                        $mobile = $value['mobile_no'];

                        $sql = "SELECT SUM(Original_Price*Quantity) FROM products WHERE mobile_no='$mobile' AND Supplier_Name = '$sup_name'";
                        $result = mysqli_query($conn, $sql);
                        // $num = mysqli_num_rows($result);
                        // $row = mysqli_fetch_assoc($result);

                        while($row = mysqli_fetch_array($result)){
                            echo $row['SUM(Original_Price*Quantity)'];
                        }
                        
                    }
                    ?>
                    </strong>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer id="foot"><?php include 'footer.php'; ?></footer>
</body>
</html>