<?php
include "header.php";
include "category_detail.php";
?>
<?php
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_receive WHERE user_id = '$user_id' LIMIT 1";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
if ($row > 0) {
    $row_receive = mysqli_fetch_array($query);
    $receive_name = $row_receive['receive_name'];
    $receive_phone = $row_receive['receive_phone'];
    $receive_address = $row_receive['receive_address'];
    $receive_note = $row_receive['receive_note'];
} else {
    $receive_name = "";
    $receive_phone = '';
    $receive_address = '';
    $receive_note = '';
}
?>

<link rel="stylesheet" href="/project/css/cart.css">
<section class="cart">
    <div class="cart__container">
        <div class="cart__container--top">
            <div class="top-item ">
                <i class="fas fa-shopping-cart"></i>
            </div>

            <div class="top-item">
                <i class="fas fa-map-marker"></i>
            </div>

            <div class="top-item bg-color">
                <i class="fas fa-money-check"></i>
            </div>
        </div>
    </div>

    <div class="receive">
        <form action="handle_cart.php?action=pay" method="POST">
            <div class="receive__info">
                <div class="receive__info--item">
                    <h4>Thông tin người nhận</h4>
                    <ul>
                        <li>Họ và tên: <b><?php echo $receive_name; ?></b></li>
                        <li>Số điện thoại: <b><?php echo $receive_phone; ?></b></li>
                        <li>Địa chỉ: <b><?php echo $receive_address; ?></b></li>
                        <li>Họ và tên: <b><?php echo $receive_note; ?></b></li>
                    </ul>
                </div>
                <div class="receive__pay">
                    <h4>Phương thức than toán</h4>
                    <div class="receive__pay--item">
                        <input type="radio" name="cart_payment" id="cash" checked value="thanh toán khi nhận hàng">
                        <label for="cash">Thanh toán khi nhận hàng</label>
                    </div>

                    <div class="receive__pay--item">
                        <input type="radio" name="cart_payment" id="online" value="thanh toán trực tuyến">
                        <label for="online">Thanh toán trực tuyến</label>
                    </div>
                </div>
            </div>


            <div class="cart-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_price = 0;
                        $total_price_all = 0;
                        //truy vấn hiển thị giỏ hàng
                        if (!empty($_SESSION['cart'])) {
                            $sql_cart = "SELECT * FROM tbl_product WHERE product_id IN (" . implode(',', array_keys($_SESSION["cart"])) . ")";
                            $query_cart = mysqli_query($conn, $sql_cart);
                            while ($row = mysqli_fetch_array($query_cart)) {
                        ?>
                                <tr>
                                    <td class="img-product"><img src="../admin/img/<?php echo $row['product_img']; ?>" alt=""></td>
                                    <td>
                                        <h1><?php echo $row['product_name']; ?></h1>
                                    </td>
                                    <td>
                                        <input type="number" name="product_quantity_buy[<?= $row['product_id']; ?>]" id="" value="<?php echo $_SESSION['cart'][$row['product_id']]; ?>">
                                    </td>
                                    <td>
                                        <p><?php echo $row['product_price']; ?></p>
                                    </td>
                                    <td><span><?php echo $total_price = $_SESSION['cart'][$row['product_id']] * $row['product_price']; ?></span></td>
                                </tr>

                        <?php
                                $total_price_all += $total_price;
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="total-all">Tổng tiền: <span><b><?php echo $total_price_all; ?>VNĐ</b></span></div>
            </div>
            <div class="pay">
                <input type="submit" value="Thanh toán ngay" name="buy">
            </div>
        </form>
    </div>
</section>

</div>

<?php include "footer.php"; ?>