<?php
session_start();
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

            $sql = "SELECT Date,Total FROM `products` WHERE mobile_no='$mobile'";
            $result = mysqli_query($conn, $sql);
            // echo var_dump($result);
            
            // while($row = mysqli_fetch_assoc($result)){
                $data = array();
                foreach($result as $roww){
                    $data[] = $roww;
                }
            // }
            // print json_encode($data);

        }
      ?>