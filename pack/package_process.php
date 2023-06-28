<?php
require_once('config.php');
$order_id=rand(1000,9999);
$username=$_SESSION['username'];
$pack_code=$_POST['pack_name'];
$manu_id=$_POST['state'];//$_REQUEST['state'];
$model_id=$_POST['district'];//$_REQUEST['district'];
// echo $model_id;


$n=$pack_code;
$sql="select * from packages where pack_code='$n'";
if($res=mysqli_query($conn,$sql)){
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $m=$row['price'];
        }
    }
}
//echo $manu_id;
$order="insert into order_details values ('$order_id','$username','$pack_code','$manu_id','$model_id','0','0','$m')";
if(mysqli_query($conn,$order)){
    echo "Ordered Successfully <br>
    Mechanic will visit at your place within 24 hours.";
}
else{
    echo "Error";
}
?>