<?php
ob_start(); // hạn chế lỗi của header
session_start();
include_once 'config.php';
?>

<?php
// kiểm tra định dạng form
if (isset($_POST['btn_login'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $error = array();
    if (empty($_POST['admin_username'])) {
        $error['admin_username'] = "Vui lòng nhập trường này";
    } else {
        $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if (!preg_match($pattern, $_POST['admin_username'])) {
            $error['admin_username'] = "Tên đăng nhập không đúng định dạng";
        } else {
            $admin_username = $_POST['admin_username'];
        }
    }

    if (empty($_POST['admin_password'])) {
        $error['admin_password'] = "Vui lòng nhập trường này";
    } else {
        $pattern = "/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/";
        if (!preg_match($pattern, $_POST['admin_password'])) {
            $error['admin_password'] = "Mật khẩu không đúng định dạng";
        } else {
            $admin_password = $_POST['admin_password'];
        }
    }

    if (empty($error)) {
        $sql = "SELECT * FROM tbl_admin WHERE admin_username='$admin_username'";
        $query = mysqli_query($conn, $sql);


        if (mysqli_num_rows($query) > 0) {
            if (isset($_POST['remember'])) {
                setcookie('admin_username', $admin_username, time() + 3600);
                setcookie('admin_password', $admin_password,  time() + 3600);
            } else {
                setcookie('admin_username', '');
                setcookie('admin_password', '');
            }

            $_SESSION['is_login'] = true;
            $_SESSION['admin_username'] = $admin_username;
            $_SESSION['admin_password'] = $admin_password;
            header('location: admin.php');
        } else {
            echo "tài khoản không tòn tại";
        }
    }

    // click vào ghi nhớ mk thì hiện
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống quản trị</title>
    <link rel="stylesheet" href="../css/login_admin.css">
</head>

<body>
    <div id="wrapper">
        <form action="" method="post">
            <h1>Đăng nhập</h1>
            <div class="set__input">
                <label for="admin_username">Nhập tên đăng nhập</label>
                <input type="text" name="admin_username" id="admin_username" class="import" value="<?php if (isset($_COOKIE["admin_username"])) echo $_COOKIE["admin_username"];?>">
                <?php
                if (!empty($error['admin_username'])) {
                ?>
                    <span class="error"><?php echo $error['admin_username']; ?></span>
                <?php } ?>
            </div>

            <div class="set__input">
                <label for="admin_password">Nhập mật khẩu</label>
                <input type="password" name="admin_password" id="admin_password" class="import" value="<?php  if (isset($_COOKIE["admin_password"])) echo $_COOKIE["admin_password"]; ?>">
                <?php
                if (!empty($error['admin_password'])) {
                ?>
                    <span class="error"><?php echo $error['admin_password']; ?></span>
                <?php } ?>
            </div>
            <input type="checkbox" name="remember" id="" <?php if (isset($_COOKIE["admin_username"])): ?> checked <?php endif ?>>Ghi nhớ mật khẩu
            <div class="set__input">
                <input type="submit" name="btn_login" value="Đăng nhập" class="btn">
            </div>

        </form>
    </div>
</body>

</html>