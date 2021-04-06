<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Products</title>
</head>
<body>

    <?php include 'nav.php'; ?>

    <?php
    include '../connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $veg_name = $_POST['veg_name'];
        $veg_type = $_POST['veg_type'];
        $supp_name = $_POST['supp_name'];
        $org_price = $_POST['org_price'];
        $sel_price = $_POST['sel_price'];
        $qnt = $_POST['qnt'];
        $total = $_POST['total'];
        $date = $_POST['date'];
        
        $user = $_SESSION["username"];
        $mob = "SELECT mobile_no FROM `users` WHERE username = '$user' ";
        $output = mysqli_query($conn, $mob);
        $value = mysqli_fetch_assoc($output);
        $mobile = $value['mobile_no'];
        // echo $mobile;


        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{ 

          // Submit these to a database
          // Sql query to be executed 
          $sql = "INSERT INTO `products` (`Vegetable Name`, `Vegetable Type`, `Supplier_Name`, `Original_Price`, `Selling_Price`, `Quantity`, `Total`,`Date`,`mobile_no`) VALUES ('$veg_name', '$veg_type', '$supp_name', '$org_price', '$sel_price', '$qnt', '$total','$date','$mobile');";
          $result = mysqli_query($conn, $sql);
          // echo var_dump($result);
        }

          if($result){
            echo '<div class="text-center alert alert-success alert-dismissible fade show" role="alert" id="content">
            <strong>Success!</strong> Your entry has been submitted successfully!
            <button type="button" id="cls class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
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

<!-- onsubmit="event.preventDefault();displayData();" -->

      <div class="heading">
        <span class="float-left mt-5 dash"><a href="home.php" id="dashboard" style="font-size:18px">Dashboard</a> / Products</span>
        <h2 class="text-center mt-5 " style="color:red">Add Vegetable Details</h2>
      </div>
      
 <div class="bg-light w-100">
   <div class="w-25 mx-auto mt-5 "> 
   <!-- form start here -->
    <form action="#" method="post"  autocomlete="off">
    <div class="form-group col-xs-3">
      <label for="inputdefault" class="form-label">Vegetable Name :</label>
      <input class="form-control" id="v_name" type="text" name="veg_name" placeholder="Enter Vegetable Name" require>
    </div>
    <div class="form-group">
      <label for="inputlg" class="form-label">Vegetable Type :</label>
      <input class="form-control input-lg" id="v_type" type="text" name="veg_type" placeholder="Enetr Type if any">
    </div>
    <div class="form-group">
      <label for="inputsm" class="form-label">Supplier Name :</label>
      <input class="form-control input-sm" id="sp_name" type="text" name="supp_name" placeholder="Enter Full Name of Supplier" require>
    </div>
    <div class="form-group">
      <label for="inputsm" class="form-label">Original Price :</label>
      <input class="form-control input-sm" id="o_price" type="number" name="org_price" placeholder="Enter Original Price" require>
    </div>
    <div class="form-group">
      <label for="inputsm" class="form-label">Selling Price :</label>
      <input class="form-control input-sm" id="s_price" type="number" name="sel_price" placeholder="Enter Selling Price" onkeyup="calculateTotal()">
    </div>
    <div class="form-group">
      <label for="inputsm" class="form-label">Quantity :</label>
      <input class="form-control input-sm" id="qnt" type="number" name="qnt" placeholder="Quantity of vegetable" onkeyup="calculateTotal()" require>
    </div>
    <div class="form-group">
      <label for="inputsm" class="form-label">Total :</label>
      <input class="form-control input-sm bckground" id="total" type="number" name="total" >
    </div>
    <div class="form-group">
      <label for="inputsm" class="form-label">Date :</label>
      <input class="form-control input-sm bckground" id="date" type="date" name="date" >
    </div>
    <div class="mx-auto row mt-3 mb-5">
    <button type="submit" id="submit_btn" class="btn btn-info btn-lg btn-block text-white" >Submit</button>
    </div>
  </form>
</div>
</div>





<!-- Table to display product's data -->

<div class="w-50 mx-auto">
    <table class="table" id="tb">
      <thead class="bg-success">
        <tr class="text-white text-center">
          <th scope="col">Sr.No.</th>
          <th scope="col">Vegetable Name</th>
          <th scope="col" >Vegetable Type</th>
          <th scope="col">Supplier Name</th>
          <th scope="col">Original Price</th>
          <th scope="col">Selling Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
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
            // echo $mobile;

              $sql = "SELECT * FROM `products` WHERE mobile_no='$mobile'";
              $result = mysqli_query($conn, $sql);
              if(!$result){
                echo "result error";
              }
              

              // Find the number of records returned
              // $num = mysqli_num_rows($result);
              
              $num = mysqli_num_rows($result);

              if($num > 0){
                  //     $row = mysqli_fetch_assoc($result);
                  //     echo var_dump($row);
                  //     echo "<br>";
                  // }

                  while($row = mysqli_fetch_assoc($result)) {
                              // echo var_dump($row);
                              echo "<tr><td>" .$counter."</td><td>". $row['Vegetable Name']."</td><td>". $row['Vegetable Type']."</td><td>". $row['Supplier_Name']."</td><td>". $row['Original_Price']."</td><td>".$row['Selling_Price']."</td><td>".$row['Quantity']."</td><td>".$row['Total']."</td></tr>";
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

    <script src="../js/script.js"  type="text/javascript"></script>
    <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        } 
    </script>
</body>
</html>