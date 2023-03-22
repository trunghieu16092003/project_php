<?php 
    include 'header.php';
    if(!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category_name = $_POST['category_name'];
        if(isset($category_name)) {
            $sql = "INSERT INTO tbl_category(category_name) VALUES ('$category_name')";
            $query = mysqli_query($conn ,$sql);
            header("location: cat_management.php");
        }
    }

?>
            <div class="content__right">
                <form action="" method="post">
                    <h1 style="margin-left: 0;">Thêm danh mục</h1>
                    <div class="update_get_input">
                        <input type="text" name="category_name" id="" required>
                    </div>
                    <input type="submit" value="Thêm" name="update">
                </form>
            </div>

    <script>
        const hello = document.querySelector(".hello")
        const helloDropdown = document.querySelector(".user__desc")
        hello.onclick = function () {
            helloDropdown.style.display = 'block';
        }
    </script>
</body>

</html>