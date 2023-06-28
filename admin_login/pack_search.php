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
    //if(isset($_POST['search-pack']))
    //{
        $search_key=$_POST['search_pack_id'];
        $sql="select * from packages where pack_code='$search_key'";
        echo "<table class='tab'>";
        
        if($result=mysqli_query($conn,$sql))
        {
            if(mysqli_num_rows($result)>0)
            {
                echo "<tr class='abc'>";
                    echo "<th class='xyz1'>Package Code</th>";
                    echo "<th class='xyz1'>Package Service</th>";
                    echo "<th class='xyz1'>Package Properties</th>";
                    echo "<th class='xyz1'>Package Price</th>";
                echo "</tr>";
                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr class='abc1'>";
                        echo "<td class='xyz1'>".$row['pack_code']."</td>";
                        echo "<td class='xyz1'>".$row['services']."</td>";
                        echo "<td class='xyz1'>".nl2br($row['properties'])."</td>";
                        echo "<td class='xyz1'>".$row['price']."</td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
            }
            else{
                echo "Package does not exist !!!";
            }
        }
        echo "</table>";
    //}
?>
</body>
</html>