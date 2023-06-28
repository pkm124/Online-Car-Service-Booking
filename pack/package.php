<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages!</title>
    <link rel="stylesheet" href="package.css">
    <script>

function getdistrict(val) {
	$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'state_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background: #e7e7e7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .course{
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, .2);
            display: flex;
            max-width: 100%;
            overflow: hidden;
            width: 50rem;
            position: absolute;
            to0p: 30%;
            lef0t: 50%;
            margin-top: 5rem;
            margin-left: 5rem;
            tr0ansform: translate(-50%,-50%);
        }

        .course h6{
            opacity: .6;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-left: 20rem;
        }

        .course h2{
            letter-spacing: 1px;
            margin: 10px 0;
            margin-top: 0px;
        }

        .preview{
            background: #e40046;
            color: #fff;
            padding: 30px;
            width: 20rem;
            position: relative;
        }

        .preview a{
            color: #fff;
            font-size: 12px;
            opacity: .6;
            margin-top: 30px;
            text-decoration: none;
        }

        .info{
            padding: 30px;
            position: relative;
            width: 100%;
        }

        .progress-wraper{
            position: absolute;
            top: 30px;
            right: 30px;
            text-align: right;
            width: 150px;
        }

        .progress{
            background: #ddd;
            border-radius: 3px;
            height: 5px;
            width: 100%;
        }

        .progress::after{
            content: '';
            border-radius: 3px;
            background: #e40046;
            position: absolute;
            top: 0;
            left: 0;
            height: 5px;
            width: 36%;
        }

        .progress-text{
            font-size: 10px;
            opacity: .6;
            letter-spacing: 1px;
        }

        .info p{
            font-size: 16px;
            font-weigh1t: bold;
        }

        .btn{
            background: #e40046;
            border: 1px solid transparent;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, .2);
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            position: absolute;
            bottom: 30px;
            right: 30px;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all .4s ease-in-out;
            font-weight: bold;
            border-radius: 20px;

        }

        .btn:hover{
            background: #fff;
            color: #e40046;
            border: 1px solid #e40046;
            transform: scale(1.05);
        }

        @media(max-width: 768px){
            .course{
                flex-direction: column;
                width: 90%;
            }
            .preview{
                width: 100%;
            }
            .preview h2{
                margin: 10px 0 0;
            }
            .preview a{
                margin-top: 10px;
            }
            .info h2{
                margin-top: 20px;
            }
            .info p{
                margin-bottom: 50px;
            }
            .btn{
                padding: 10px 15px;
                font-size: 14px;
            }
        }
        .gap{
            height: 20rem;
        }
        .pack_logo{
            width: 100%;
            height: 100px;
            border-radius: 15%;
        }
        .pack_prop{
            letter-spacing: 1px;
            line-height: 1.6;
            color: #202020;
        }
    </style>
</head>
<body>
<nav class="navbar background">
        <ul class="nav-list">
            <div class="logo"><img src="../img/logo.png" alt="Logo"></div>
            <li><a href = "../home1.php">Home</a></li>
            <li><a href="package.php">Packages</a></li>
            <li><a href = "../cnt/ContactUs.php">ContactUs</a></li>
            <!-- <li><a href="#login">Login/Register</a></li> -->
        </ul>
        <li style="list-style:none;">
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
                echo '<p class="wel" ">Welcome '.$_SESSION['username'].'</p>';
            }
            ?>
        </div>
        
    </nav>
<?php $pack_show="select * from packages"; ?>

<?php 
$flag=0;
if($result=mysqli_query($conn,$pack_show)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            
            echo '<div class="container">';
            echo '<form method=post action="package_process.php" id="f1">';
            echo '<div class="course">';
            
                echo '<div class="preview">';
                $v=rand(1,10);
                //echo $x;
                $x="../pack_img/".$v.".jpeg";
                ?>
                <img src="<?php echo $x ?>" alt="image" class="pack_logo">
                <?php
                    
                    
                    echo '<h2>'.$row['services'].'</h2>';
                echo '</div>';
                echo '<div class="info">';
                    echo "<h2>Properties:</h2>";
                    echo '<p class="pack_prop">';
                    echo nl2br($row['properties']);
                    echo '</p>';
                    echo '<h6>Price: Rs 3599</h6>';
                    // echo $row['pack_code'];
                    echo '<input type="hidden" value='.$row['pack_code']. ' name="pack_code">';
                    // echo '<button class="btn" href="">Buy Now!</button>';
                     
                echo '</div>';
                
            echo '</div>';
           echo '</form>';
        echo '</div>';
        echo '<div class="gap"></div>';

            

        }
        mysqli_free_result($result);
    }
}
?>
<div class="model">
<form name="insert" action="package_process.php" method="post" class="login-email" id="f2">
  <table width="100%" height="117"  border="0">
  <tr>
  <p class="Header"style="font-size: 40px; font-weight: 600;">Select    </p>
    <td width="73%"><select onChange="getdistrict(this.value);"  name="state" id="state" class="xyz" >
                    <option value="">Select Manufacturer</option>
                   		<?php $query =mysqli_query($conn,"SELECT * FROM manufacturer");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['manu_id'];?>"><?php echo $row['manufacturer'];?></option>
<?php
}
?>
                    </select></td>
  </tr>
  <tr>
    <td>
<select name="district" id="district-list" class="xyz">
<option value="">Select</option>
</select></td>
  </tr>


<select name="pack_name" id="pack_name" class="xyz">

<option value="">Select Package</option>
<?php $query1 =mysqli_query($conn,"SELECT * FROM packages");
while($row1=mysqli_fetch_array($query1))
{ ?>
<option value="<?php echo $row1['pack_code']; ?>" ><?php echo $row1['services'];?></option>
<?php
}
?>
</select></td>
<tr>
<?php
if(!isset($_SESSION['username'])){
?>
<?php }
else{?>
<td><input type="submit" class="buy" value="Book Now"></td>
<?php
}
?>

</tr>
</table>
</form>

</div>

</body>
</html>
<script>
// document.getElementById("f1").onclick = function() {
//     document.getElementById("f1").submit();
//     document.getElementById("f2").submit();
// }
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>