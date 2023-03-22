<?php
include "header.php";
if (!isset($_SESSION['admin_username'])) {
    header("location: index.php");
}
$sql = "SELECT * FROM tbl_category ORDER BY category_id DESC";
$query = mysqli_query($conn, $sql);
?>

<div class="content__right">
    <h1>Quản lý danh mục</h1>
    <div class="update">
        <a href="update_cat.php">Thêm</a>
    </div>
    <div class="content__right--management">
        <table border="1">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>chức năng</th>

                </tr>

            </thead>
            <tbody>
                <?php
                $temp = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $temp++;
                ?>
                    <tr>
                        <td text-align="center"><?php echo $temp; ?></td>
                        <td text-align="center"><?php echo $row['category_id']; ?></td>
                        <td text-align="center"><?php echo $row['category_name']; ?></td>
                        <td text-align="center">
                            <a href="edit_cat.php?category_id=<?php echo $row['category_id']; ?>">Sửa</a>|
                            <a onclick="return delete_cat();" href="delete_cat.php?category_id=<?php echo $row['category_id']; ?>">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
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

    //hiện hộp thoại hiển thị muốn xóa chưa
    function delete_cat() {
        var conf = confirm('Bạn có chắc chắn muốn xóa không');
        return conf;
    }
</script>
</body>

</html>