<?php
include 'header.php';
$product_id = $_GET['product_id'];
$user_id = $_SESSION['user_id'];

// Hiển thị chi tiết sản phẩm
$sql = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

//lấy dữ liệu của người dùng
function showProfile($user_id)
{
    global $conn;
    $data = null;
    $sql_user = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
    $query_user = mysqli_query($conn, $sql_user);
    if ($query_user) {
        while ($row_user = mysqli_fetch_array($query_user)) {
            $data[] = $row_user;
        }
    }
    return $data;
}


//show cmt
function show_cmt($product_id)
{
    global $conn;
    $data = null;
    $sql_show_cmt = "SELECT * FROM tbl_comment 
                INNER JOIN tbl_product ON tbl_comment.product_id = tbl_product.product_id 
                INNER JOIN tbl_user ON tbl_comment.user_id = tbl_user.user_id WHERE tbl_product.product_id = '$product_id'";

    $query_show_cmt = mysqli_query($conn, $sql_show_cmt);
    $result = mysqli_num_rows($query_show_cmt);
    if ($result > 0) {
        while ($row_cmt = mysqli_fetch_assoc($query_show_cmt)) {
            $data[] = $row_cmt;
        }
        return $data;
    }
}

?>

<link rel="stylesheet" href="/project/css/product_detail.css">

<div id="product">
    <div class="product-wrapper">
        <form class="product-content" method="post" action="handle_cart.php?action=add">
            <div class="product-content-img">
                <div class="img-info">
                    <img src="../admin/img/<?php echo $row['product_img']; ?>" alt="">
                </div>
            </div>
            <div class="product-content-info">
                <div class="name">
                    <h1>Tên sản phẩm: <?php echo $row['product_name']; ?></h1>

                </div>
                <div class="price">
                    <p>Giá tiền: <span><?php echo $row['product_price']; ?></span>VNĐ</p>
                </div>

                <div class="insur">
                    <p><b>Thời gian bảo hành: </b><?php echo $row['product_insur']; ?></p>
                </div>

                <?php if($row['product_quantity'] > 0) { ?>

                <div class="quantity_available">
                    <span>Tồn kho : <?= $row['product_quantity']; ?></span>
                </div>
                <div class="quantity">
                    <label for="">Số lượng đặt</label>
                    <input type="number" name="product_quantity_buy[<?= $product_id; ?>]" id="" value="" min="1">
                </div>
                <input type="submit" value="mua hàng" class="buy">
                <?php } else { ?>
                    <span>Đã hết hàng, vui lòng mua sản phẩm khác</span>
                <?php } ?>
            </div>
        </form>

        <div class="product-bottom">
            <div class="product-bottom-title">
                <div class="title-item active-item">
                    <p>Thông tin chi tiết</p>
                </div>
            </div>

            <div class="product-bottom-content">
                <div class="content-item block">
                    <p><?php echo $row['product_desc']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="show__comment">
    <?php
    $show_cmt = show_cmt($product_id);
    if (!empty($show_cmt)) {
        foreach ($show_cmt as $cmt) {
    ?>
            <div class="show__comment--content">
                <div class="username">
                    <h4><?php echo $cmt['user_name'] ?></h4>
                </div>
                <div class="cmt">
                    <p><?php echo $cmt['cmt_content']; ?></p>

                    <?php

                    // show nút xóa tương ứng với cmt của người dùng
                    $showProfile = showProfile($cmt['user_id']);
                    if (!empty($showProfile)) {
                        foreach ($showProfile as $item) {
                            if(isset($_SESSION['user_id'])) {
                                if($_SESSION['user_id'] == $item['user_id']):
                    ?>

                    <a href="handle_cmt.php?cmt_id=<?= $cmt['cmt_id'];?>&product_id=<?= $cmt['product_id'];?>">Xóa</a>

                    <?php  endif; ?>

                    <?php } ?>

                    <?php        
                        }
                    } 
                    ?>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>

<div class="comment">
    <?php if(!isset($_SESSION['user_name'])) {
        echo isset($_SESSION['error']) ? $_SESSION['error'] : '';
    } ?>
    <form action="handle_cmt.php?product_id=<?php echo $product_id; ?>" method="post">
        <input type="text" name="cmt_content" id="" placeholder="Để lại bình luận ở đây">
        <input type="text" name="cmt_date" id="" hidden value="<?php $date = date("Y-m-d");
                                                                echo $date; ?>">
        <button type="submit" name="submit">Gửi</button>
    </form>
</div>

</div>

<?php include 'footer.php'; ?>