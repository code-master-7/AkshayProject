<?php

include "connection.php";
include "enc.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    echo $id;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background:#c1efde;
        }
        .row{
            background:   #ddfaef;
            border-radius: 30px;
            margin-top: 2rem;
        }
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color:black;
            color: aliceblue;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
    <title>Screen</title>
  </head>
  <body>
   
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
                           Number: <input type="number" placeholder="*******" class="form-control my-1">
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
                            <button type="button"  class="btn1 my-1">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-7">
                </div>

                
            </div>
        
    
   </section>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form> -->

<?php
?>