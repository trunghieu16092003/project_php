<?php 
    session_start();
    if(isset($_SESSION["admin_username"])) {
        session_destroy();
        header('location: index.php');
    } else {
        header('location: index.php');
    }
    
?>