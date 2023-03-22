<?php 
    session_start();
    if(isset($_SESSION["user_name"]) && isset($_SESSION['user_id']) ) {
        unset($_SESSION["user_name"]);
        unset($_SESSION["cart"]);
        unset($_SESSION["user_id"]);
        header('location: about-us.php');
    } else {
        header('location: about-us.php');
    }
?>