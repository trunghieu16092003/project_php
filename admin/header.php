<?php
ob_start();
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="user__admin">
                <p class="hello">xin chào
                    <span>
                        <?php if (isset($_SESSION['admin_username'])) echo $_SESSION['admin_username']; ?>
                    </span>
                </p>
            </div>
        </header>
        <div class="user__desc">
            <ul class="dropdown">
                <li><a href="">Thông tin tài khoản</a></li>
                <li><a href="log_out.php">Đăng xuất</a></li>
            </ul>
        </div>


        <div class="content">
            <div class="content__left">
                <div class="content__left--item"><a href="user_management.php">Quản lý người dùng</a> </div>
                <div class="content__left--item"><a href="cat_management.php">Quản lý danh mục</a> </div>
                <div class="content__left--item"><a href="product_management.php">Quản lý sản phẩm</a> </div>
                <div class="content__left--item"><a href="cmt_management.php">Quản lý bình luận</a> </div>
                <div class="content__left--item"><a href="cart_list.php">Quản lý đơn hàng</a> </div>
            </div>