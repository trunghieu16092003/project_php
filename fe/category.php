<?php
include 'header.php';
$category_id = $_GET['category_id'];
$sql_cat = "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
$query_cat = mysqli_query($conn, $sql_cat);
$row_cat = mysqli_fetch_array($query_cat);

#lấy sản phẩm từ category_id
$sql_product = "SELECT * FROM tbl_product WHERE category_id = '$category_id' ORDER BY product_id DESC";
$query_product = mysqli_query($conn, $sql_product);


?>
<link rel="stylesheet" href="/project/css/category.css">

<?php
include 'category_detail.php';
?>
<div class="body">
    <div class="body__content">
        <div class="body__content--item special">
            <div class="body-category">
                <?php
                while ($row_product = mysqli_fetch_array($query_product)) {
                ?>
                    <div class="body-category-item">
                        <a href="product_detail.php?product_id=<?php echo $row_product['product_id']; ?>"><img src="../admin/img/<?php echo $row_product['product_img']; ?>" alt=""></a>

                        <h4><a href=""><?php echo $row_product['product_name']; ?></a></h4>
                        <p class="price"><?php echo $row_product['product_price']; ?> VNĐ</p>
                    </div>

                <?php

                } ?>
            </div>
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
<?php include 'footer.php'; ?>
<script>
    const sideBarItems = document.querySelectorAll('.side-bar-items');
    sideBarItems.forEach(function(item, index) {
        item.onclick = function() {
            item.classList.toggle('block');
        }

    })
</script>
</body>

</html>