<?php
include "config.php";
session_start();
$product_id = $_GET['product_id'];

//lấy ra tên sản phẩm từ id
$sql_product = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
$query_product = mysqli_query($conn, $sql_product);
$row_product = mysqli_fetch_array($query_product);
$product_name = $row_product['product_name'];



//Them bình luận vào database
if (isset($_POST['submit'])) {

    $cmt_content = $_POST['cmt_content'];
    $cmt_date = $_POST['cmt_date'];
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        $sql = "INSERT INTO tbl_comment (user_id, user_name, product_id, cmt_content, cmt_date, product_name) VALUES ('$user_id', '$user_name', '$product_id', '$cmt_content', '$cmt_date', '$product_name')";
        $query = mysqli_query($conn, $sql);
        header('location: product_detail.php?product_id=' . $product_id . '');
    } else {
        $_SESSION['error'] = "Đăng nhập để bình luận";
        header('location: product_detail.php?product_id=' . $product_id . '');
    }
}

// xóa bình luận
$cmt_id = $_GET['cmt_id'];
$sql_del_cmt = "DELETE FROM tbl_comment WHERE cmt_id = '$cmt_id' ";
$query_del_cmt = mysqli_query($conn, $sql_del_cmt);
header('location: product_detail.php?product_id=' . $product_id . '');
