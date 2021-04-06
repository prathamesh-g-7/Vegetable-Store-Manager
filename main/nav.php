
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/style.css"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    

    <title></title>
</head>
<body>
    
    <?php include '../connect.php' ?>
    <?php 
    session_start();
    include '../auth_session.php' ?>

<div class="mb-5">
<nav class="navbar navbar-expand-lg navbar-light  bg-dark fixed-top">
    <div class="container-fluid ">
        <a class="navbar-brand text-white fs-4" href="home.php">Vegetable Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
            <a class="nav-link active text-white fs-5" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white fs-5" href="products.php">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white fs-5" href="customer.php">Customers</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white fs-5" href="sales.php">Sales</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white fs-5" href="supplier.php">Suppliers</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white fs-5" href="sales_report.php">Sales Report</a>
            </li>
        </div>

        <ul class="ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;<?php echo "Welcome: " . $_SESSION['username']; ?></a>
            </li>
        </ul>
        <ul class="ml-auto">
            <li class="nav-item">
                <span class="nav-link text-white"><i class="fas fa-calendar-week"></i> &nbsp; Date:<span id="timeDate"></span></span>
            </li>
        </ul>
        <ul class="ml-auto">
            <li class="nav-item">
                <span class="nav-link text-white"><i class="fas fa-clock"></i> &nbsp;Time:<time id="time"></time></span>
            </li>
        </ul>
        <ul class="ml-auto">
            <li class="nav-item">
                <a class="nav-link font-weight-bold bg-danger text-white" href="../logout.php">Logout</a>
            </li>
        </ul>

        </ul>
    </div>
    </nav>
</div>

<!-- <script type="text/javascript" src="js/timeScript.js"></script> -->
<script type="text/javascript" src="../js/timeScript.js"></script>
<script type="text/javascript" src="../js/dateScript.js"></script>
<script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        } 
</script>
</body>
</html>
