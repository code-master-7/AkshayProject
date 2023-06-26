<?php
include "connection.php";
include "enc.php";
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<?php

if (isset($_GET['id']) && isset($_GET['work'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    // echo $id;


    // echo $_GET['work'];

    switch ($_GET['work']) {

        case 'Cpost':
            // echo "Create Post";

            $titlee = $_GET['head'];

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

            $q = "Insert into post values('$get_post_id','$titlee','$id')";

            $check = mysqli_query($con_server, $q);

            if ($check) {
                $pass = encryptor('encrypt', $id);
                
                // header("location:demo.php?id=$pass");
                ?>
                
                <script>
                window.location.replace("http:<?php echo "//preso.in/projects/demo.php?id=$pass" ?>");
                
                </script>
                <?php
                
                if (headers_sent()) {
                     die("Redirect failed. Please click on this link: <a href=//preso.in/projects/demo.php?id=$pass>Redirece</a>");
                }
                else{
                    exit(header("Location: //preso.in/projects/demo.php?id=$pass"));
                }
            }

            break;

        case 'delete':
            // echo "delete";
            $image = $_GET['imageId'];

            $query_delete = "DELETE FROM `images` WHERE image_id = '$image'";

            $sql_delete = mysqli_query($con_server, $query_delete);

            if ($sql_delete) {
                $pass = encryptor('encrypt', $id);
                // header("location:demo.php?id=$pass");
                 ?>
                
                <script>
                window.location.replace("http:<?php echo "//preso.in/projects/demo.php?id=$pass" ?>");
                
                </script>
                <?php
                
                if (headers_sent()) {
                     die("Redirect failed. Please click on this link: <a href=//preso.in/projects/demo.php?id=$pass>Redirece</a>");
                }
                else{
                    exit(header("Location:demo.php?id=$pass"));
                }
            }

            break;

        case 'deleteproject':
            $query_delete_client = "DELETE FROM `client` WHERE `project_id` = $id; ";
            $query_delete_images = "DELETE FROM `images` WHERE `project_id` = $id; ";
            $query_delete_post = "DELETE FROM `post` WHERE `project_id` = $id; ";
            $query_delete_project = "DELETE FROM `project` WHERE `project_id` = $id; ";

            $sql_delete_client = mysqli_query($con_server, $query_delete_client);
            $sql_delete_image = mysqli_query($con_server, $query_delete_images);
            $sql_delete_postt = mysqli_query($con_server, $query_delete_post);
            $sql_delete_project = mysqli_query($con_server, $query_delete_project);

            if ($sql_delete_client && $sql_delete_image && $sql_delete_postt && $sql_delete_project) {
                // header("location:index.php");
                 ?>
                
                <script>
                window.location.replace("http:<?php echo "//preso.in/projects/index.php" ?>");
                
                </script>
                <?php
                
                if (headers_sent()) {
                     die("Redirect failed. Please click on this link: <a href=index.php>Redirece</a>");
                }
                else{
                    exit(header("Location://preso.in/projects/index.php"));
                }
            }

            break;

        case 'deletePost':
            $query_deletePost = "DELETE FROM `post` WHERE post_id = '$_GET[PostId]' AND project_id = '$id'";
            $query_deleteImages = "SELECT * FROM `images` WHERE post_id = '$_GET[PostId]' AND project_id = '$id'";
            $sql_post = mysqli_query($con_server, $query_deletePost);
            $sql_Images = mysqli_query($con_server, $query_deleteImages);

            if ($sql_Images && $sql_post) {
                // header("location:demo.php?id=$_GET[id]");
                 ?>
                
                <script>
                window.location.replace("http:<?php echo "//preso.in/projects/demo.php?id=$_GET[id]" ?>");
                
                </script>
                <?php
                
                if (headers_sent()) {
                     die("Redirect failed. Please click on this link: <a href=demo.php?id=$_GET[id]>Redirece</a>");
                }
                else{
                    exit(header("Location://preso.in/projects/demo.php?id=$_GET[id]"));
                }
            }

            break;

        case 'updateTitle':
            $query_updateTitle = "UPDATE post SET `postTitle`='$_GET[title]' WHERE post_id = '$_GET[postId]';";
            $SQL_update = mysqli_query($con_server, $query_updateTitle);
            if ($SQL_update) {
                $pass = encryptor('encrypt', $id);
                // header("location:demo.php?id=$pass");
                 ?>
                
                <script>
                window.location.replace("http:<?php echo "//preso.in/projects/demo.php?id=$pass" ?>");
                
                </script>
                <?php
                
                if (headers_sent()) {
                     die("Redirect failed. Please click on this link: <a href=//preso.in/projects/demo.php?id=$pass>Redirece</a>");
                }
                else{
                    exit(header("Location://preso.in/projects/demo.php?id=$pass"));
                }
            }
            break;

        case 'confirmDelete':

            $what = $_GET['What'];

            switch ($what) {
                case 'project':
                    ?>
                    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Confirm Delete</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Confirm delete project</h6>
                            <a href="worker.php?id=<?php echo $_GET['id']; ?>&&work=deleteproject" class="btn btn-danger">Delete</a>
                            <a href="index.php" class="btn btn-primary">Cancle</a>
                        </div>
                    </div>
                    <?php
                    break;

                case 'postImage':
                    ?>
                    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Confirm Delete</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Confirm delete Post Image</h6>
                            <a class="btn btn-danger"
                                href="worker.php?id=<?php echo $_GET['id']; ?>&&work=delete&&imageId=<?php echo $_GET['imageId'] ?>">Delete</a>
                            <a href="demo.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">Cancle</a>
                        </div>
                    </div>
                    <?php
                    break;

                case 'post':
                    ?>
                    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Confirm Delete</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Confirm delete Post</h6>
                            <a class="btn btn-danger"
                                href="worker.php?id=<?php echo $_GET['id']; ?>&&work=deletePost&PostId=<?php echo $_GET['postId']; ?>">Delete</a>
                            <a href="demo.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">Cancle</a>
                        </div>
                    </div>
                    <?php
                    break;
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