<?php 
    include 'header.php';
    if (!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    }

    $sql = "SELECT * FROM tbl_user ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
?>
            <div class="content__right">
                <h1>Quản lý người dùng</h1>
                <div class="content__right--management">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Tên đăng nhập</th>
                                <th>Mật khẩu</th>
                                <th>emai</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>chức năng</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php 
                                while($row = mysqli_fetch_array($query)) {

                            ?>
                            <tr>
                                <td text-align="center"><?php echo $row['user_id'] ?></td>
                                <td text-align="center"><?php echo $row['user_fullname'] ?></td>
                                <td text-align="center"><?php echo $row['user_name'] ?></td>
                                <td text-align="center"><?php echo $row['user_password'] ?></td>
                                <td text-align="center"><?php echo $row['user_email'] ?></td>
                                <td text-align="center"><?php echo $row['user_phone'] ?></td>
                                <td text-align="center"><?php echo $row['user_address'] ?></td>
                                <td text-align="center"><a href="delete_user.php?user_id=<?php echo $row['user_id']; ?>">Xóa</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        const hello = document.querySelector(".hello")
        console.log(hello)
        const helloDropdown = document.querySelector(".user__desc")
        hello.onclick = function () {
            helloDropdown.style.display = 'block';
        }
    </script>
</body>

</html>