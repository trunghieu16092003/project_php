<?php
include 'header.php';
if (!isset($_SESSION['admin_username'])) {
    header("location: index.php");
}
$category_name = "";
$category_id = $_GET['category_id'];
$sql = "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    if(isset($category_name)) {
        $sql = "UPDATE tbl_category SET category_name = '$category_name' WHERE category_id = '$category_id'";
        $query = mysqli_query($conn, $sql);
        header("location: cat_management.php");
    }
}
?>

<div class="content__right">
    <h1>Sửa danh mục</h1>
    <form action="" method="post">
        <label for="update_get">Sửa danh mục</label>
        <div class="update_get_input">
            <input type="text" name="category_name" id="update_get" placeholder="Nhập lại danh mục" required value="<?php echo $row['category_name']; ?>">
        </div>
        <input type="submit" name="update" value="Sửa danh mục">
    </form>

</div>
</div>
</div>

<script>
    const hello = document.querySelector(".hello")
    const helloDropdown = document.querySelector(".user__desc")
    hello.onclick = function() {
        helloDropdown.style.display = 'block';
    }
</script>
</body>

</html>