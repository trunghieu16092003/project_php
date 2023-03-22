<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    } else {
        $user_id = $_GET['user_id'];
        $sql = "DELETE FROM tbl_user WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $sql);
        header('location: user_management.php');

    }

?>