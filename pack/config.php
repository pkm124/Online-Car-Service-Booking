<?php
    session_start();
    $dbHost = 'localhost';
    $dbName = 'carbuddy';
    $dbUsername = 'root';
    $dbPassword = '';
    $conn= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
?>