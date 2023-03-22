<?php 
include "config.php";
    if(isset($_GET['cart_id'])) {
        $cart_id = $_GET['cart_id'];
        $sql = "UPDATE tbl_cart SET cart_status = 0 WHERE cart_id = '$cart_id'";
        $query = mysqli_query($conn, $sql);
        header("location: cart_list.php");
    }
?>