<?php
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "connection.php";
	include "enc.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	define('KB', 1024);
	define('MB', 1048576);
	define('GB', 1073741824);
	define('TB', 1099511627776);

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 200*MB) {
			$em = "Sorry, your file is too large.";
			header("Location: index.php?error=$em");
		} else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png","mp4","ogg","webm","avi");

			$vid = array("mp4","ogg","webm","avi");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
				$img_upload_path = 'images/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				echo "<br>";
				echo $_POST['imgDes'];
				echo "<br>";
				echo $_POST['pID'];
				echo "<br>";
				echo $_POST['id'] . "=id";
				$id = encryptor('decrypt', $_POST['id']);
				echo "<br>";
				echo $id;

				$get_email = "select email from client where project_id = '$id' ";

				$c = mysqli_query($con_server, $get_email);
				$email = "";

				while ($ans = mysqli_fetch_assoc($c)) {
					$email = $ans['email'];
					echo $email;
				}
				echo "<br>";
				echo $_POST['pID'];
				$postTitle = "select postTitle from post where post_id = '$_POST[pID]' ";

				$c1 = mysqli_query($con_server, $postTitle);
				$title = "";

				while ($ans1 = mysqli_fetch_assoc($c1)) {
					$title = $ans1['postTitle'];

				}
				echo "<br>";
				echo $title;

				if (isset($_POST['work'])) {
					$image_idd = $_POST['image_id'];
					$mod = 0;
					if(in_array($img_ex_lc, $vid)){
						$mod = 1;
					}
					echo $image_idd;
					$sql = "UPDATE images SET image_url = '$new_img_name' , image_des = '$_POST[imgDes]',typ = '$mod' where image_id  = '$image_idd';";
					echo "UPDATEEEEEEEEEEEEEEEE";
				} else {
					echo "Isert";
					$mod = 0;
					if(in_array($img_ex_lc, $vid)){
						$mod = 1;
					}
					// Insert into Database
					$sql = "INSERT INTO images VALUES('','$new_img_name','$_POST[imgDes]','$email','$_POST[pID]','$id',' $title','$mod');";
				}
				mysqli_query($con_server, $sql);
				header("location: demo.php?id=$_POST[id]");
			} else {
				$em = "You can't upload files of this type";
				header("Location: index.php?error=$em");
			}
		}
	} else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}

} else {
	// header("Location: index.php");
}
include 'footer.php';