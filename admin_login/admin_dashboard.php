<?php require_once('../config.php') ?>
<?php
if(!isset($_SESSION['un']))
{
  header("location:admin_login.php");
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="mech_show.css">
    <link rel="stylesheet" href="admin_dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">MechBuddy</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="javascript:void(0);" class="active" id="dashboard" onClick="reply_click(this.id)">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" id="packages" onClick="reply_click(this.id)">
            <i class='bx bx-box' ></i>
            <span class="links_name">Packages</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" id="order-list" onClick="reply_click(this.id)">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Pending Order list</span>
          </a>
        </li>
        <!-- <li>
          <a href="javascript:void(0);" id="analytics" onClick="reply_click(this.id)">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li> -->
        <li>
          <a href="javascript:void(0);" id="mechanic" onClick="reply_click(this.id)">
            <i class='bx bx-user' ></i>
            <span class="links_name">Mechanic</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" id="total-services" onClick="reply_click(this.id)">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total Services</span>
          </a>
        </li>
        <!-- <li>
          <a href="javascript:void(0);" id="messages" onClick="reply_click(this.id)">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li> -->
        <li class="log_out">  
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <!-- <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i> -->
      </div>
      <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        <span class="admin_name"><?php echo $_SESSION["un"]; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    
    
    
    <div class="home-content"> </div>

    <div id="home-content">
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


    </div>

    <script>
        $(document).ready(function(){
            $('#packages').click(function(){
                $('#home-content').load('admin_packages.php')
            });
        });
        $(document).ready(function(){
            $('#dashboard').click(function(){
                $('#home-content').load('admin_dashboard_repeat.php')
            });
        });
        $(document).ready(function(){
            $('#order-list').click(function(){
                $('#home-content').load('admin_order_list.php')
            });
        });
        $(document).ready(function(){
            $('#analytics').click(function(){
                $('#home-content').load('admin_analytics.php')
            });
        });
        $(document).ready(function(){
            $('#earnings').click(function(){
                $('#home-content').load('admin_earnings.php')
            });
        });
        $(document).ready(function(){
            $('#mechanic').click(function(){
                $('#home-content').load('admin_mechanic.php')
            });
        });
        $(document).ready(function(){
            $('#total-services').click(function(){
                $('#home-content').load('admin_total_services.php')
            });
        });
        $(document).ready(function(){
            $('#team').click(function(){
                $('#home-content').load('admin_team.php')
            });
        });
        $(document).ready(function(){
            $('#messages').click(function(){
                $('#home-content').load('admin_messages.php')
            });
        });

        function reply_click(clicked_id)
        {
            var element = document.getElementById(clicked_id);
            $("a").removeClass();
            element.classList.add("active");
        }
        
    </script>

    <!-- <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">40,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">38,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">$12,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11,086</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div> -->

      
  </section>

<script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
</script>

</body>
</html>
