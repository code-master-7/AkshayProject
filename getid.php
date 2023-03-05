<?php
include "connection.php";
include "enc.php";

$sql = 'CREATE TABLE IF NOT EXISTS `client` (
    `name` text NOT NULL,
    `email` varchar(100) NOT NULL,
    `number` bigint(20) NOT NULL,
    `project_id` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$sql1 = 'CREATE TABLE IF NOT EXISTS `project` (
    `project_id` int(11) NOT NULL,
    `post_id` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  ';

$sql2 = 'CREATE TABLE IF NOT EXISTS `post` (
    `post_id` int(11) NOT NULL,
    `image_id` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$sql3 = 'CREATE TABLE IF NOT EXISTS `images` (
    `image_id` int(11) NOT NULL,
    `image_url` text NOT NULL,
    `image_des` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

if (mysqli_query($con_server, $sql) && mysqli_query($con_server, $sql1) && mysqli_query($con_server, $sql2) && mysqli_query($con_server, $sql3)) {

    $sql01 = 'ALTER TABLE `client`
    ADD PRIMARY KEY (`email`);';

    $sql11 = 'ALTER TABLE `project`
    ADD PRIMARY KEY (`project_id`);';

    // $sql111 = 'ALTER TABLE `project`
    // MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;';

    $sql21 = 'ALTER TABLE `post`
    ADD PRIMARY KEY (`post_id`);';

    $sql31 = 'ALTER TABLE `images`
    ADD PRIMARY KEY (`image_id`);';

} else {
    echo 'Error creating table: ' . mysqli_error() . "\n";
}

$query = "select project_id from project ORDER BY project_id DESC LIMIT 1;";

$run = mysqli_query($con_server,$query);

$id;

if($run){
    while($ans = mysqli_fetch_assoc($run)){
        $i = $ans['project_id'] + 1;
        // echo $i;
        $id = encryptor('encrypt',$i);
        header("location: pform.php?id=$id");
        // echo $ans['project_id'];
    }
    // echo "party";
}


?>