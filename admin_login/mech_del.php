<?php
require_once('../config.php');
$mech_del_id=$_POST['del_mech_id'];
$mech_del="delete from mech_login where mech_id='$mech_del_id'";
if(mysqli_query($conn,$mech_del)){
    echo "Mechanic deleted";
}
else{
    echo "Mechanic ID is invalid";
}

?>
