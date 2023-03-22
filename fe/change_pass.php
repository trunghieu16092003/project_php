<?php
session_start();
include_once 'config.php';

$user_name=$_SESSION['user_name'];

if (isset($_POST['btn_change'])) {
    $error = array();
    if (empty($_POST['user_password_old'])) {
        $error['user_password_old'] = "Vui lòng nhập trường này";
    } else {
        $pattern = "/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/";
        if (!preg_match($pattern, $_POST['user_password_old'])) {
            $error['user_password_old'] = "Mật khẩu không đúng định dạng";
        } else {
            $user_password_old = md5($_POST['user_password_old']);
        }
    }

    if (empty($_POST['user_password_new'])) {
        $error['user_password_new'] = "Vui lòng nhập trường này";
    } else {
        $pattern = "/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/";
        if (!preg_match($pattern, $_POST['user_password_new'])) {
            $error['user_password_new'] = "Mật khẩu không đúng định dạng";
        } else {
            $user_password_new = md5($_POST['user_password_new']);
        }
    }

    if (empty($error)) {
        $sql = "SELECT * FROM tbl_user WHERE user_name='$user_name' AND user_password='$user_password_old'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $sql_change = "UPDATE tbl_user SET user_password='$user_password_new' WHERE user_name = '$user_name'";
            $query_change = mysqli_query($conn, $sql_change);
            echo "mật khẩu được đổi thành công";
        } else {
            echo "tài khoản hoặc mật khẩu cũ không đúng";
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/login_admin.css">
</head>

<body>
    <div id="wrapper">
        <form action="" method="post">
            <h1>Đổi mật khẩu</h1>
           

            <div class="set__input">
                <label for="user_password_old">Nhập mật khẩu cũ</label>
                <input type="password" name="user_password_old" id="user_password_old" class="import">
                <?php
                if (!empty($error['user_password_old'])) {
                ?>
                    <span class="error"><?php echo $error['user_password_old']; ?></span>
                <?php } ?>
            </div>

            <div class="set__input">
                <label for="user_password_new">Nhập mật khẩu mới</label>
                <input type="password" name="user_password_new" id="user_password_new" class="import">
                <?php
                if (!empty($error['user_password_new'])) {
                ?>
                    <span class="error"><?php echo $error['user_password_new']; ?></span>
                <?php } ?>
            </div>
            <div class="set__input">
                <input type="submit" name="btn_change" value="Đổi mật khẩu" class="btn">
            </div>
        </form>

    </div>
</body>

</html>