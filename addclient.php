<?php

include "connection.php";

if(isset($_POST['cName']) && isset($_POST['cemail']) && isset($_POST['cnumber']) && isset($_POST['cCompany']) && isset($_POST['cProject']) ){

    $name = $_POST['cName'];
    $email = $_POST['cemail'];
    $number = $_POST['cnumber'];
    $company = $_POST['cCompany'];
    $project = $_POST['cProject'];

}

?>