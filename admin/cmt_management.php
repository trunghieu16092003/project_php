<?php
include 'header.php';
if (!isset($_SESSION['admin_username'])) {
    header("location: index.php");
}

$sql = "SELECT * FROM tbl_comment ORDER BY cmt_id DESC";
$query = mysqli_query($conn, $sql);

?>
<div class="content__right">
    <h1>Quản lý bình luận</h1>
    <div class="content__right--management">
        <table border="1">
            <thead>
                <tr>
                    <th>ID bình luận</th>
                    <th>tên người dùng</th>
                    <th>Tên sản phẩm bình luận</th>
                    <th>Nội dung</th>
                    <th>ngày bình luận</th>
                    <th>chức năng</th>
                </tr>

            </thead>
            <tbody>
            <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td text-align="center"><?php echo $row['cmt_id'] ?></td>
                    <td text-align="center"><?php echo $row['user_name'] ?></td>
                    <td text-align="center"><?php echo $row['product_name'] ?></td>
                    <td text-align="center"><?php echo $row['cmt_content'] ?></td>
                    <td text-align="center"><?php echo $row['cmt_date'] ?></td>
                    <td text-align="center"><a href="delete_cmt.php?cmt_id=<?= $row['cmt_id'] ?>">Xóa</a></td>
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
</script>

</body>

</html>