<?php
ob_start(); // hạn chế lỗi của header
session_start();
include_once 'config.php';
?>

<?php
// kiểm tra định dạng form
if (isset($_POST['btn_login'])) {
    $error = array();
    if (empty($_POST['user_name'])) {
        $error['user_name'] = "Vui lòng nhập trường này";
    } else {
        $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if (!preg_match($pattern, $_POST['user_name'])) {
            $error['user_name'] = "Tên đăng nhập không đúng định dạng";
        } else {
            $user_name = $_POST['user_name'];
        }
    }

    if (empty($_POST['user_password'])) {
        $error['user_password'] = "Vui lòng nhập trường này";
    } else {
        $pattern = "/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/";
        if (!preg_match($pattern, $_POST['user_password'])) {
            $error['user_password'] = "Mật khẩu không đúng định dạng";
        } else {
            $user_password = md5($_POST['user_password']);
        }
    }

    if (empty($error)) {
        $sql = "SELECT * FROM tbl_user WHERE user_name='$user_name'";
        $query = mysqli_query($conn, $sql);


        if (mysqli_num_rows($query) > 0) {
            if (isset($_POST['remember'])) {
                setcookie('user_name', $user_name, time() + 3600);
                setcookie('user_password', $user_password,  time() + 3600);
            } else {
                setcookie('user_name', '');
                setcookie('user_password', '');
            }

            $row = mysqli_fetch_array($query);
            $_SESSION['user_id'] = $row['user_id'];

            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_password'] = $user_password;
            header('location: index.php');
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
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/login_admin.css">
</head>

<body>
    <div id="wrapper">
        <form action="" method="post">
            <h1>Đăng nhập</h1>
            <div class="set__input">
                <label for="user_name">Nhập tên đăng nhập</label>
                <input type="text" name="user_name" id="user_name" class="import" value="<?php if (isset($_COOKIE["user_name"])) echo $_COOKIE["user_name"]; ?>">
                <?php
                if (!empty($error['user_name'])) {
                ?>
                    <span class="error"><?php echo $error['user_name']; ?></span>
                <?php } ?>
            </div>

            <div class="set__input">
                <label for="user_password">Nhập mật khẩu</label>
                <input type="password" name="user_password" id="user_password" class="import" value="<?php if (isset($_COOKIE["user_password"])) echo $_COOKIE["user_password"]; ?>">
                <?php
                if (!empty($error['user_password'])) {
                ?>
                    <span class="error"><?php echo $error['user_password']; ?></span>
                <?php } ?>
            </div>
            <input type="checkbox" name="remember" id="" <?php if (isset($_COOKIE["user_name"])) : ?> checked <?php endif ?>>Ghi nhớ mật khẩu
            <div class="set__input">
                <input type="submit" name="btn_login" value="Đăng nhập" class="btn">
            </div>
            <p>Bạn chưa có tài khoản <a href="register.php">Đăng ký</a></p>
        </form>

    </div>
</body>

</html>