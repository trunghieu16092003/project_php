<?php
ob_start();
session_start();
include_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại meo meo</title>
    <link rel="stylesheet" href="/project/css/style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
</head>

<body>
    <div id="wrapper">
        <div class="header">
            <div class="header__top">
                <ul>
                    <?php 
                        if(isset($_SESSION['user_name'])) {
                    ?>
                    <li class="item">xin chào <span><?php echo $_SESSION['user_name']; ?></span></li>
                    <li class="item"><a href="log_out.php">Đăng xuất</a></li>
                    <li class="item"><a href="change_pass.php">Đổi mật khẩu</a></li>
                    <?php } else { ?>
                    <li class="item"><a href="login.php">Đăng nhập</a></li>
                    <li class="item"><a href="register.php">Đăng ký</a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="header__middle">
                <div class="header__middle--logo"><a href=""><img src="img/logo.jpg.png" alt=""></a></div>
                <div class="header__middle--right">
                    <div class="search__bar">
                        <div class="form">
                            <form action="search_detail.php" method="post" name="sform">
                                <input onfocus="searchFocus()" onblur="searchBlur()" class="search-text" type="text" value="Nhập từ khóa" name="stext">
                                <input class="search-btn" type="submit" value="Tìm kiếm" name="search">
                            </form>
                        </div>
                    </div>
                    <div class="shopping__cart">
                        <a href="cart.php">
                            <i class="fas fa-shopping-cart"></i>
                            <span><?php if (isset($_SESSION['cart'])) {
                                        echo count($_SESSION['cart']);
                                    } else {echo 0;}?></span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="header__bottom">
                <ul>
                    <li class="header__bottom--menu">
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <li class="header__bottom--menu">
                        <a href="">Shop</a>

                    </li>
                    <li class="header__bottom--menu">
                        <a href="">Liên hệ</a>
                    </li>

                    <li class="header__bottom--menu">
                        <a href="">Chính sách</a>
                    </li>

                    <li class="header__bottom--menu">
                        <a href="">Blog</a>
                    </li>

                    <?php if(isset($_SESSION['user_name'])) { ?>
                    <li class="header__bottom--menu"><a href="order_history.php">Lịch sử đơn hàng</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <script>
            function searchFocus() {
                if (document.sform.stext.value == "Nhập từ khóa") {
                    document.sform.stext.value = "";
                }
            }

            function searchBlur() {
                if (document.sform.stext.value == "") {
                    document.sform.stext.value = "Nhập từ khóa";
                }
            }
        </script>