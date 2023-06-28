<?php require_once("config.php"); ?>
<html>
    <head>
        <title>Packages</title>
        <link rel="stylesheet" href="packages.css">
    </head>
    <body>
        <header></header>
        <section>
                <?php
                $sqlimage = "SELECT p.*,pr.* FROM packages p, pack_prop pr WHERE (p.pack_code=pr.pack_code)";
                //$imageresult1 = mysqli_query($conn,$sqlimage); 
                if($result = mysqli_query($conn, $sqlimage)){
                    if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class = "body">
                                <?php   
                            echo '<div class="package-card">';
                            echo '<h1 class = "heading">'.$row['services']." Package".'</h1>';
                            echo '<img class = "pic" src="data:image;base64,'.base64_encode($row['image']).'" alt="Image">';
                            echo '<p class = "price">'."Price: Rs ".$row['price'].'</p>';
                            echo '<p class = "properties">'."Properties: ".'</p>';
                            $firstrow="SELECT * from pack_prop";
                            if($res = mysqli_query($conn, $firstrow))
                                if(mysqli_num_rows($res) > 0)
                                    $row1 = mysqli_fetch_array($res);
                            //echo $row1['01'];
                            //copying first 10 data
                            for($i=1;$i<10;$i++)
                            {    
                                $col="0".$i;
                                $first[$i]=$row1[$col];
                            }
                            //copying next 10 data
                            for($i=10;$i<20;$i++)
                            {    
                                $first1[$i]=$row1[$i];
                            }
                            //printing first 10 data
                            ?>
                    <div class = "content">
                        
                    

<?php
                            for($i=1;$i<10;$i++)
                            {
                                $col="0".$i;
                                if($row[$col]==1)
                                {
                                    echo $first[$i];
                                    echo "<br>";
                                }
                            }
                            //printing next 10 data
                            for($i=10;$i<20;$i++)
                            {
                                if($row[$i]==1)
                                {

                                    echo $first1[$i];
                                    echo "<br>";
                                }
                            }
?>

    </div>
<?php
                            echo "</div>";
                        }
                        mysqli_free_result($result);
                    } else{
                        echo "No records matching your query were found.";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sqlimage. " . mysqli_error($link);
                }
                 
                // Close connection
                mysqli_close($conn); 
                ?>

    </div>
<?php               
                ?>
            
        </section>
    </body>
</html>