<?php

include "connection.php";
include "enc.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    // echo $id;


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
                        <h2 class="fs-2 m-0">List Of Post</h2>
                    </div>
                    <div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-toggle="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
                <section class="form">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="pt-5">
                                <form action="addclient.php" method="POST">
                                    <table>
                                        <tr>
                                            <td colspan="6">
                                                <h1 class="font-weight-bold py-3">Information of Client</h1>
                                            </td>
                                        </tr>
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
                                                        Clinet Name:<input type="text" name="cName" placeholder="Client-Name"
                                                            value="<?php echo $clientInfo['name']; ?>"
                                                            class="form-control my-1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-row">
                                                        Email: <input type="email" name="cemail" placeholder="Email-Address"
                                                            value="<?php echo $clientInfo['email']; ?>"
                                                            class="form-control my-1">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-row">
                                                        Number: <input type="number" name="cnumber" placeholder="Enter Number"
                                                            value="<?php echo $clientInfo['number']; ?>"
                                                            class="form-control my-1">
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
                                                        Project: <input type="text" name="cProject"
                                                            value="<?php echo $title; ?>" placeholder="Project"
                                                            class="form-control my-1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-row">
                                                        <input type="hidden" name="project_id" value="<?php echo $id; ?>">
                                                        <input type="Submit" class="btn0 btn-success" value="Update">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </form>
                            </div>

                            <div class="col-lg-7"></div>

                        </div>
                    </div>
                </section>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">
                        <form action="worker.php" method="get">
                            <input type="hidden" name="work" value="Cpost">
                            <input type="hidden" name="id" value="<?php $id = encryptor('encrypt', $id);
                            echo $id; ?>">
                            <input type="text" name="head" placeholder="Enter Post Title" required>
                            <input type="submit" class="btn btn-success" value="Create Post">
                            <!-- <a href="createPost.php?id=<?php //$id = encryptor('encrypt', $id);
                                // echo $id; ?>" class="btn btn-success">Create Post</a> -->
                        </form>
                    </h3>

                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>

                                    <th>Posts</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $id = encryptor('decrypt', $id);
                                $sql = "select DISTINCT post_id from images where project_id = '$id' order BY post_id;";
                                $queryy = mysqli_query($con_server, $sql);

                                while ($ans = mysqli_fetch_assoc($queryy)) {

                                    $postTitle = "select postTitle from post where post_id = ' $ans[post_id]' ";

                                    $c1 = mysqli_query($con_server, $postTitle);
                                    $title = "";

                                    while ($ans1 = mysqli_fetch_assoc($c1)) {
                                        $title = $ans1['postTitle'];

                                    }


                                    ?>
                                    <tr>
                                        <th>
                                            <?php echo $title; ?>
                                        </th>
                                        <td><a href="createPost.php?id=<?php $idd = encryptor('encrypt', $id);
                                        echo $idd; ?>&&head=<?php echo $ans['post_id']; ?>"
                                                class="btn bt-seccuess">Edit</a></td>
                                    </tr>
                                    <?php

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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
}
?>