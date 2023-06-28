<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mechBuddy</title>
    <link rel="stylesheet" href="pack.css">
</head>
<body>
<div class="container">
<?php
    $sqlpack = "SELECT * FROM packages";
    echo '<div class="">';
    if($result = mysqli_query($conn, $sqlpack)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
    
    echo '<div class="grid-item">';
    echo '<div class="">';
    //<img class="card-img" src="basic.jpg" alt="Basic">
    echo '<img class="card-img" src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" >';

    echo '<div class="card-content">';
    echo '<h1 class="card-header">'.$row['services'].'</h1>';
    echo '<p class="card-text">';
    echo '<strong>Price: Rs '.$row['price'].'</strong>';
    echo '<br>';
    echo '<strong>Properties:</strong>';
    echo '<br>';
    echo nl2br($row['properties']);
    echo '</p>';
    echo '<div style="margin-bottom: 1px;"><button class="card-btn">
        Book Now <span>&rarr;</span>
    </button></div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
                }}}
                ?>

            </div>
</body>
</html>