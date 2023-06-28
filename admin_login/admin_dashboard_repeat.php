<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mech_show.css">
    <title>Pending Orders</title>
</head>
    <body>
        <?php
require_once('../config.php');
//$username=$_SESSION['username'];
$pending="select o.* from order_details o where status=1";
echo "<table class='tab'>";
echo "<tr class='abc'>";
    echo "<th class='xyz'>Order ID</th>";
    echo "<th class='xyz'>Package Ordered</th>";
    echo "<th class='xyz'>Username</th>";
    echo "<th class='xyz'>Manufacturer</th>";
    echo "<th class='xyz'>Model</th>";
    echo "<th class='xyz'>Pricing</th>";
echo "</tr>";
if($result=mysqli_query($conn,$pending)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr class='abc'>";
                echo "<th class='row'>".$row['order_id']."</th>";
                //echo "<th>".$row['username']."</th>";
                $temp=$row['pack_code'];
                $pack_code="select * from packages where pack_code='$temp'";
                if($resu=mysqli_query($conn,$pack_code)){
                    if(mysqli_num_rows($resu)>0){
                        while($row3=mysqli_fetch_assoc($resu)){
                            echo "<th class='row'>".$row3['services']."</th>";
                        }
                    }
                }
                echo "<th class='row'>".$row['username']."</th>";
                //echo "<th>".$row['pack_code']."</th>";
                $m=$row['manu_id'];
                $sql="select * from manufacturer where manu_id='$m'";
                if($res=mysqli_query($conn,$sql)){
                    if(mysqli_num_rows($res)>0){
                        while($row1=mysqli_fetch_assoc($res)){
                            echo "<th class='row'>".$row1['manufacturer']."</th>";
                        }
                    }
                }
                $n=$row['model_id'];
                $sql1="select * from model where id='$n'";
                if($res1=mysqli_query($conn,$sql1)){
                    if(mysqli_num_rows($res1)>0){
                        while($row2=mysqli_fetch_assoc($res1)){
                            echo "<th class='row'>".$row2['model_name']."</th>";
                        }
                    }
                }
                //echo "<th>".$row['model_id']."</th>";
                echo "<th class='row'>".$row['pricing']."</th>";
            echo "</tr>";
        }
        mysqli_free_result($result);
    }
}
echo "</table>";
?>
</body>
</html>
