<?php

// connecting to database
$servername = "localhost";
$username = "id16539570_prathamesh";
$password = "MsDhoni@7777";
$database = "id16539570_vegetabledb";

// Create a connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "";
}


?>