<?php
require_once('../config.php');
 
$code=$_POST['add_pack_id'];
$service=$_POST['add_pack_service'];
$prop=$_POST['add_pack_prop'];
$price=$_POST['add_pack_price'];
$check="select * from packages where (pack_code='$code')";
$res=mysqli_query($conn,$check);
$flag=0;
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    if($code==$row['pack_code']){
        echo "Package with code ".$code." Already Exist";
        $flag=1;
    }
}
if($flag==0)
{
    $add_packages="INSERT INTO packages (pack_code,properties,services,price) VALUES ('$code','$prop','$service','$price')";
    if(mysqli_query($conn,$add_packages))
    {
        echo "Package Added";
    }
    else
    {
        echo "Error: " . $add_packages . "<br>" . mysqli_error($conn);
    }
}

?>