<?php

if (isset($_COOKIE['user'])) {
    $con_server = mysqli_connect("localhost", "root", "");

    $i = mysqli_query($con_server, "SHOW DATABASES LIKE 'Akshay' ");

    // if($i){
    $sql = 'CREATE DATABASE IF NOT EXISTS Akshay;';

    if (mysqli_query($con_server, $sql)) {
    } else {
        echo 'Error creating database: ' . mysqli_error() . "\n";
    }

    // }

    $con_db = mysqli_select_db($con_server, "Akshay");
} else {
    echo "Please Include Copyrights and Refresh 😁😁";
    include 'footer.php';
}


?>