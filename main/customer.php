<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>
<body>

    <?php include 'nav.php'; ?>


    <!-- insert into customer table -->
    <?php
    include '../connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cust_name = $_POST['cust_name'];
        $c_add = $_POST['c_add'];
        $contact = $_POST['contact'];
        $note = $_POST['note'];

        $user = $_SESSION["username"];
        $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
        $output = mysqli_query($conn, $mob);
        $value = mysqli_fetch_assoc($output);
        $mobile = $value['mobile_no'];

        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `customer` (`Customer Name`, `Address`, `Contact No`, `Note`,`mobile_no`) VALUES ('$cust_name', '$c_add', '$contact', '$note','$mobile');";

        $result = mysqli_query($conn, $sql);
        // echo var_dump($result);
        }

        if($result){
            echo '<div class="cls_btn text-center alert alert-success alert-dismissible fade show" role="alert" id="content">
            <strong>Success!</strong> Customer entry has been submitted successfully!
            <button type="button" id="cls" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" ">×</span>
            </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert" id="content">
            <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
            <button type="button" id="cls class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>';
        }

    }

    ?>
    <div class="heading">
        <span class="float-left mt-5 dash"><a href="home.php" id="dashboard" style="font-size:18px">Dashboard</a> / Customers</span>
        <h2 class="mt-5 text-center" style="color:red">Add Customer Details</h2>
    </div>
    <div class="bg-light w-100">
        <div class="w-25 mx-auto mt-5 "> 
        <!-- form start here -->
            <form action="#" method="post" autocomlete="off" >
                <div class="form-group col-xs-3">
                <label for="inputdefault" class="form-label">Customer Name :</label>
                <input class="form-control" id="cust_name" type="text" name="cust_name" placeholder="Name" require>
                </div>
                <div class="form-group col-xs-3">
                <label for="inputdefault" class="form-label">Customer Address :</label>
                <input class="form-control" id="c_add" type="text" name="c_add" placeholder="Address" >
                </div>
                <div class="form-group col-xs-3">
                <label for="inputdefault" class="form-label">Customer Contact :</label>
                <input class="form-control" id="contact" type="number" name="contact" placeholder="Mobile No." require>
                </div>
                <div class="form-group col-xs-3">
                <label for="inputdefault" class="form-label">Note :</label>
                <input class="form-control" id="note" type="text" name="note" placeholder="Extra Info" >
                </div>
                <div class="mx-auto row mt-3 mb-5">
                <button type="submit" id="submit_btn" class="btn btn-info btn-lg btn-block text-white" >Submit</button>
                </div>
        </div>
    </div>

        <!-- Table to display database records -->

        <div class="w-50 mx-auto mt-1">
            <table class="table" id="cust_tb">
                <thead class="bg-success">
                    <tr class="text-white text-center">
                    <th scope="col">Sr.No.</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col" >Customer Address</th>
                    <th scope="col">Customer Contact</th>
                    <th scope="col">Note</th>
                    <th></th>
                    </tr>
                </thead>
            <tbody class="text-center">
            <?php

                // display database records
                include '../connect.php';

                $counter = 1;

                // if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //     $cust_name = $_POST['cust_name'];
                //     $c_add = $_POST['c_add'];
                //     $contact = $_POST['contact'];
                //     $note = $_POST['note'];



                    if (!$conn){
                        die("Sorry we failed to connect: ". mysqli_connect_error());
                    }
                    else{
                        $user = $_SESSION["username"];
                        $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
                        $output = mysqli_query($conn, $mob);
                        $value = mysqli_fetch_assoc($output);
                        $mobile = $value['mobile_no'];

                        $sql = "SELECT * FROM `customer` WHERE mobile_no='$mobile'";
                        $result = mysqli_query($conn, $sql);
                        

                        // Find the number of records returned
                        $num = mysqli_num_rows($result);
                        

                        if($num > 0){
                            //     $row = mysqli_fetch_assoc($result);
                            //     echo var_dump($row);
                            //     echo "<br>";
                            // }

                            while($row = mysqli_fetch_assoc($result)) {
                                        // echo var_dump($row);
                                        echo "<tr><td>" .$counter."</td><td>". $row['Customer Name']."</td><td>". $row['Address']."</td><td>". $row['Contact No']."</td><td>". $row['Note']."</td></tr>";
                                        echo "<br>";
                                        $counter++;
                            }
                        }
                    }
                // } 

            ?>
            </tbody>
            </table>
        </div>

        

    <?php include 'footer.php'; ?>
    <script src="./js/script.js"  type="text/javascript"></script>  
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        } 
    </script> 
</body>
</html>