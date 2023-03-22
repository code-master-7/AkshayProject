<?php
include "connection.php";
include "enc.php";
if (isset($_GET['id']) && isset($_COOKIE['user'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
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
        <title>Aclic</title>
    </head>

    <body>
        <div class="d-flex bg" id="wrapper">

            <div id="page-content-wrapper" style="background-color: #f4f4f4;">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div style="  display: block; margin-left: auto; margin-right: auto;">
                        <?php
                        $query_getLogo = "select logoImage from client where project_id = '$id';";
                        $SQL_getLogo = mysqli_query($con_server, $query_getLogo);

                        while ($logo = mysqli_fetch_assoc($SQL_getLogo)) {
                            if($logo['logoImage'] != ''){
                            ?>
                            <img src="images\<?php echo $logo['logoImage']; ?>" height="auto" width="auto">
                            <?php
                            }
                        }
                        ?>

                    </div>
                </nav>
                <section class="form" style="margin: 10px">
                    <form action="addclient.php" method="POST">
                        <table style="width: 100%">
                            <?php
                            $getClientInfo = "select * from client where project_id = '$id';";

                            $getinfo = mysqli_query($con_server, $getClientInfo);

                            while ($clientInfo = mysqli_fetch_assoc($getinfo)) {

                                $projectTitle = "select projectTitle from project where project_id = '$clientInfo[project_id];' ";

                                $c1 = mysqli_query($con_server, $projectTitle);
                                $title = "";

                                while ($ans1 = mysqli_fetch_assoc($c1)) {
                                    $title = $ans1['projectTitle'];
                                }

                                ?>
                                <input type="hidden" name="Work" value="update">
                                <tr>
                                    <td>
                                        <div class="form-row">
                                            Client Name:<input type="text" name="cName" placeholder="Client-Name"
                                                value="<?php echo $clientInfo['name']; ?>" class="form-control my-1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row">
                                            Email: <input type="email" name="cemail" placeholder="Email-Address"
                                                value="<?php echo $clientInfo['email']; ?>" class="form-control my-1">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-row">
                                            Number: <input type="number" name="cnumber" placeholder="Enter Number"
                                                value="<?php echo $clientInfo['number']; ?>" class="form-control my-1">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-row">
                                            Company: <input type="text" name="cCompany"
                                                value="<?php echo $clientInfo['company']; ?>" placeholder="Company"
                                                class="form-control my-1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row">
                                            Project: <input type="text" name="cProject" value="<?php echo $title; ?>"
                                                placeholder="Project" class="form-control my-1">
                                        </div>
                                    </td>
                                    <td style="padding-top:25px">
                                        <input type="hidden" name="project_id" value="<?php echo $id; ?>">
                                        <input type="Submit" class="btn0 btn-success" value="Update">

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </form>
                </section>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3" style="margin: 10px;">
                        <form action="worker.php" method="get">
                            <input type="hidden" name="work" value="Cpost">
                            <input type="hidden" name="id" value="<?php $id = encryptor('encrypt', $id);
                            echo $id; ?>">
                            <table>
                                <tr>
                                    <td><input type="text" name="head" placeholder="Enter Title" required>
                                    </td>
                                    <td><input type="submit" class="btn btn-success" value="Create">
                                    </td>
                                </tr>
                            </table>




                        </form>
                    </h3>

                    <div class="col">
                        <?php

                        $id = encryptor('decrypt', $id);

                        $postTitle = "select * from post where project_id = '$id' ";

                        $c1 = mysqli_query($con_server, $postTitle);
                        $title = "";

                        while ($ans1 = mysqli_fetch_assoc($c1)) {
                            $title = $ans1['postTitle'];
                            ?>
                            <table class="table bg-white rounded shadow-sm table-hover " style="margin: 10px">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo $title; ?>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            <div style="margin:10px; padding:10px">
                                                <form action="upload.php" method="post" enctype="multipart/form-data">

                                                    <input type="hidden" name="pID" value="<?php echo $ans1['post_id'] ?>">
                                                    <input type="hidden" name="id" value="<?php $idd = encryptor('encrypt', $id);
                                                    echo $idd; ?>">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <input type="file" name="my_image" required>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <textarea class="mx-1 my-1" name="imgDes"
                                                                        required> </textarea>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <input type="submit" class="btn btn-success " name="submit"
                                                                        value="Insert Data">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </form>
                                            </div>

                                            <div class="row" style="background-color:#c1c1c1">
                                                <?php
                                                $que = "Select * from images where post_id = '$ans1[post_id]' and project_id = '$id'";
                                                $sql = mysqli_query($con_server, $que);
                                                while ($ans = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <div class="col-3">
                                                        <div class="card my-1">
                                                            <?php
                                                            if ($ans['typ'] == 0) {
                                                                ?>
                                                                <div style="position: relative;">
                                                                    <img src="images/<?php echo $ans['image_url']; ?>" class="img-fluid"
                                                                        style="width:auto; height:auto;pointer-events: none;"
                                                                        class="card-img-top " alt="Img">
                                                                    <a href="images/<?php echo $ans['image_url']; ?>" target="_blank">
                                                                        <div style="position: absolute; top: 0px;
   left: 0px; opacity:1; height: 100%; width:100%; margin:0 0 auto 0 opacity: 1 color:white">
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <?php
                                                            } else {
                                                                ?>
                                                                <video width="350" height="350" controls>
                                                                    <source src="images/<?php echo $ans['image_url']; ?>">
                                                                </video>
                                                                <?php
                                                            }
                                                            ?>

                                                            <div class="card-body">
                                                                <div class="overflow-scroll" style="height:150px; width:100%">
                                                                    <?php echo $ans['image_des']; ?>
                                                                </div>
                                                                <a href="demo.php?id=<?php $idd = encryptor('encrypt', $id);
                                                                echo $idd; ?>&&image_id=<?php echo $ans['image_id']; ?>"
                                                                    class="btn btn-primary">Edit</a>
                                                                <a href="worker.php?id=<?php $idd = encryptor('encrypt', $id);
                                                                echo $idd; ?>&&work=delete&&imageId=<?php echo $ans['image_id']; ?>"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="popup" id="popup_1">
            <div class="form">
                <h1>Edit</h1>
                <div class="form-element">

                    <div class="second50">
                        <?php

                        if (isset($_GET['id']) && isset($_GET['image_id'])) {
                            $project_id = $_GET['id'];
                            $image_id = $_GET['image_id'];
                            $project_id = encryptor('decrypt', $project_id);

                            // echo $project_id;
                    
                            // echo $image_id;
                    
                            $query_getData = "select * from images where image_id = '$image_id';";

                            $getData = mysqli_query($con_server, $query_getData);

                            ?>

                            <?php
                            while ($Details = mysqli_fetch_assoc($getData)) {
                                ?>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="pID" value="<?php echo $Details['post_id']; ?>">
                                    <input type="hidden" name="work" value="UpdateImage">
                                    <input type="hidden" name="image_id" value="<?php echo $image_id; ?>">
                                    <input type="hidden" name="id" value="<?php $idd = encryptor('encrypt', $project_id);
                                    echo $idd; ?>">
                                    <table>
                                        <tr>
                                            <td><input type="file" name="my_image" value="<?php echo $Details['image_url']; ?>">
                                            </td>
                                            <input type="hidden" name="imgDes" value="<?php echo $Details['image_des']; ?>">
                                                <!-- <textarea name="imgDes" style="margin:10px"
                                                    autofocus><?php //echo $Details['image_des']; ?></textarea> -->
                                            
                                            <td><input type="submit" style="margin-left:auto; margin-right: 0;"
                                                    class="btn btn-success" name="submit" value="Update Image"></td>
                                        </tr>
                                    
                                </form>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="pID" value="<?php echo $Details['post_id']; ?>">
                                    <input type="hidden" name="work" value="UpdateText">
                                    <input type="hidden" name="image_id" value="<?php echo $image_id; ?>">
                                    <input type="hidden" name="id" value="<?php $idd = encryptor('encrypt', $project_id);
                                    echo $idd; ?>">
                                    
                                        <tr>
                                            <input type="hidden" name="my_image" value="<?php echo $Details['image_url']; ?>">
                                            <td><textarea name="imgDes" style="margin:10px"
                                                    autofocus><?php echo $Details['image_des']; ?></textarea>
                                            </td>
                                            <td><input type="submit" style="margin-left:auto; margin-right: 0;"
                                                    class="btn btn-success" name="submit" value="Update text"></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php

                            }
                            ?>

                            <?php
                        }
                        ?>
                        <button id="Cancel" class="btn btn-success" onclick="closePopup(); return false;"> Cancel</button>

                    </div>

                </div>
            </div>
        </div>


        <script>
            i = 0;
            function openPopup() {
                i = 1;
                console.log("open");
                document.querySelector(".popup").classList.add("active");
                document.querySelector(".bg").style.opacity = "0.2";
            }
            function closePopup() {
                console.log("close");
                document.querySelector(".popup").classList.remove("active");
                document.querySelector(".bg").style.opacity = "1";
            }
            if (i != 1) {
                closePopup();
            }
            <?php

            if (isset($_GET['image_id'])) {
                ?>
                openPopup();
                <?php
            }

            ?>
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <?php
        include 'footer.php';
        ?>
    </body>

    </html>
    <?php
} else {
    if (!isset($_COOKIE['user'])) {
        echo "Please Include Copyrights and Refresh 😁😁";
    } else {
        echo "Invalid Request";
    }
}
?>