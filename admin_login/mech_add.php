<?php
require_once('../config.php');
//echo "outside";
//if(isset($_POST['add-mech'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile_no=$_POST['phone_no'];
    $mech_id=$_POST['mech_id'];
    $password=md5($_POST['psw']);
    $check="select * from mech_login where (email='$email' || mech_id='$mech_id')";
    $res=mysqli_query($conn,$check);
    $flag=0;
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        if($email==$row['email']){
            echo "Email Already Exist";
            $flag=1;
        }
        if($mech_id==$row['mech_id']){
            echo "Mech Id already exist";
            $flag=1;
        }
    }
    $mobile_no=$_POST['phone_no'];
    if($flag==0){
        $insert=mysqli_query($conn,"insert into mech_login values ('$fname','$lname','$email','$mobile_no','$mech_id','$password')");
        if($insert){
            echo "Mechanic Registered Successfully";
        }
        else{
            echo "Error";
        }
    }
//}

?>