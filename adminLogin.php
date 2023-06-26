<?php 

session_start();
if (isset($_POST['p'])) {
    $p = $_POST['p'];
    if ($p == 'NimeshKadecha') {
        $_SESSION['user'] = $p;
        header("location: index.php");
    } else {
        echo "Wrong password";
    }
}
?>