<?php
require_once('../config.php');
$confirm=$_GET['rn'];
$mech_id=$_GET['a'];
//echo $mech_id;
$qconfirm="update order_details set status=1,mech_id='$mech_id' where order_id='$confirm'";
if(mysqli_query($conn,$qconfirm)){
    echo"Updated";
}
else{
    echo "Not Updated";
}
?>