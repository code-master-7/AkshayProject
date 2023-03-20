<!DOCTYPE html>
<html lang="en">
<?php

include "connection.php";
include "enc.php";
session_start();
if (isset($_SESSION['user'])) {
// unset ($_SESSION['user']);
    if (isset($_COOKIE['user'])) {
        ?>

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
                        <div class="d-flex align-items-center" style="width: 100%">

                            <h2 class="fs-2 m-0">Akshay</h2>
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
                                        <th>Client</th>
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

            <script>
                var el = document.getElementById("wrapper")
                var toggleButton = document.getElementById("menu-toggle")

                toggleButton.onclick = function () {
                    el.classList.toggle("toggled")
                }
            </script>
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
    } else {
        echo "Please Include Copyrights and Refresh 😁😁";
    }
    include 'footer.php';
    ?>
    </body>

    </html>
<?php } else {
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <tr>
                <td>
                    Pasword:
                </td>
                <td>
                    <input type="text" name="p" placeholder="Enter Password">
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="s" value="Login">
                </td>
            </tr>

        </table>
        </from>
        <?php
        if (isset($_POST['p'])) {
            $p = $_POST['p'];
            if ($p == 'NimeshKadecha') {
                $_SESSION['user'] = $p;
            } else {
                echo "Wrong password";
            }
        }
} ?>