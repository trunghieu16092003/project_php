<?php
include 'header.php';
if (!isset($_SESSION['admin_username'])) {
    header("location: index.php");
}

$product_id = $_GET['product_id'];

$sql_cat = "SELECT * FROM tbl_category";
$query_cat = mysqli_query($conn, $sql_cat);

$sql = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $category_id = $_POST['category_id'];
    $product_insur = $_POST['product_insur'];
    $product_special = $_POST['product_special'];
    $product_buy_price = $_POST['product_buy_price'];
    $product_quantity = $_POST['product_quantity'];

    if ($_FILES['product_img']['name'] == '') {
        $product_img = $_POST['product_img'];
    } else {
        $product_img = $_FILES['product_img']['name'];
        $tmp_name = $_FILES['product_img']['tmp_name'];
    }

    if (isset($product_name) && isset($product_price) && isset($product_desc) && isset($category_id) && isset($product_insur) && isset($product_special) && isset($product_buy_price) && isset($product_quantity)) {
        move_uploaded_file($tmp_name, 'img/'. $product_img);
        $sql_update = "UPDATE tbl_product SET product_name = '$product_name', category_id = '$category_id', product_price = '$product_price', product_desc = '$product_desc', product_img = '$product_img', product_insur = '$product_insur', 
        product_special = '$product_special', product_buy_price = '$product_buy_price', product_quantity = '$product_quantity' WHERE product_id = '$product_id'";

        $query_update = mysqli_query($conn, $sql_update);
        header('location: product_management.php');
    }
}



?>

<div class="content__right">
    <h1>Sửa sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <select name="category_id">
            <option value="">---Chọn danh mục---</option>
            <?php
            while ($row_cat = mysqli_fetch_array($query_cat)) {

            ?>
                <option <?php if ($row['category_id'] == $row_cat['category_id']) {
                            echo 'selected';
                        } ?> value="<?php echo $row_cat['category_id'] ?>"><?php echo $row_cat['category_name'] ?></option>
            <?php
            }
            ?>

        </select>

        <div class="update_get_input">
            <input type="text" name="product_name" id="update_get" placeholder="Sửa sản phẩm" required value="<?php
                                                                                                                if (isset($_POST['product_name'])) {
                                                                                                                    echo $_POST['product_name'];
                                                                                                                } else {
                                                                                                                    echo $row['product_name'];
                                                                                                                }
                                                                                                                ?>">
        </div>

        <div class="update_get_input">
            <input type="text" name="product_buy_price" id="update_get" placeholder="Giá mua sản phẩm" required value="
                            <?php
                            if (isset($_POST['product_buy_price'])) {
                                echo $_POST['product_buy_price'];
                            } else {
                                echo $row['product_buy_price'];
                            }
                            ?>">
        </div>

        <div class="update_get_input">
            <input type="text" name="product_quantity" id="update_get" placeholder="Số lượng" required value="
                            <?php
                            if (isset($_POST['product_quantity'])) {
                                echo $_POST['product_quantity'];
                            } else {
                                echo $row['product_quantity'];
                            }
                            ?>">
        </div>

        <div class="update_get_input">
            <input type="text" name="product_price" id="update_get" placeholder="Giá bán sản phẩm" required value="
                            <?php
                            if (isset($_POST['product_price'])) {
                                echo $_POST['product_price'];
                            } else {
                                echo $row['product_price'];
                            }
                            ?>">
        </div>

        <div class="update_get_input">
            <input type="text" name="product_insur" id="update_get" placeholder="Thời gian bảo hành" required value="<?php
                            if (isset($_POST['product_insur'])) {
                                echo $_POST['product_insur'];
                            } else {
                                echo $row['product_insur'];
                            }
                            ?>">
        </div>
        <p>Sản phẩm đặc biệt</p>
        <div class="update_special">
            <input type="radio" name="product_special" id="product_special" value="1">
            <label for="product_special">Có</label>
        </div>
        <div class="update_special">
            <input type="radio" name="product_special" id="product_special" value="0">
            <label for="product_special">Không</label>
        </div>
        <label for="product_img">Chọn file ảnh</label>
        <input type="file" name="product_img" id="product_img">
        <input type="hidden" name="product_img" value="<?php echo $row['product_img']; ?>">
        <label for="product_desc">Nhập mô tả</label>
        <textarea class="ckeditor" name="product_desc" id="product_desc" cols="30" rows="10">
                            <?php
                            if (isset($_POST['product_desc'])) {
                                echo $_POST['product_desc'];
                            } else {
                                echo $row['product_desc'];
                            }
                            ?>

                            
                    </textarea>

        <br>
        <br>
        <input type="submit" value="Sửa" name="submit">
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