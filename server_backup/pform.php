<?php

include "connection.php";
include "enc.php";



if (isset($_GET['id']) ) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    // echo $id;


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
                background: #f4f4f4;
                height: 100vh;
            }

            .row {
                background: #f4f4f4;
                border-radius: 30px;
                margin-top: 2rem;
            }

            .row2 {

                border-radius: 30px;
                margin-top: 2cm;
                margin-left: 12cm;
            }

            .row3 {

                border-radius: 30px;
                margin-left: 35%;
                margin-bottom: 2cm;
            }

            .btn1 {
                border: none;
                outline: none;
                height: 50px;
                width: 5cm;
                background-color: black;
                color: aliceblue;
                border-radius: 4px;
                font-weight: bold;
            }

            .btn2 {
                border: none;
                outline: none;
                height: 50px;
                width: 5cm;
                background-color: black;
                color: aliceblue;
                border-radius: 4px;
                font-weight: bold;
                text-align: center;
                margin-left: 5cm;

            }

            .btn {
                margin-left: 30px;
                border-radius: 1rem;
                width: 4cm;
                height: 1cm;
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

            .d2 {
                width: 100%;
                height: 100%;
                contain: layout;
            }

            .the {
                width: 20%;
                height: 50%;
                contain: layout;
                border-radius: 3rem;
                background: #ddfaef;
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                text-transform: capitalize;
                font-style: bold;
            }

            .ab {
                width: 30%;
                height: 50%;
                contain: layout;
                background: #ddfaef;
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                text-transform: capitalize;
                font-style: bold;
            }

            .btn0 {
                width: 4cm;
                height: 1cm;
                border-radius: 1rem;
                margin-inline-end: 150px;
                margin-right: 200px;
            }
        </style>

        <title>Form</title>

    </head>

    <body>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <h2>Aclic</h2>
                </ul>
            </div>
        </div>

        <section class="form">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-4"> </div>

                    <div class="col-lg-7 px-5 pt-5">
                        <h1 class="font-weight-bold py-3">Information of Client</h1>
                        <form action="upload.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="create" value="Addclient">
                            <div class="form-row">
                                <div class="col-lg-7">
                                    Client Name:<input type="text" name="cName" placeholder="Client-Name"
                                        class="form-control my-1">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7">
                                    Email: <input type="email" name="cemail" placeholder="Email-Address"
                                        class="form-control my-1">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-7">
                                    Mobile Number: <input type="tel" name="cnumber" placeholder="Enter Number"
                                        class="form-control my-1">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-7">
                                    Company: <input type="text" name="cCompany" placeholder="Company"
                                        class="form-control my-1">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-7">
                                    Project: <input type="text" name="cProject" placeholder="Project"
                                        class="form-control my-1">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7">
                                    Logo: <input type="file" name="my_image">
                                </div>
                            </div>

                            <div class="bcd">
                                <div class="row2">
                                    <input type="hidden" name="project_id" value="<?php echo $id; ?>">
                                    <input type="Submit" class="btn btn-success" style="color: #fff; background-color: #FF6600;" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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
<?php
} else {

        echo "Invlaid request";
    
}
include 'footer.php';

?>
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