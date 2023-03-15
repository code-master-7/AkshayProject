<?php
include "connection.php";
include "enc.php";


if (isset($_GET['id']) && isset($_GET['work']) ) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    echo $id;


    // echo $_GET['work'];

    switch($_GET['work']){

        case 'Cpost':
            echo "Create Post";

            $titlee = $_GET['head'];

            $get_id = "select post_id from post ORDER BY post_id DESC LIMIT 1;";

            $run = mysqli_query($con_server, $get_id);
        
            $num = mysqli_num_rows($run);
        
            echo $num;
        
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

            $q = "Insert into post values('$get_post_id','$titlee','$id')";

            $check = mysqli_query($con_server, $q);

            if($check){
                echo "Party";

                $pass = encryptor('encrypt', $id);
                header("location: demo.php?id=$pass");
            }

            break;

        default:
        echo "ERROR";
        break;
    }


?>
<?php
}
?>