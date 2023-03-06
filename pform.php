<?php

include "connection.php";
include "enc.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    // echo $id;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: #c1efde;
        }

        .row {
            background: #ddfaef;
            border-radius: 30px;
            margin-top: 2rem;
        }

        .btn1 {
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: aliceblue;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn2 {
            border: none;
            outline: none;
            height: 50px;
            width: 100px;
            background-color: black;
            color: aliceblue;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn {
            margin-left: 80px;
        }

        .container {
            margin-top: 10px;
        }

        .fas {
            font-style: bold;
            font-size: 1cm;
            padding-right: 4px;
        }

        .bb-add-section {
            pointer-events: all;
            width: 100%;
            margin-top: 30%;
            align-items: center;
            font-size: 16px;
            background-color: #4669be;
            color: #fff;
            padding: 6px 24px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            border: 1px solid transparent;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            border-radius: 20px;
            box-shadow: 0px 1px 1px 0px rgb(0 0 0 / 8%);
            outline: 0;
            cursor: pointer;
            left: 50%;
            position: absolute;
            transform: translatex(-50%);
            z-index: 1000;
        }

        .bb {
            pointer-events: all;
            width: 12%;

            margin-top: 0.50cm;
            align-items: center;
            font-size: 16px;
            background-color: #4669be;
            color: #fff;
            padding: 6px 24px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            border: 1px solid transparent;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            border-radius: 20px;
            box-shadow: 0px 1px 1px 0px rgb(0 0 0 / 8%);
            outline: 0;
            cursor: pointer;
            left: 50%;
            position: absolute;
            transform: translatex(-50%);
            z-index: 1000;
        }
    </style>
    <title>Form</title>
</head>

<body>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <i class="fas fa-user-secret me-2"></i>
                <h2>Akshay</h2>
            </ul>
        </div>
    </div>

    <section class="form">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">
                </div>

                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Information of Client</h1>
                    <form>
                        <div class="form-row">
                            <div class="col-lg-7">
                                Clinet Name:<input type="text" placeholder="Client-Name" class="form-control my-1">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                Email: <input type="email" placeholder="Email-Address" class="form-control my-1">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                Number: <input type="number" placeholder="Enter Number" class="form-control my-1">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                Company: <input type="text" placeholder="Company" class="form-control my-1">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                Project: <input type="text" placeholder="Project" class="form-control my-1">
                            </div>
                        </div>
                        <div>

                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="button" class="btn1 my-1">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
    </section>
   <div id="container">
     <div id="element">
     <section id="mainsectionIDEAl">
            <div class="container">
                <div class="row px-5 pt-4">
                <div class="col-lg-2 px-9 pt-9">
                        <input type="text" style="width: 100%" class="btn2 my-1" placeholder="Enter Post Name">
                        <!-- <button type="tex" class="btn2 my-1">Post 1</button> -->
                    </div>
                    <!-- <div id="container11"> -->
                        <section id="mainsection1">
                            <div class="container11">
                                <div class="col-md-auto">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="images/bg.jpg" alt="Image">
                                        <div class="card-body">
                                            <!-- <h5 class="card-title">Post Title</h5> -->
                                            <p class="card-text"><textarea style="height: 100% weidth: 100%"></textarea></p>
                                            <!-- <a href="#" class="btn btn-primary">Go</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <!-- </div> -->

                    <div class="col-lg-2 px-9 pt-5 abc">
                        <button class="bb-add-section top" id="newsectionbtn1">+ Add Section</button>
                    </div>
                </div>
            </div>
        </section>
     </div>
        <!-- <button id="newsectionbtn">+New Section</button> -->
    </div>

    <div id="container">
     <!-- <div id="element"> -->
     <section id="mainsectionIDEAl">
            <div class="container">
                <div class="row px-5 pt-4">
                <div class="col-lg-2 px-9 pt-9">
                        <input type="text" style="width: 100%" class="btn2 my-1" placeholder="Enter Post Name">
                        <!-- <button type="tex" class="btn2 my-1">Post 1</button> -->
                    </div>
                    <div id="container11">
                        <section id="mainsection1">
                            <div class="container11">
                                <div class="col-md-auto">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="images/bg.jpg" alt="Image">
                                        <div class="card-body">
                                            <!-- <h5 class="card-title">Post Title</h5> -->
                                            <p class="card-text"><textarea style="height: 100% weidth: 100%"></textarea></p>
                                            <!-- <a href="#" class="btn btn-primary">Go</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-2 px-9 pt-5 abc">
                        <button class="bb-add-section top" id="newpostbtn1">+ Add Image</button>
                    </div>
                </div>
            </div>
        </section>
     <!-- </div> -->
        <!-- <button id="newsectionbtn">+New Section</button> -->
    </div>

    <div class="abc">
        <!--<div class="col-lg-2 px-9 pt-5">-->
        <button class="bb top" id="newsectionbtn">+ Add Post</button>
    </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>

<script>
    document.getElementById("element").style.display = "none";
    
    document.getElementById("newsectionbtn").onclick = function () {
        var container = document.getElementById("container");
        var section = document.getElementById("mainsectionIDEAl");
        container.appendChild(section.cloneNode(true));
    }
    document.getElementById("newpostbtn1").onclick = function () {
        var container = document.getElementById("container11");
        var section = document.getElementById("mainsection1");
        container.appendChild(section.cloneNode(true));
    }
</script>

</html>

<?php
?>