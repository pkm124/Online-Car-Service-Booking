<?php require_once('../config.php'); ?>
<?php
if(!isset($_SESSION['uname']))
{
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard_mech.css">
    <!-- <link rel="stylesheet" href="pending.css"> -->
    <title>Mech Dashboard</title>
</head>
<body>
    

<nav class="navbar background">
    <ul class="nav-list">
        <div class="logo"><img src="../img/logo.png" alt="Logo"></div>
        <p class="welcome">WELCOME!</p>
        <?php echo $_SESSION['uname']; ?>
        <!-- <li><a href="#login">Login/Register</a></li> -->
    </ul>
    <div class="rightNav">
        <!-- <input type="text" name="Search" id="Search" style="padding: 5px; -->
        <!-- font-size: 17px;
        border: 2px solid rgb(128, 128, 128);
        border-radius: 8px;"> -->
        <!-- <div class="person"><img src="../person.png" alt="Logo"></div> -->
        <button class="btn123"><a style =" text-decoration: none; color: black;" href="logout.php">Logout</a></button>
    </div>

</nav>

<div>
    
<?php

$mech_id=1234567;
$pending="select o.* from order_details o where status=0";
echo "<div>";
echo "<table class='tab2'>";
echo "<tr class='abc'>";
    echo "<th class='xyz'>Order ID</th>";
    echo "<th class='xyz'>Username</th>";
    echo "<th class='xyz'>Package</th>";
    echo "<th class='xyz'>Manufacturer</th>";
    echo "<th class='xyz'>Model</th>";
    echo "<th class='xyz'>Address</th>";
    echo "<th class='xyz'>Pricing</th>";
echo "</tr>";
echo "</div>";
if($result=mysqli_query($conn,$pending)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<th class='abc'>".$row['order_id']."</th>";
                echo "<th class='abc'>".$row['username']."</th>";
                $xyz=$row['username'];
                $temp=$row['pack_code'];
                $pack_code="select * from packages where pack_code='$temp'";
                if($resu=mysqli_query($conn,$pack_code)){
                    if(mysqli_num_rows($resu)>0){
                        while($row3=mysqli_fetch_assoc($resu)){
                            echo "<th class='abc'>".$row3['services']."</th>";
                        }
                    }
                }
                $m=$row['manu_id'];
                $sql="select * from manufacturer where manu_id='$m'";
                if($res=mysqli_query($conn,$sql)){
                    if(mysqli_num_rows($res)>0){
                        while($row1=mysqli_fetch_assoc($res)){
                            echo "<th class='abc'>".$row1['manufacturer']."</th>";
                        }
                    }
                }
                $n=$row['model_id'];
                $sql1="select * from model where id='$n'";
                if($res1=mysqli_query($conn,$sql1)){
                    if(mysqli_num_rows($res1)>0){
                        while($row2=mysqli_fetch_assoc($res1)){
                            echo "<th class='abc'>".$row2['model_name']."</th>";
                        }
                    }
                }
                $sq="select * from customer_login where username='$xyz'";
                if($re=mysqli_query($conn,$sq)){
                    if(mysqli_num_rows($re)>0){
                        while($ro=mysqli_fetch_assoc($re)){
                            echo "<th class='abc'>".nl2br($ro['address'])."</th>";
                        }
                    }
                }
                // echo "<th>".$row['model_id']."</th>";
                echo "<th class='abc'>".$row['pricing']."</th>";
                echo "<th class='btn123'><a style ='text-decoration: none;' href='confirm_order.php?rn=$row[order_id]&a=$mech_id' >Confirm Order</a></th>";

            echo "</tr>";
            
        }
        mysqli_free_result($result);
    }
}
echo "</table>";
?>
</div>

</body>
</html>