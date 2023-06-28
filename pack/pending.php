<?php require_once('../config.php') ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pending.css">
    <link rel="stylesheet" href="package.css">
    <title>Pending Orders</title>
</head>
    <body>
    <nav class="navbar background">
        <ul class="nav-list">
            <div class="logo"><img src="../img/logo.png" alt="Logo"></div>
            <li><a href = "../home1.php">Home</a></li>
            <li><a href="package.php">Packages</a></li>
            <li><a href = "../cnt/ContactUs.php">ContactUs</a></li>
            <!-- <li>
               <a href="#">Request
               <i class="fas fa-caret-down"></i>
               </a>
               <ul style="display:none">
                  <li><a href="#">Pending</a></li>
                  <li><a href="#">Completed</a></li>
               </ul>
            </li> -->

            <li>
            <?php
if(!isset($_SESSION['username'])){
?>
<?php }
else{?>
<div class="dropdown">
  <button class="dropbtn"><p>Request</i></p></button>
  <div class="dropdown-content">
    <a href="pending.php">Pending</a>
    <a href="completed_history.php">Completed</a>
  </div>
</div>
<?php
}
?>
            </li>
            
            <!-- <li><a href="#login">Login/Register</a></li> -->
        </ul>
        <div class="rightNav">
            <!-- <input type="text" name="Search" id="Search" style="padding: 5px; -->
            <!-- font-size: 17px;
            border: 2px solid rgb(128, 128, 128);
            border-radius: 8px;"> -->
                
                <?php
            if(!isset($_SESSION['username'])){
            ?>
            <button class="ani"> <a style ="text-decoration: none; color: black;" href="../customer_login/register.php">Login/Register</a></button>
            <?php }
            else{?>
            <button class="btn btn-sm"><a style =" text-decoration: none; color: black;" href="../logout.php">Logout</a></button> <?php
                echo '<p class="wel"">Welcome '.$_SESSION['username'].'</p>';
            }
            ?>
        </div>
    </nav>


<?php

$username=$_SESSION['username'];
$pending="select o.* from order_details o where username='$username' and status=0";
echo "<div>";
echo "<table class='tab2'>";
echo '<tr class="abc2">';
    echo "<th class='abc2'>Order ID</th>";
    echo "<th class='abc2'>Package Ordered</th>";
    echo "<th class='abc2'>Manufacturer</th>";
    echo "<th class='abc2'>Model</th>";
    echo "<th class='abc2'>Pricing</th>";
echo "</tr>";
echo "</div>";
if($result=mysqli_query($conn,$pending)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<th class='abc1'>".$row['order_id']."</th>";
                //echo "<th>".$row['username']."</th>";
                $temp=$row['pack_code'];
                $pack_code="select * from packages where pack_code='$temp'";
                if($resu=mysqli_query($conn,$pack_code)){
                    if(mysqli_num_rows($resu)>0){
                        while($row3=mysqli_fetch_assoc($resu)){
                            echo "<th class='abc1'>".$row3['services']."</th>";
                        }
                    }
                }
                //echo "<th>".$row['pack_code']."</th>";
                $m=$row['manu_id'];
                $sql="select * from manufacturer where manu_id='$m'";
                if($res=mysqli_query($conn,$sql)){
                    if(mysqli_num_rows($res)>0){
                        while($row1=mysqli_fetch_assoc($res)){
                            echo "<th class='abc1'>".$row1['manufacturer']."</th>";
                        }
                    }
                }
                $n=$row['model_id'];
                $sql1="select * from model where id='$n'";
                if($res1=mysqli_query($conn,$sql1)){
                    if(mysqli_num_rows($res1)>0){
                        while($row2=mysqli_fetch_assoc($res1)){
                            echo "<th class='abc1'>".$row2['model_name']."</th>";
                        }
                    }
                }
                //echo "<th>".$row['model_id']."</th>";
                echo "<th class='abc1'>".$row['pricing']."</th>";
            echo "</tr>";
        }
        mysqli_free_result($result);
    }
}
echo "</table>";
?>
</body>
</html>
