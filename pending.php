<?php
require_once('config.php');
$uname=$_SESSION['username'];
$pending="select o.* from order_details o where o.username='$uname' and status=0";
echo "<table>";
echo "<tr>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Email</th>";
    echo "<th>Mobile No.</th>";
    echo "<th>Mechanic ID</th>";
echo "</tr>";
if($result=mysqli_query($conn,$pending)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<th>".$row['order_id']."</th>";
                echo "<th>".$row['username']."</th>";
                echo "<th>".$row['pack_code']."</th>";
                echo "<th>".$row['manu_id']."</th>";
                echo "<th>".$row['model_id']."</th>";
            echo "</tr>";
        }
        mysqli_free_result($result);
    }
}
echo "</table>";

?>