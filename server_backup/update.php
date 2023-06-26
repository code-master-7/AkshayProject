<?php

include "connection.php";
include "enc.php";



if (isset($_GET['id']) && isset($_GET['image_id'])) {
    $project_id = $_GET['id'];
    $image_id = $_GET['image_id'];
    $project_id = encryptor('decrypt', $project_id);

    // echo $project_id;

    // echo $image_id;

    $query_getData = "select * from images where image_id = '$image_id';";

    $getData = mysqli_query($con_server, $query_getData);

    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <?php
        while ($Details = mysqli_fetch_assoc($getData)) {
            ?>
            <input type="hidden" name="pID" value="<?php echo $Details['post_id']; ?>">
            <input type="hidden" name="work" value="Update">
            <input type="hidden" name="image_id" value="<?php echo $image_id; ?>">
            <input type="hidden" name="id" value="<?php $idd = encryptor('encrypt', $project_id);
            echo $idd; ?>">
            <input type="file" name="my_image" value="<?php echo$Details['image_url']; ?>">
            <textarea name="imgDes"><?php echo$Details['image_des'];?></textarea>

            <input type="submit" class="btn btn-success" name="submit" value="Update Data">
            <?php

        }
        ?>
    </form>
    <?php
}
?>