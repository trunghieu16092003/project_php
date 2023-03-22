<?php
include 'header.php';
if (!isset($_SESSION['admin_username'])) {
    header("location: index.php");
}
$sql = "SELECT * FROM tbl_product INNER JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id ORDER BY product_id DESC";
$query = mysqli_query($conn, $sql);
?>



<div class="content__right">
    <h1>Quản lý sản phẩm</h1>
    <div class="update">
        <a href="update_product.php">Thêm</a>
    </div>
    <div class="content__right--management">
        <table border="1">
            <thead>
                <tr>
                    <th>ID sản phẩm</th>
                    <th>Tên danh mục</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá mua sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá bán sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>chức năng</th>
                </tr>

            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)) {

                ?>
                <tr>
                    <td text-align="center"><?php echo $row['product_id']; ?></td>
                    <td text-align="center"><?php echo $row['category_name']; ?></td>
                    <td text-align="center"><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_buy_price']; ?></td>
                    <td><?php echo $row['product_quantity']; ?></td>
                    <td text-align="center"><?php echo $row['product_price']; ?></td>
                    <td width="20px"><img src="img/<?php echo $row['product_img']; ?>" style="width: 80px;" alt=""></td>
                    <td text-align="center"><a href="edit_product.php?product_id=<?php echo $row['product_id']; ?>">Sửa</a>|
                    <a onclick="return delete_product();" href="delete_product.php?product_id=<?php echo $row['product_id']; ?>">Xóa</a></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>

<script>
    const hello = document.querySelector(".hello")
    const helloDropdown = document.querySelector(".user__desc")
    hello.onclick = function() {
        helloDropdown.style.display = 'block';
    }

    function delete_product() {
        var conf = confirm('Bạn có chắc chắn muốn xóa không');
        return conf;
    }
</script>
</body>

</html>