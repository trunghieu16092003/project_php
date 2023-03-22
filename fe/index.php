<?php
include 'header.php';
$sql_special = "SELECT * FROM tbl_product WHERE product_special=1 ORDER BY product_id DESC LIMIT 8";
$query_special = mysqli_query($conn, $sql_special);

$sql_new = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 8";
$query_new = mysqli_query($conn, $sql_new);
?>
<?php
include 'category_detail.php';
?>
<div class="body__content">
    <div class="body__content--item special">
        <h1>Sản phẩm đặc biệt</h1>

        <div class="body-category">
            <?php
            while ($row = mysqli_fetch_array($query_special)) {
            ?>
                <div class="body-category-item">
                    <a href="product_detail.php?product_id=<?php echo $row['product_id']; ?>"><img src="../admin/img/<?php echo $row['product_img']; ?>" alt=""></a>

                    <h4><a href="product_detail.php?product_id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a></h4>
                    <p class="price"><?php echo $row['product_price']; ?> VNĐ</p>
                </div>

            <?php } ?>
        </div>
    </div>
    <div class="body-paging">
        <div class="body-paging-item">
            <p>showing 2<span>|</span>4 products</p>
        </div>
        <div class="body-paging-item">
            <p><span><i class="fas fa-angle-double-left"></i></span>1 2 3 4 5 <span><i class="fas fa-angle-double-right"></i></span>Last page</p>
        </div>
    </div>

    <div class="body__content--item new">
        <h1>Sản phẩm mới nhất</h1>
        <div class="body-category">
            <?php
            while ($row_new = mysqli_fetch_array($query_new)) {
            ?>
                <div class="body-category-item">
                    <a href="product_detail.php?product_id=<?php echo $row_new['product_id']; ?>"><img src="../admin/img/<?php echo $row_new['product_img']; ?>" alt=""></a>

                    <h4><a href=""><?php echo $row_new['product_name']; ?></a></h4>
                    <p class="price"><?php echo $row_new['product_price']; ?> VNĐ</p>
                </div>

            <?php } ?>
        </div>
    </div>
    <div class="body-paging">
        <div class="body-paging-item">
            <p>showing 2<span>|</span>4 products</p>
        </div>
        <div class="body-paging-item">
            <p><span><i class="fas fa-angle-double-left"></i></span>1 2 3 4 5 <span><i class="fas fa-angle-double-right"></i></span>Last page</p>
        </div>
    </div>

</div>
</div>

<?php
include 'footer.php';
?>