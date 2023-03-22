<?php
include "header.php";
include "category_detail.php";

?>
<link rel="stylesheet" href="/project/css/cart.css">
<link rel="stylesheet" href="/project/css/transport.css">

<section class="cart">
    <div class="cart__container">
        <div class="cart__container--top">
            <div class="top-item ">
                <i class="fas fa-shopping-cart"></i>
            </div>

            <div class="top-item bg-color">
                <i class="fas fa-map-marker"></i>
            </div>

            <div class="top-item">
                <i class="fas fa-money-check"></i>
            </div>
        </div>
    </div>

    <div class="information__receive">
        <h3>Thông tin người nhận</h3>
        <?php
        $user_id = $_SESSION['user_id'];
        if (isset($_POST['continue'])) {
            $receive_name = $_POST['receive_name'];
            $receive_phone = $_POST['receive_phone'];
            $receive_address = $_POST['receive_address'];
            $receive_note = $_POST['receive_note'];
            $sql_receive = "INSERT INTO tbl_receive(receive_name,receive_phone,receive_address,receive_note, user_id) VALUES('$receive_name', '$receive_phone', '$receive_address', '$receive_note', '$user_id')";
            $query_receive = mysqli_query($conn, $sql_receive);
        } else if (isset($_POST['update'])) {
            $receive_name = $_POST['receive_name'];
            $receive_phone = $_POST['receive_phone'];
            $receive_address = $_POST['receive_address'];
            $receive_note = $_POST['receive_note'];

            $sql_update = "UPDATE tbl_receive SET receive_name = '$receive_name', receive_phone = '$receive_phone', 
        receive_address = '$receive_address', receive_note = '$receive_note', user_id = '$user_id' WHERE user_id = '$user_id'";
            $query_update = mysqli_query($conn, $sql_update);
        }
        ?>

        <?php
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
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="fullname">Tên người nhận</label>
                <input type="text" value="<?php echo $receive_name; ?>" name="receive_name" id="fullname">
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" value="<?php echo $receive_phone; ?>" name="receive_phone" id="phone">
            </div>

            <div class="form-group">
                <label for="address">địa chỉ</label>
                <input type="text" value="<?php echo $receive_address; ?>" name="receive_address" id="address">
            </div>

            <div class="form-group">
                <label for="note">ghi chú</label>
                <input type="text" value="<?php echo $receive_note; ?>" name="receive_note" id="note">
            </div>

            <?php
            if ($receive_name == '' && $receive_phone == '') {
            ?>

                <div class="form-group">
                    <input type="submit" value="tiếp tục" name="continue">
                </div>
            <?php } else if ($receive_name != '' && $receive_phone != '') { ?>
                <div class="form-group">
                    <input type="submit" value="cập nhật thông tin" name="update">
                </div>

            <?php } ?>
        </form>
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
                                <input disabled="disabled" type="number" name="product_quantity_buy[<?= $row['product_id']; ?>]" id="" value="<?php echo $_SESSION['cart'][$row['product_id']]; ?>">
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
        <a class="continue" href="info_payment.php">Tiếp tục</a>
    </div>


</section>


</div>

<?php include "footer.php" ?>