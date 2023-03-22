<?php
include "header.php";
include "category_detail.php";
$cart_id = $_GET['cart_id'];

$sql = "SELECT * FROM tbl_cart_detail, tbl_product WHERE tbl_cart_detail.product_id = tbl_product.product_id AND tbl_cart_detail.cart_id = '$cart_id'
    ORDER BY tbl_cart_detail.cart_detail_id";
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
                <th>Tên sản phẩm</th>
                <th>Số lương</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>

            </tr>

        </thead>
        <tbody>
            <?php
            $temp = 0;
            $total_price = 0;
            $total_price_all = 0;
            while ($row = mysqli_fetch_array($query)) {
                $temp++;
                $total_price = $row['product_price'] * $row['product_quantity_buy'];
                $total_price_all += $total_price;
            ?>
                <tr>
                    <td text-align="center"><?php echo $temp; ?></td>
                    <td text-align="center"><?php echo $row['cart_id']; ?></td>
                    <td text-align="center"><?php echo $row['product_name']; ?></td>
                    <td text-align="center"><?php echo $row['product_quantity_buy']; ?></td>
                    <td text-align="center"><?php echo $row['product_price']; ?></td>
                    <td text-align="center"><?php echo $row['product_price'] * $row['product_quantity_buy']; ?> vnd</td>
                </tr>
            <?php
            }

            ?>
            <tr colspan="6">
                <p>Tổng tiền: <?php echo $total_price_all; ?> vnd</p>
            </tr>
        </tbody>
    </table>
</div>

</div>


<?php
include "footer.php";
?>