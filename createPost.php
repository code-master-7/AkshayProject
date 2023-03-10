<?php

include "connection.php";
include "enc.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    // echo $id;

    $email = "";
    $get_email = "select email from client where project_id = '$id';";

    $query_getEmail = mysqli_query($con_server, $get_email);

    while ($getEmail = mysqli_fetch_assoc($query_getEmail)) {
        $email = $getEmail['email'];
    }

    $pID = $_GET['head'];

    //  $ans['post_id'];

    $postTitle = "select postTitle from post where post_id = '$pID' ";

    $c1 = mysqli_query($con_server, $postTitle);
    $title = "";

    while ($ans1 = mysqli_fetch_assoc($c1)) {
        $title = $ans1['postTitle'];

    }

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
        <title>Akshay</title>
    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Images of Post "
                            <?php echo $title ?> "
                        </h2>
                    </div>
                    <div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-toggle="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                </nav>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">
                        <form action="upload.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="pID" value="<?php echo $pID ?>">
                            <input type="hidden" name="id" value="<?php $idd = encryptor('encrypt', $id);
                            echo $idd; ?>">
                            <input type="file" name="my_image" required>
                            <textarea name="imgDes" required> </textarea>

                            <input type="submit" class="btn btn-success" name="submit" value="Insert Image">

                        </form>

                    </h3>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    // $q = "Select * from images where post_id = 4 and project_id = 1";
                
                    $id = $_GET['id'];
                    $id = encryptor('decrypt', $id);
                    echo $id;
                    $que = "Select * from images where post_id = '$pID' and project_id = '$id'";

                    $sql = mysqli_query($con_server, $que);
                    while ($ans = mysqli_fetch_assoc($sql)) {

                        ?>
                        
                            <div class="col">
                                <div class="card">
                                    <img src="images/<?php echo $ans['image_url']; ?>" class="img-fluid" style = "width:550px; height:500px" class="card-img-top " alt="Img">
                                    <div class="card-body">
                                        <p class="card-text"> <?php echo $ans['image_des']; ?></p>
                                        <a href="update.php?id=<?php $idd = encryptor('encrypt', $id);
                                            echo $idd; ?>&&image_id=<?php echo $ans['image_id']; ?>" class="btn btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>

                                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>



    </body>

    </html>
    <?php
} else {
    echo "Invalid Request";
}
?>