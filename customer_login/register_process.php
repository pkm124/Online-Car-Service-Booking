<?php
require_once('../config.php');
// if(!isset($_POST['register']))
// {
    $fname=$_POST['fname'];
    //echo $fname;
    $mno=$_POST['mno'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $address=$_POST['address'];
    //echo $mno;
    //echo $password;
    $insert="insert into customer_login values ('$fname','$mno','$username','$email','$password','$address')";
    if(mysqli_query($conn,$insert))
    {
        echo "Customer Registered Successfully";
    }
    else{
        echo "error";
    }
//}
?>