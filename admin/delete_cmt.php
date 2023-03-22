<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    } else {
        $cmt_id = $_GET['cmt_id'];
        $sql = "DELETE FROM tbl_comment WHERE cmt_id = '$cmt_id'";
        $query = mysqli_query($conn, $sql);
        header('location: cmt_management.php');

    }

?>