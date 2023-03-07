<?php

include "connection.php";
include "enc.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    echo $id;



    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <input type="file" name="my_image">

        <input type="submit" name="submit" value="Upload">

    </form>
    <?php
}
?>