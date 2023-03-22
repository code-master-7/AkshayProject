<?php
if (isset($_POST['submit'])&&isset($_FILES['my_image'])) {
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
		if ($img_size > 200 * MB) {
			$em = "Sorry, your file is too large.";
			header("Location: index.php?error=$em");
		} else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "mp4", "ogg", "webm", "avi");

			$vid = array("mp4", "ogg", "webm", "avi");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
				$img_upload_path = 'images/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				if($_POST['create']){
					$name = $_POST['cName'];
					$email = $_POST['cemail'];
					$number = $_POST['cnumber'];
					$company = $_POST['cCompany'];
					$project = $_POST['cProject'];
					$id = $_POST['project_id'];
			
					$query = "INSERT INTO client values('$name','$email','$number','$company','$id','$new_img_name');";
			
					$check = mysqli_query($con_server, $query);
			
			
					$get_id = "select post_id from post ORDER BY post_id DESC LIMIT 1;";
			
					$run = mysqli_query($con_server, $get_id);
			
					$num = mysqli_num_rows($run);
			
					echo $num;
			
					$get_post_id = 0;
			
					if ($num == 0) {
			
						$get_post_id = 0;
			
					} else {
						if ($run) {
							while ($ans = mysqli_fetch_assoc($run)) {
								$get_post_id = $ans['post_id'] + 1;
							}
						}
					}
			
			
					$query2 = "INSERT INTO project values('$id','$project');";
			
			
					$insert2 = mysqli_query($con_server, $query2);
					if ($check && $insert2) {
						echo "party";
						$pass = encryptor('encrypt', $id);
			
						header("location: demo.php?id=$pass");
			
					}
				}else{
					
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
					if ($_POST['work'] == "UpdateImage") {
						$image_idd = $_POST['image_id'];
						$mod = 0;
						if (in_array($img_ex_lc, $vid)) {
							$mod = 1;
						}
						echo $image_idd;
						$sql = "UPDATE images SET image_url = '$new_img_name' , image_des = '$_POST[imgDes]',typ = '$mod' where image_id  = '$image_idd';";
						echo "UPDATEEEEEEEEEEEEEEEE";
					}

				} else {
					echo "Isert";
					$mod = 0;
					if (in_array($img_ex_lc, $vid)) {
						$mod = 1;
					}
					// Insert into Database
					$sql = "INSERT INTO images VALUES('','$new_img_name','$_POST[imgDes]','$email','$_POST[pID]','$id',' $title','$mod');";
				}
				mysqli_query($con_server, $sql);
				header("location: demo.php?id=$_POST[id]");
				}
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
	if(isset($_POST['work'])){
		if($_POST['work'] == "UpdateText"){
			include "connection.php";
			include "enc.php";
			$image_idd = $_POST['image_id'];
	
			$sql = "UPDATE images SET image_des = '$_POST[imgDes]' where image_id  = '$image_idd';";
			echo "UPDATEEEEEEEEEEEEEEEE";
			mysqli_query($con_server, $sql);
			header("location: demo.php?id=$_POST[id]");
	
		}else{
			header("Location: index.php");
		}
	}else if(isset($_POST['create'])){
		include "connection.php";
		include "enc.php";

		$name = $_POST['cName'];
		$email = $_POST['cemail'];
		$number = $_POST['cnumber'];
		$company = $_POST['cCompany'];
		$project = $_POST['cProject'];
		$id = $_POST['project_id'];

		$query = "INSERT INTO client values('$name','$email','$number','$company','$id','');";

        $check = mysqli_query($con_server, $query);


        $get_id = "select post_id from post ORDER BY post_id DESC LIMIT 1;";

        $run = mysqli_query($con_server, $get_id);

        $num = mysqli_num_rows($run);

        echo $num;

        $get_post_id = 0;

        if ($num == 0) {

            $get_post_id = 0;

        } else {
            if ($run) {
                while ($ans = mysqli_fetch_assoc($run)) {
                    $get_post_id = $ans['post_id'] + 1;
                }
            }
        }


        $query2 = "INSERT INTO project values('$id','$project');";


        $insert2 = mysqli_query($con_server, $query2);
        if ($check && $insert2) {
            echo "party";
            $pass = encryptor('encrypt', $id);

            header("location: demo.php?id=$pass");

        }
	}
	else{
		header("Location: index.php");
	}

	
}
include 'footer.php';