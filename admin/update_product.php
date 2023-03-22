<?php
include 'header.php';
if (!isset($_SESSION['admin_username'])) {
    header("location: index.php");
}
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_insur = $_POST['product_insur'];
    $product_special = $_POST['product_special'];
    $product_buy_price = $_POST['product_buy_price'];
    $product_quantity = $_POST['product_quantity'];


    if ($_FILES['product_img']['name'] == '') {
        $error = "<span style='color: red;'>đây là trường bắt buộc</span>";
    } else {
        $product_img = $_FILES['product_img']['name'];
        $tmp_name = $_FILES['product_img']['tmp_name'];
    }

    if ($_POST['category_id'] == 'unselect') {
        $error = "<span style='color: red;'>đây là trường bắt buộc</span>";
    } else {
        $category_id = $_POST['category_id'];
    }

    if (isset($product_name) && isset($product_price) && isset($product_desc) && isset($category_id) && isset($product_img) && isset($product_insur) && isset($product_special)) {
        move_uploaded_file($tmp_name, 'img/' . $product_img);
        $sql = "INSERT INTO tbl_product(category_id, product_name, product_price, product_img, product_desc, product_insur, product_special, product_buy_price, product_quantity) 
        VALUES ('$category_id', '$product_name', '$product_price', '$product_img', '$product_desc', '$product_insur', '$product_special', '$product_buy_price', '$product_quantity')";
        $query = mysqli_query($conn, $sql);
        header('location: product_management.php');
    }
}


?>

<div class="content__right">
    <h1>Thêm loại sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <select name="category_id" id="category_id">
            <option value="">---Chọn danh mục---</option>
            <?php
            $show_category_id = "SELECT * FROM tbl_category ORDER BY category_id DESC";
            $query_show_category_id = mysqli_query($conn, $show_category_id);
            while ($row = mysqli_fetch_array($query_show_category_id)) {
            ?>
                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name']; ?></option>
            <?php
            }
            ?>
        </select>


        <div class="update_get_input">
            <input type="text" name="product_name" id="update_get" placeholder="Thêm sản phẩm" required>
        </div>
        
        <div class="update_get_input">
            <input type="text" name="product_buy_price" id="update_get" placeholder="Giá mua sản phẩm" required>
        </div>

        <div class="update_get_input">
            <input type="text" name="product_quantity" id="update_get" placeholder="Số lượng" required>
        </div>

        <div class="update_get_input">
            <input type="text" name="product_price" id="update_get" placeholder="Giá bán sản phẩm" required>
        </div>

        <div class="update_get_input">
            <input type="text" name="product_insur" id="update_get" placeholder="Thời gian bảo hành" required>
        </div>

        <div class="update_special">
            <input type="radio" name="product_special" id="product_special" value="1">
            <label for="product_special">Có</label>
        </div>
        <div class="update_special">
            <input type="radio" name="product_special" id="product_special" value="0">
            <label for="product_special">Không</label>
        </div>

        <label for="product_img">Chọn file ảnh</label>
        <input type="file" id="product_img" name="product_img">
        <label for="product_desc">Nhập mô tả</label>
        <textarea class="ckeditor" name="product_desc" id="product_desc" cols="30" rows="10"></textarea>
        <br>
        <br>
        <input type="submit" value="Thêm mới" name="submit">
    </form>
</div>
</div>
</div>
<script src="ckeditor/ckeditor.js"></script>
<script>
    const hello = document.querySelector(".hello")
    const helloDropdown = document.querySelector(".user__desc")
    hello.onclick = function() {
        helloDropdown.style.display = 'block';
    }
</script>
</body>

</html>