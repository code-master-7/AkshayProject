<?php
ob_start();
session_start();
include "connection.php";
include "enc.php";

// unset ($_SESSION['user']);
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
<?php


if (isset($_SESSION['user'])) {
    ?>

    <body>
        <div class="d-flex" id="wrapper">
            <div id="page-content-wrapper" style="background-color: #f4f4f4;">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center" style="width: 100%">
                        <h2 class="fs-2 m-0">Aclic</h2>
                        <form action="getid.php" method="get" style="margin-left: auto; margin-right:0;">
                            <input type="submit" class="btn btn-success" value="Add Project">
                        </form>
                    </div>
                </nav>
                <div class="row my-5 mx-1">
                    <h3 class="fs-4 mb-3">Recent Project</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Company</th>
                                    <th>Project</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query3 = "select * from client";

                                $sql = mysqli_query($con_server, $query3);
                                while ($ans = mysqli_fetch_assoc($sql)) {
                                    $projectTitle = "select projectTitle from project where project_id = '$ans[project_id];' ";

                                    $c1 = mysqli_query($con_server, $projectTitle);
                                    $title = "";

                                    while ($ans1 = mysqli_fetch_assoc($c1)) {
                                        $title = $ans1['projectTitle'];
                                    }
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $ans['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $ans['company']; ?>
                                        </td>
                                        <td>
                                            <?php echo $title ?>
                                        </td>
                                        <td><a href="demo.php?id=<?php $id = encryptor('encrypt', $ans['project_id']);
                                        echo $id; ?>" class="btn bt-seccuess">Edit</a></td>
                                        <td><a href="worker.php?id=<?php $id = encryptor('encrypt', $ans['project_id']);
                                        echo $id; ?>&&work=confirmDelete&What=project"
                                                class="btn bt-danger">Delete</a></td>

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


        <?php

        if (isset($_GET['error'])) {
            ?>
            <script>
                alert("<?php echo $_GET['error']; ?>");
            </script>
            <?php
        }

        ?>

        <?php
        include 'footer.php';
        ?>
    </body>

    </html>
<?php } else {
    header("location: login.html");
} ?>