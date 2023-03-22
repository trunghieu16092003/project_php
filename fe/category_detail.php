<?php 
    $sql = "SELECT * FROM tbl_category";
    $query =  mysqli_query($conn, $sql);
?>

<div id="content">
    <div class="category__list">
        <h3>Danh sách danh mục</h3>
        <ul class="category__list--item">
            <?php 
                while ($row = mysqli_fetch_array($query)) {
            ?>
            <li><a href="category.php?category_id=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
            
            <?php }  ?>
        </ul>
    </div>