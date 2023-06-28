<?php
    require_once('../config.php');
    $delete_code=$_POST['del_pack_id'];
    $delete="Delete from packages where (pack_code='$delete_code')";
    if(mysqli_query($conn,$delete)){
        echo "Record Deleted Successfully";
    }            
    else{
        echo "Record not deleted";
    }
?>
