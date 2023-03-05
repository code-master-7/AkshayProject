<?php

include "connection.php";
include "enc.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = encryptor('decrypt', $id);
    echo $id;
}

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>

<?php
?>