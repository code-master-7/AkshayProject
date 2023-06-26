<?php

include "connection.php";
include "enc.php";

if (isset($_POST['cName']) && isset($_POST['cemail']) && isset($_POST['cnumber']) && isset($_POST['cCompany']) && isset($_POST['cProject']) && isset($_POST['project_id'])) {

    $name = $_POST['cName'];
    $email = $_POST['cemail'];
    $number = $_POST['cnumber'];
    $company = $_POST['cCompany'];
    $project = $_POST['cProject'];
    $id = $_POST['project_id'];
    // echo $name;
    // echo $id;

    if (isset($_POST['Work'])) {

        $update_query_client = "UPDATE `client` SET `name`='$name',`email`='$email',`number`='$number',`company`='$company' WHERE `project_id`='$id'";

        $update_query_project = "UPDATE `project` SET `projectTitle`='$project' WHERE project_id = '$id';";

        $u_client = mysqli_query($con_server,$update_query_client);
        $u_project = mysqli_query($con_server,$update_query_project);
        if($u_client && $u_project){
            // echo "party";
            $pass = encryptor('encrypt', $id);

            header("location: demo.php?id=$pass");
        }

    } else {
        $query = "INSERT INTO client values('$name','$email','$number','$company','$id');";

        $check = mysqli_query($con_server, $query);


        $get_id = "select post_id from post ORDER BY post_id DESC LIMIT 1;";

        $run = mysqli_query($con_server, $get_id);

        $num = mysqli_num_rows($run);

        // echo $num;

        $get_post_id = 0;

        if ($num == 0) {

            $get_post_id = 0;

        } else {
            if ($run) {
                while ($ans = mysqli_fetch_assoc($run)) {
                    $get_post_id = $ans['post_id'] + 1;
                }
            }
        }


        $query2 = "INSERT INTO project values('$id','$project');";


        $insert2 = mysqli_query($con_server, $query2);
        if ($check && $insert2) {
            echo "party";
            $pass = encryptor('encrypt', $id);

            header("location: demo.php?id=$pass");

        }
    }


} else {
    echo "Somthing is missing";
}

?>