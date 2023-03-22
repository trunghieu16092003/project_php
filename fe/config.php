<?php 
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'project_php';

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    $conn->query("SET NAMES'utf-8'");
    if(!$conn) {
        die("Failed to connect to server".mysqli_connect_error());
        exit();
    }

?>