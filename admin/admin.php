<?php 
    include 'header.php';
    
    if(!isset($_SESSION['admin_username'])) {
        header("location: index.php");
    } 

?>

            <div class="content__right">
                <h1>Chào mừng bạn đến với trang quản trị</h1>
            </div>
        </div>
    </div>

    <script>
        const hello = document.querySelector(".hello")
        console.log(hello)
        const helloDropdown = document.querySelector(".user__desc")
        hello.onclick = function () {
            helloDropdown.style.display = 'block';
        }
    </script>
</body>

</html>
