<?php 

    $host = "localhost";
    $username = "root";
    $password ="";
    $database = "barangay_system_db";
    $port = "3307";
    
    
    $con = new mysqli($host, $username, $password, $database, $port);

    if (!$con) {
        die(mysqli_error($con));
    }
    
    /* if ($con) {
        echo "connected";
    } else {
        die(mysqli_error($con));
    } */
?>

