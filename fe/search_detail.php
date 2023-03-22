<?php
include "header.php";
include 'category_detail.php';


$stext = $_POST['stext'];
$stext_new = trim($stext);
$arr_stext_new = explode(' ', $stext_new);
$stext_new = implode('%', $arr_stext_new);
$stext_new = '%'.$stext_new.'%';

$sql = "SELECT * FROM tbl_product WHERE product_name LIKE ('$stext_new') ORDER BY product_id DESC";
$query = mysqli_query($conn, $sql);
?>

<div class="body__content">
    <div class="body__content--item">
        <h1>kết quả tìm kiếm từ khóa "<?php echo $stext; ?>"</h1>

        <div class="body-category">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="body-category-item">
                    <a href="product_detail.php?product_id=<?php echo $row['product_id']; ?>"><img src="../admin/img/<?php echo $row['product_img']; ?>" alt=""></a>
                    <h4><a href=""><?php echo $row['product_name']; ?></a></h4>
                    <p class="price"><?php echo $row['product_price']; ?> VNĐ</p>
                </div>

            <?php } ?>
        </div>
    </div>


</div>
</div>

<?php
include 'footer.php';
?>