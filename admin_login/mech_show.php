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
$mech_show="select * from mech_login";
echo "<table class='tab'>";
echo "<tr class='abc'>";
    echo "<th class='xyz'>First Name</th>";
    echo "<th class='xyz'>Last Name</th>";
    echo "<th class='xyz'>Email</th>";
    echo "<th class='xyz'>Mobile No.</th>";
    echo "<th class='xyz'>Mechanic ID</th>";
echo "</tr>";
if($result=mysqli_query($conn,$mech_show)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            echo "<tr class='abc'>";
                echo "<th class='row'>".$row['fname']."</th>";
                echo "<th class='row'>".$row['lname']."</th>";
                echo "<th class='row'>".$row['email']."</th>";
                echo "<th class='row'>".$row['mobile_no']."</th>";
                echo "<th class='row'>".$row['mech_id']."</th>";
            echo "</tr>";
        }
        mysqli_free_result($result);
    }
}
echo "</table>";
?>
</body>
</html>