<?php
session_start();
session_unset();
session_destroy();
//echo "hi";
header("location:login.php");
?>