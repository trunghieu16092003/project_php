<?php 
    include "header.php";
    if (!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    }

    $sql = "SELECT * FROM tbl_cart, tbl_user WHERE tbl_cart.user_id = tbl_user.user_id ORDER BY tbl_cart.cart_id";
    $query = mysqli_query($conn,$sql);
?>

<div class="content__right">
    <h1>Quản lý đơn hàng</h1>
    <div class="content__right--management">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>email</th>
                    <th>tình trạng</th>
                    <th>chức năng</th>

                </tr>

            </thead>
            <tbody>
                <?php
                $temp = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $temp++;
                ?>
                    <tr>
                        <td text-align="center"><?php echo $temp; ?></td>
                        <td text-align="center"><?php echo $row['cart_id']; ?></td>
                        <td text-align="center"><?php echo $row['user_fullname']; ?></td>
                        <td text-align="center"><?php echo $row['user_email']; ?></td>
                        <td style="background_color: none;">
                            <?php 
                                if($row['cart_status'] == 1) {
                                    echo '<a style="background_color: #fff;" href="handle.php?cart_id='.$row['cart_id'].'">Đơn hàng mới</a>';
                                } else {
                                    echo "Đã xem";
                                }
                            ?>
                        </td>
                        <td text-align="center">
                            <a href="cart_detail.php?cart_id=<?php echo $row['cart_id'] ?>">Chi tiết</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>

<script>
    const hello = document.querySelector(".hello")
    const helloDropdown = document.querySelector(".user__desc")
    hello.onclick = function() {
        helloDropdown.style.display = 'block';
    }

    //hiện hộp thoại hiển thị muốn xóa chưa
    function delete_cat() {
        var conf = confirm('Bạn có chắc chắn muốn xóa không');
        return conf;
    }
</script>
</body>

</html>