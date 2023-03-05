<?php
include "connection.php";

$sql = 'CREATE TABLE IF NOT EXISTS client ;';
$sql = 'CREATE TABLE IF NOT EXISTS project ;';
$sql = 'CREATE TABLE IF NOT EXISTS post ;';

if (mysqli_query($con_server,$sql)) {
    
} else {
    echo 'Error creating table: ' . mysqli_error() . "\n";
}

?>