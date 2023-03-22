<?php 
    session_start();
    include 'config.php';
    if (!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    } else {
        $product_id = $_GET['product_id'];
        $sql = "DELETE FROM tbl_product WHERE product_id = $product_id";
        $query = mysqli_query($conn, $sql);
        header('location: product_management.php');
    }
?> 