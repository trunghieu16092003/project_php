<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>

    <?php 
        include "config.php";
        if(isset($_POST['submit'])) {
            $user_fullname = $_POST['user_fullname'];
            $user_name = $_POST['user_name'];
            $user_password = md5($_POST['user_password']);
            $user_email = $_POST['user_email'];
            $user_phone = $_POST['user_phone'];
            $user_address = $_POST['user_address'];

            $sql = "INSERT INTO tbl_user(user_fullname, user_name, user_password, user_email, user_phone, user_address) 
            VALUES('$user_fullname', '$user_name', '$user_password', '$user_email', '$user_phone', '$user_address')";
            $query = mysqli_query($conn, $sql);
            echo 'bạn đăng ký thành công, chuyển sang đăng nhập sau 3 giây';
            header('refresh:3;url=login.php');
        }
    ?>   


    <div id="wrapper">
        <form action="" method="post">
            <h1>Đăng ký</h1>
            <div class="set__input">
                <label for="user_fullname">Nhập họ và tên</label>
                <input type="text" name="user_fullname" id="user_fullname" class="import" value="" required>
            </div>
            <div class="set__input">
                <label for="user_name">Nhập tên đăng nhập</label>
                <input type="text" name="user_name" id="user_name" class="import" value="" required>
            </div>

            <div class="set__input">
                <label for="user_password">Nhập mật khẩu</label>
                <input type="password" name="user_password" id="user_password" class="import" value="" required>
            </div>

            <div class="set__input">
                <label for="user_email">Nhập email</label>
                <input type="email" name="user_email" id="user_email" class="import" value="" required>
            </div>

            <div class="set__input">
                <label for="user_phone">Nhập số điện thoại</label>
                <input type="text" name="user_phone" id="user_phone" class="import" value="" required>
            </div>

            <div class="set__input">
                <label for="user_address">Nhập địa chỉ</label>
                <input type="text" name="user_address" id="user_address" class="import" value="" required>
            </div>

            <div class="set__input">
                <input type="submit" name="submit" value="Đăng ký" class="btn">
            </div>
        </form>
    </div>
</body>
</html>