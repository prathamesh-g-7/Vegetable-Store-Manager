<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    
    <title>Home</title>
</head>
<body>

    <?php include 'nav.php' ?>
    <?php include '../auth_session.php' ?>
    
    <div class="heading">
        <span class="float-left mt-5 dash"><a href="home.php" id="dashboard" style="font-size:18px">Dashboard</a> / Home</span>
        <h1 class="text-center mt-5" style="color:red">VEGETABLE STORE</h1>
    </div>

    <!-- div for first 3 cards -->
    <div class="mx-auto mt-5 mb-5 main-content" style="width:70%">  
        <div class="row">
            <div class="col-sm-4">
                <div class="card h-100">
                    <img src="../images/products.png" class="card-img-top" alt="..." style="width:50% jusstify-content:center">
                    <div class="card-body ">
                        <h5 class="card-title" style="text-align:center">Products</h5>
                        <div class="text-center">
                        <a href="products.php" class="btn btn-primary mt-5" style="width:100%">Add Products</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card h-100">
                    <img src="../images/customer.jpg" class="card-img-top" alt="..." style="width:50% jusstify-content:center">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Customers</h5>
                        <div class="text-center">
                        <a href="customer.php" class="btn btn-primary mt-4" style="width:100%">Customer Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card h-100">
                    <img src="../images/saleImg.jpeg" class="card-img-top mt-3" alt="..." style="width:50% jusstify-content:center">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Sales</h5>
                        <div class="text-center">
                        <a href="sales.php" class="btn btn-primary mt-5" style="width:100%">Check Sale</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>

    <!-- div for last 3 cards -->
    <div class="mx-auto mt-5 mb-5" style="width:70%">  
        <div class="row card-deck text center">
            <div class="col-sm-4">
                <div class="card h-100">
                    <img src="../images/supplier.jpg" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title" style="text-align:center">Suppliers</h5>
                        <div class="text-center">
                        <a href="supplier.php" class="align-self-end  btn-block btn btn-primary mt-5" style="width:100%">Manage Supplier Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card h-100">
                    <img src="../images/salesReport.png" class="card-img-top" alt="..." style="width:50% jusstify-content:center">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Sales Report</h5>
                        <div class="text-center">
                        <a href="sales_report.php" class="btn btn-primary mt-4" style="width:100%">Ckeck Sales Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card h-100">
                    <img src="../images/logout.jpg" class="card-img-top" alt="..." style="width:50% height:30% jusstify-content:center">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Leave Dashboard</h5>
                        <div class="text-center">
                        <a href="../logout.php" class="btn btn-primary" style="width:100%">Logout</a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    </div>

    <?php include 'footer.php'; ?>   

</body>
</html>


<?php

?>