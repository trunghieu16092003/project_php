<?php
include "header.php";
include "category_detail.php";
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_cart, tbl_user WHERE tbl_cart.user_id = tbl_user.user_id AND tbl_cart.user_id = '$user_id' ORDER BY tbl_cart.cart_id";
$query = mysqli_query($conn, $sql);

?>

<style>
.table__order{
    margin-left: 50px;
    margin-bottom: 20px;
}

</style>

<div class="table__order">
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Người nhận hàng</th>
                <th>Số điện thoại người nhận</th>
                <th>tình trạng</th>
                <th>Hình thức thanh toán</th>
                <th>Xem đơn hàng</th>

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
                    <td text-align="center"><?php echo $row['receive_name']; ?></td>
                    <td text-align="center"><?php echo $row['receive_phone']; ?></td>
                    <td>
                        <?php
                        if ($row['cart_status'] == 1) {
                            echo '<a style="background_color: #fff;" href="#">Đơn hàng mới</a>';
                        } else {
                            echo "Đã xem";
                        }
                        ?>
                    </td>
                    <td><?php echo $row['cart_payment']; ?></td>
                    <td text-align="center">
                        <a href="order_detail_history.php?cart_id=<?php echo $row['cart_id'] ?>">Chi tiết</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</div>

<?php include 'footer.php'; ?>