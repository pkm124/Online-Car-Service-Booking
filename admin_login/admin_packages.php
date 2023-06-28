<?php 
require_once('../config.php');
?>
<html>
<head>
<link rel="stylesheet" href="admin_mechanic.css">
<link rel="stylesheet" href="mech_show.css">


    <!-- <style>
        .package {
            padding-left: 14rem;
            padding-top: 3rem;
        }
        button {
            padding: 8px;
            margin-left: 1rem;
        }

        td {
            /*height: 10px;
            Overflow-y:scroll;*/
        }
    </style> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</head>
<script>
//show button
$(document).ready(function(){
    $('#pack_show_btn').click(function(){
        document.getElementById("show-content").style.display="block";
        document.getElementById("add-content").style.display="none";
        document.getElementById("search-package").style.display="none";
        document.getElementById("delete-package").style.display="none";
        document.getElementById("pack_search_success").innerHTML="";
        document.getElementById("pack_del_success").innerHTML="";
        document.getElementById("pack_add_success").innerHTML="";
    });
});

//add button
$(document).ready(function(){
    $('#pack_add_btn').click(function(){
        document.getElementById("add-content").style.display="block";
        document.getElementById("show-content").style.display="none";
        document.getElementById("search-package").style.display="none";
        document.getElementById("delete-package").style.display="none";
        document.getElementById("pack_search_success").innerHTML="";
        document.getElementById("pack_del_success").innerHTML="";
        document.getElementById("pack_add_success").innerHTML="";
    });
});

//search button
$(document).ready(function(){
    $('#pack_search_btn').click(function(){
        document.getElementById("search-package").style.display="block";
        document.getElementById("show-content").style.display="none";
        document.getElementById("add-content").style.display="none";
        document.getElementById("delete-package").style.display="none";
        document.getElementById("pack_search_success").innerHTML="";
        document.getElementById("pack_del_success").innerHTML="";
        document.getElementById("pack_add_success").innerHTML="";
    });
});

//delete button
$(document).ready(function(){
    $('#pack_delete_btn').click(function(){
        document.getElementById("delete-package").style.display="block";
        document.getElementById("show-content").style.display="none";
        document.getElementById("add-content").style.display="none";
        document.getElementById("search-package").style.display="none";
        document.getElementById("pack_search_success").innerHTML="";
        document.getElementById("pack_del_success").innerHTML="";
        document.getElementById("pack_add_success").innerHTML="";
    });
});

//for deleting package
$(document).ready(function(){
    $("#delete-package").on('submit',function(event){
        event.preventDefault()
        var del_pack_id=document.getElementById("del_pack_id").value
        $.post("pack_delete.php",{del_pack_id:del_pack_id},function(data){
            console.log(data)
            document.getElementById("pack_del_success").innerHTML=data;
            document.getElementById("del_pack").reset();
        })
    })
})

//for searching package
$(document).ready(function(){
    $("#search-package").on('submit',function(event){
        event.preventDefault()
        var search_pack_id=document.getElementById("search_pack_id").value
        $.post("pack_search.php",{search_pack_id:search_pack_id},function(data){
            console.log(data)
            document.getElementById("pack_search_success").innerHTML=data;
            document.getElementById("search_pack").reset();
        })
    })
})

//for adding package
$(document).ready(function(){
    $("#add-pack-form").on('submit',function(event){
        event.preventDefault()
        var add_pack_id=document.getElementById("add_pack_id").value
        var add_pack_service=document.getElementById("add_pack_service").value
        var add_pack_prop=document.getElementById("add_pack_prop").value
        var add_pack_price=document.getElementById("add_pack_price").value
        // var fd = new FormData();
        // var file=$('#add_pack_image')[0].files[0];
        // console.log(file);
        // fd.append("file",file);
        // fd.append("add_pack_id",add_pack_id);
        // fd.append("add_pack_service",add_pack_service);
        // fd.append("add_pack_prop",add_pack_prop);
        // fd.append("add_pack_price",add_pack_price);
        // console.log(fd);
        // // fd.append('add_pack_image',files[0]);
        // // console.log("hello")
        // let response= await fetch("pack_add.php",{
        //     method: "POST",
        //     body: fd,
        //     contentType:false
        // })
        // console.log(response)
        console.log(add_pack_id);
        $.post("pack_add.php",{add_pack_id:add_pack_id,add_pack_service:add_pack_service,
            add_pack_prop:add_pack_prop,add_pack_price:add_pack_price},function(data){
        document.getElementById("pack_add_success").innerHTML=data;
        document.getElementById("add-pack-form").reset();
        })
    })
})

