<?php
session_start();
if (isset($_POST['user_id'])) {
    $_SESSION['user_id'] = $_POST['user_id'];
} else {
    $_SESSION['user_id'] = "Anonymous".rand(1,100);
}
header("Location: czat_shack.php");
?>