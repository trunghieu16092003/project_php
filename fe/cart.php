<?php
include "header.php";
include "category_detail.php";

?>
<link rel="stylesheet" href="/project/css/cart.css">

<section class="cart">
    <div class="cart__container">
        <div class="cart__container--top">
            <div class="top-item bg-color">
                <i class="fas fa-shopping-cart"></i>
            </div>

            <div class="top-item">
                <i class="fas fa-map-marker"></i>
            </div>

            <div class="top-item">
                <i class="fas fa-money-check"></i>
            </div>
        </div>
    </div>


    <div class="cart-content">
        <div class="cart-content-center">
            <form action="handle_cart.php?action=update" method="post" id="cart">
                <table>
                    <thead>
                        <tr>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>giá</th>
                            <th>Thành tiền</th>
                            <th>Chức năng</th>
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
                                        <input type="number" name="product_quantity_buy[<?= $row['product_id']; ?>]" class="quantity" value="<?php echo $_SESSION['cart'][$row['product_id']]; ?>">
                                    </td>
                                    <td>
                                        <p><?php echo $row['product_price']; ?></p>
                                    </td>
                                    <td><span><?php echo $total_price = $_SESSION['cart'][$row['product_id']] * $row['product_price']; ?></span></td>
                                    <td><a href="handle_cart.php?action=delete&product_id=<?php echo $row['product_id']; ?>">Xóa</a></td>
                                </tr>

                        <?php
                                $total_price_all += $total_price;
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" value="cập nhật" name="update_click" class='update_click'>
            </form>
            <a class="continue-buy" href="about-us.php">Tiếp tục mua hàng</a>
            <a class="delete-all" href="handle_cart.php?action=delete-all">Xóa toàn bộ</a>
            <a class="complete" href="transport.php" style="color: black;">Hoàn thành mua hàng</a>
            <div class="total-all">Tổng tiền: <span><b><?php echo $total_price_all; ?>VNĐ</b></span></div>
        </div>
    </div>
</section>
</div>

<?php include "footer.php" ?>