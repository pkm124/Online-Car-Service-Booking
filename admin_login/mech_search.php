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
$search_mech_id=$_POST['search_mech_id'];
$mech_search="select * from mech_login where mech_id='$search_mech_id'";
echo "<table class='tab'>";
echo "<tr class='abc'>";
    echo "<th class='xyz'>First Name</th>";
    echo "<th class='xyz'>Last Name</th>";
    echo "<th class='xyz'>Email</th>";
    echo "<th class='xyz'>Mobile No.</th>";
    echo "<th class='xyz'>Mechanic ID</th>";
echo "</tr>";
if($result=mysqli_query($conn,$mech_search)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<th class='abc1'>".$row['fname']."</th>";
                echo "<th class='abc1'>".$row['lname']."</th>";
                echo "<th class='abc1'>".$row['email']."</th>";
                echo "<th class='abc1'>".$row['mobile_no']."</th>";
                echo "<th class='abc1'>".$row['mech_id']."</th>";
            echo "</tr>";
        }
        mysqli_free_result($result);
    }
}
echo "</table>";
?>
</body>
</html>