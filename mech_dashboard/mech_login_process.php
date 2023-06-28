<?php
require_once("../config.php");
$login = $_POST['username'];
$password = $_POST['password'];
$query = "select * from mech_login where ( mech_id='$login' OR email = '$login')";
$res = mysqli_query($conn,$query);
echo md5($password);
$numRows = mysqli_num_rows($res);
echo "<br>";

if($numRows  == 1){
        $row = mysqli_fetch_assoc($res);
        //echo $row['password'];   password_verify(md5($password),$row['password'])
        if(md5($password)==$row['password']){
           //$_SESSION["login_sess"]="1"; 
             //$_SESSION["login_email"]= $row['email'];
            $_SESSION['uname']=$login;
            header("location:dashboard_mech.php");
        }
        else{ 
     //header("location:login.php?loginerror=".$login);
     //alert('invalid username or password');
     echo "hi";
        }
    }
    else{
        alert('invalid username or password');
        echo "hello";   
    }


?>