// $(document).ready(function(){
//     //Uplaod Image
//     $("#add-pack-form").on("submit", function(e){
//       e.preventDefault();

//       var formData = new FormData(this);

//       $.ajax({
//         url : "upload.php",
//         type : "POST",
//         data : formData,
//         contentType : false,
//         processData: false,
//         success: function(data){
//         //   $("#preview").show();
//         //   $("#image_preview").html(data);
//         //   $("#upload_file").val('');
//         }
//     });
//       });
//     });
</script>
<body>
<div class="package">
        <button class="button showbutton" type="submit" id="pack_show_btn">Show Package</button>
        <button class="button" type="submit" id="pack_add_btn">Add Package</button>
        <button class="button" type="submit" id="pack_delete_btn">Delete Package</button>
        <button class="button" type="submit" id="pack_search_btn">Search Package</button>
</div>
<div id="pack-content">

</div>
<div id="show-content" style="display: none;">
    <?php
        $sql="select * from packages";
        echo "<table class='tab'>";
        echo "<tr class='abc'>";
                echo "<th class='xyz' >Package Code</th>";
                echo "<th class='xyz'>Package Service</th>";
                echo "<th class='xyz'>Package Properties</th>";
                echo "<th class='xyz'>Package Price</th>";
        echo "</tr>";
        if($result=mysqli_query($conn,$sql))
        {
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                        echo "<td class='row'>".$row['pack_code']."</td>";
                        echo "<td class='row'>".$row['services']."</td>";
                        echo "<td class='row'>".nl2br($row['properties'])."</td>";
                        echo "<td class='row'>".$row['price']."</td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
            }
        }
        echo "</table>";
        //mysqli_close($conn);

    ?>
</div>

<div id="add-content" style="display: none;">
    <span id="message"></span>
    <form method="post" action="pack_add.php" id="add-pack-form" enctype="multipart/form-data">
        <input type="text" name="code" id="add_pack_id" placeholder="Package Code" class="addform" /><br>
        <input type="text" name="service" id="add_pack_service" placeholder="Package Service" class="addform" /><br>
        <textarea type="textarea" name="add_pack_prop" id="add_pack_prop" placeholder="Package Properties" rows="5" cols="50" ></textarea><br>
        <input type="text" name="price" id="add_pack_price" placeholder="Package Price" class="addform" /><br>
        <!-- <label for="img">Select image:</label>
        <input type="file" id="add_pack_image" name="image" accept="image/*" class="addform">
         -->

        <!-- <div class='preview'>
                <img src="upload/default.png" id="img" width="100" height="100">
            </div>
            <div >
                <input type="file" id="add_pack_image" name="add_pack_image" />
            </div> -->
        <input class="submit" type="submit" name="add-pack" id="add-pack" class="addform">
    </form>
</div>
<p id="pack_add_success"></p>

<div id="delete-package" style="display: none;">
    <form action="pack_delete.php" method="POST" id="del_pack">
        <input type="text" id="del_pack_id" name="delete" placeholder="Enter the package id: " /><br>
        <input class="submit" type="submit" name="delete-pack" value="Delete"/>
    </form>
</div>
<p id="pack_del_success"></p>

<div id="search-package" style="display: none;">
    <form action="pack_search.php" method="POST" id="search_pack">
        <input type="text" id="search_pack_id" name="search" placeholder="Enter the Package id: " /><br>
        <input class="submit" type="submit" name="search-pack" value="Search"/>
    </form>
</div>
<p id="pack_search_success"></p>

</body>
</html>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->