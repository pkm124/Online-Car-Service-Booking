
<html>
    
    <head>
    <link rel="stylesheet" href="admin_mechanic.css">

    </head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <body>
    <p class="mechanic">Mechanic</p>
<input type="submit" class="button addbutton" id="add_btn" name="add_mech" Value="Add"/>
<input type="submit" class="button"id="del_btn" name="delete_mech" Value="Delete"/>
<input type="submit" class="button"id="show_btn" name="show_mech" Value="Show"/>
<input type="submit" class="button"id="search_btn" name="search_mech" Value="Search"/>
<br>
    </body>
    
<script>

//show button
$(document).ready(function(){
    $('#show_btn').click(function(){
        $('#show_success').load('mech_show.php')
        document.getElementById("add_form").style.display="none";
        document.getElementById("search-form").style.display="none";
        document.getElementById("delete-form").style.display="none";
        document.getElementById("search_success").innerHTML="";
        document.getElementById("add_success").innerHTML="";
        document.getElementById("del_success").innerHTML="";
    });
});

//add button
$(document).ready(function(){
    $('#add_btn').click(function(){
        document.getElementById("add_form").style.display="block";
        document.getElementById("delete-form").style.display="none";
        document.getElementById("search-form").style.display="none";
        document.getElementById("show_success").innerHTML="";
        document.getElementById("search_success").innerHTML="";
        document.getElementById("add_success").innerHTML="";
        document.getElementById("del_success").innerHTML="";
    });
});

//delete button
$(document).ready(function(){
    $('#del_btn').click(function(){
        document.getElementById("delete-form").style.display="block";
        document.getElementById("add_form").style.display="none";
        document.getElementById("search-form").style.display="none";
        document.getElementById("show_success").innerHTML="";
        document.getElementById("search_success").innerHTML="";
        document.getElementById("add_success").innerHTML="";
        document.getElementById("del_success").innerHTML="";
    });
});

//search button
$(document).ready(function(){
    $('#search_btn').click(function(){
        document.getElementById("search-form").style.display="block";
        document.getElementById("delete-form").style.display="none";
        document.getElementById("add_form").style.display="none";
        document.getElementById("show_success").innerHTML="";
        document.getElementById("search_success").innerHTML="";
        document.getElementById("add_success").innerHTML="";
        document.getElementById("del_success").innerHTML="";
    });
});

//for adding mechanic
$(document).ready(function(){
    $("#add_form").on('submit',function(event){
        event.preventDefault()
        var fname=document.getElementById("fname").value
        var lname=document.getElementById("lname").value
        var email=document.getElementById("email").value
        var phone_no=document.getElementById("phone_no").value
        var mech_id=document.getElementById("mech_id").value
        var psw=document.getElementById("psw").value
        
        $.post("mech_add.php",{fname:fname,lname:lname,email:email,phone_no:phone_no,mech_id:mech_id,psw:psw},function(data){
            console.log(data)
            document.getElementById("add_success").innerHTML=data;
        })
    })
})

//for deleting mechanic
$(document).ready(function(){
    $("#delete-form").on('submit',function(event){
        event.preventDefault()
        var del_mech_id=document.getElementById("del_mech_id").value
        $.post("mech_del.php",{del_mech_id:del_mech_id},function(data){
            console.log(data)
            document.getElementById("del_success").innerHTML=data;
        })
    })
})

//for searching mechanic
$(document).ready(function(){
    $("#search-form").on('submit',function(event){
        event.preventDefault()
        var search_mech_id=document.getElementById("search_mech_id").value
        $.post("mech_search.php",{search_mech_id:search_mech_id},function(data){
            console.log(data)
            document.getElementById("search_success").innerHTML=data;
        })
    })
})

</script>

<form name="add_form" action="mech_add.php" id="add_form" method="post" style="display: none;">
    <input type="text" name="fname" id="fname" placeholder="First Name" required><br>
        <div id="fname_err" style="background-color:; color:red; font-size:12px;"></div>
    <input type="text" name="lname" id="lname" placeholder="Last Name" required><br>
        <div id="lname_err" style="background-color:; color:red; font-size:12px;"></div>
    <input type="email" name="email" id="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email should contain @ and ." required><br>
        <div id="email_err" style="background-color:; color:red; font-size:12px;"></div>
    <input type="tel" name="phone_no" id="phone_no" placeholder="Enter Mobile No." pattern="[0-9]{10}" title="Enter 10 digit mobile number" required>
        <div id="phone_no_err" style="background-color:; color:red; font-size:12px;"></div>
    <input type="text" name="mech_id" id="mech_id" placeholder="Enter MECH ID" pattern="[0-9]{7}" title="Mech ID should be 7 characters in length" required><br>
        <div id="mech_id_err" style="background-color:; color:red; font-size:12px;"></div>
        <input type="password" id="psw" name="pass" placeholder="Enter Password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}" title="Password should be 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character" required><br>
        <div id="pass_err" style="background-color:; color:red; font-size:12px;"></div>
    <input class="submit" type="submit" id="add-mech" name="add-mech" value="Submit">
</form>

<p id="add_success"></p>


<form id="delete-form" method="post" style="display: none;">
    <input type="text" name="del_mech_id" id="del_mech_id" placeholder="Enter Mechanic Id" pattern="[0-9]{7}" title="Mech ID should be 7 characters in length" required><br>
    <input class="submit" type="submit" id="del_mech" value="Delete">
</form>
<p id="del_success"></p>

<div id="show_success"></div>

<form id="search-form" style="display: none;">
    <input type="text" name="search_mech_id" id="search_mech_id" placeholder="Enter Mechanic Id" pattern="[0-9]{7}" title="Mech ID should be 7 characters in length" required><br>
    <input class="submit" type="submit" id="search_mech" value="Search">
</form>
<p id="search_success"></p>







</html>