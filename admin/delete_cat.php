<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    } else {
        $category_id = $_GET['category_id'];
        $sql = "DELETE FROM tbl_category WHERE category_id = '$category_id'";
        $query = mysqli_query($conn, $sql);
        header('location: cat_management.php');

    }

?>