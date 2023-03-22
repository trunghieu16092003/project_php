<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_name'])) {
    echo "bạn phải đăng nhập";
    header("location: required.php");
} else {

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_GET["action"])) {
        $notify = false;
        switch ($_GET["action"]) {
            case "add":
                foreach ($_POST['product_quantity_buy'] as $product_id => $product_quantity_buy) {
                    if (!isset($_SESSION['cart'][$product_id])) {
                        $_SESSION['cart'][$product_id] = 0;
                    }

                    if (isset($_SESSION['cart'][$product_id])) {
                        $_SESSION['cart'][$product_id] += $product_quantity_buy;
                    } else {
                        $_SESSION['cart'][$product_id] = $product_quantity_buy;
                    }

                    // Kiểm tra số lượng tồn kho
                    $sql_check = "SELECT product_quantity FROM tbl_product WHERE product_id = '$product_id'";
                    $query_check = mysqli_query($conn, $sql_check);
                    $result_check = mysqli_fetch_assoc($query_check);

                    if ($_SESSION['cart'][$product_id] > $result_check['product_quantity']) {
                        $_SESSION['cart'][$product_id] = $result_check['product_quantity'];
                        $notify = true;
                    }

                    if ($notify) {
                        echo "Số lượng đặt vượt quá số lượng tồn kho, vui lòng quay lại để điều chỉnh số lượng";
                    } else {
                        header("Location: cart.php");
                    }
                }


                break;

            case "delete":
                if (isset($_GET['product_id'])) {
                    unset($_SESSION['cart'][$_GET['product_id']]);
                }
                header("Location: cart.php");
                break;

            case "update":

                if (isset($_POST['update_click'])) {
                    foreach ($_POST['product_quantity_buy'] as $product_id => $product_quantity_buy) {
                        $_SESSION['cart'][$product_id] = $product_quantity_buy;
                    }
                    $sql_check = "SELECT product_quantity FROM tbl_product WHERE product_id = '$product_id'";
                    $query_check = mysqli_query($conn, $sql_check);
                    $result_check = mysqli_fetch_assoc($query_check);

                    if ($_SESSION['cart'][$product_id] > $result_check['product_quantity']) {
                        $_SESSION['cart'][$product_id] = $result_check['product_quantity'];
                        $notify = true;
                    }

                    if ($notify) {
                        echo "Số lượng đặt vượt quá số lượng tồn kho, vui lòng quay lại <a href='cart.php'>đây</a> để điều chỉnh số lượng";
                    } else {
                        header("Location: cart.php");
                    }
                }
                break;

            case "delete-all":
                unset($_SESSION['cart']);
                echo "<script>
                confirm('Không có sản phẩm nào trong giỏ hàng, vui lòng quay lại trang chủ')
            </script>";
                // header("Location: about-us.php");
                break;

            case "pay":
                if (isset($_POST['buy'])) {
                    if (!empty($_POST['product_quantity_buy'])) {
                        $sql = "SELECT * FROM tbl_product WHERE product_id IN (" . implode(',', array_keys($_POST['product_quantity_buy'])) . ")";
                        $query = mysqli_query($conn, $sql);
                        $total_price_all = 0;
                        $order_product = array();
                        $update_quantity_str = "";
                        while ($row = mysqli_fetch_array($query)) {
                            $order_product[] = $row;
                            $total_price_all += $row['product_price'] * $_POST['product_quantity_buy'][$row['product_id']];
                            $update_quantity_str .= " when product_id = ".$row['product_id']." then product_quantity - ".$_POST['product_quantity_buy'][$row['product_id']];
                        }

                        //update số lượng sản phẩm sau khi đặt hàng thành công
                        $sql_update_quantity = "UPDATE tbl_product SET product_quantity = CASE $update_quantity_str 
                        END WHERE product_id IN (" . implode(',', array_keys($_POST['product_quantity_buy'])) . ")";
                        $query_update_quantity = mysqli_query($conn, $sql_update_quantity);
                        
                        
                        // $cart_id = rand(0, 99999);
                        $cart_payment = $_POST['cart_payment'];

                        // lấy thông tin người nhận
                        $user_id = $_SESSION['user_id'];
                        $sql_receive = "SELECT * FROM tbl_receive WHERE user_id = '$user_id' LIMIT 1";
                        $query_receive = mysqli_query($conn, $sql_receive);
                        $row_receive = mysqli_fetch_array($query_receive); 
                        $receive_name = $row_receive['receive_name'];
                        $receive_phone = $row_receive['receive_phone'];
                        $receive_address = $row_receive['receive_address'];
                        $receive_note = $row_receive['receive_note'];


                        // insert đơn hàng
                        $sql_cart = "INSERT INTO tbl_cart( user_id, cart_status, cart_payment, receive_name, receive_phone, receive_address, receive_note) 
                    VALUES ('$user_id',1, '$cart_payment', '$receive_name', '$receive_phone', '$receive_address', '$receive_note')";
                        $query_cart = mysqli_query($conn, $sql_cart);

                        $order_id = $conn->insert_id;
                        $insert_cart_detail = "";
                        foreach ($order_product as $key => $item) {
                            $insert_cart_detail .= "('$order_id', '" . $item['product_id'] . "', '" . $_POST['product_quantity_buy'][$item['product_id']] . "', 
                         '" . $item['product_price'] . "')";

                            if ($key != count($order_product) - 1) {
                                $insert_cart_detail .= ",";
                            }
                        }
                        $sql_cart_detail = "INSERT InTo tbl_cart_detail(cart_id, product_id, product_quantity_buy, product_price) VALUES " . $insert_cart_detail . "";
                        $query_cart_detail = mysqli_query($conn, $sql_cart_detail);

                        echo "<p style='color: rgb(51, 186, 51);'>Bạn đã đặt hàng thành công. Cảm ơn bạn đã tin tưởng vào sản phẩm của chúng 
                        tôi. Sản phẩm sẽ được giao trong thời gian sớm nhất. Bạn có thể quay lại <a href='index.php'>Đây<a> để tiếp tục mua hàng</p>";
                        unset($_SESSION['cart']);
                    }
                }
                break;
        }
    }
}
