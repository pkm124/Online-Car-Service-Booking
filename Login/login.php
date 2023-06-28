<?php require_once("../config.php"); ?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        
    </head>
<body>
    <ul>
        <label class="swap2"for="cars">MECHBUDDY!</label>
        <li><a href="#">Home</a></li>
        <li><a href="#">About us </a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    <div class="Swapnil">
    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="Login()">Log In</button>
            <button type="button" class="toggle-btn"onclick="Register()">Register</button>
        </div>
        <form id="Login" class="input-group">
            <label class="swap1"for="cars">Select User Type:</label>
            <select name="User"id="User">
                <option value="Customer">Customer</option>
                <option value="Mechanic">Admin</option>
              </select> 
            <input type="text" class="input-field"placeholder="User Id"required>
            <input type="text" class="input-field"placeholder="Password"required>
            <input type="checkbox" class="checkbox"><span>Remember Password</span>
            <button type="submit " class="submit-btn">Login</button>
        </form>
        <?php
 /*       
$fname=$_POST['fname'];
$user_id=$_POST['user_id'];
$email=$_POST['email'];
$p_no=$_POST['p_no'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
*/
if(isset($_POST['register'])){
    extract($_POST);
    if(strlen($fname)<3){ // Minimum 
        $error[] = 'Please enter First Name using 3 charaters atleast.';
    }
    if(strlen($fname)>50){  // Max 
        $error[] = 'First Name: Max length 20 Characters Not allowed';
    }
    if(!preg_match("/^[A-Za-z _][A-Za-z ]+[A-Za-z _]$/", $fname)){
        $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
    }  
          
    if(strlen($user_id)<3){ // Change Minimum Lenghth   
        $error[] = 'Please enter user_id using 3 charaters atleast.';
    }
    if(strlen($user_id)>50){ // Change Max Length 
        $error[] = 'user_id : Max length 50 Characters Not allowed';
    }
    if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $user_id)){
        $error[] = 'Invalid Entry for user_id. Enter lowercase letters without any space and No number at the start- Eg - myuser_id, okuniqueuser or myuser_id123';
    } 
    if(strlen($p_no)!=10){ // phone number
        $error[] = 'please enter a valid phone number';
    }
        /*if(!preg_match("/^[A-Za-z _][A-Za-z ]+[A-Za-z _]$/", $p_no)){
                    $error[] = 'Invalid Phone Number.';
                }  */      
    if(strlen($email)>50){  // Max 
        $error[] = 'Email: Max length 50 Characters Not allowed';
    }
    if($confirm_password ==''){
        $error[] = 'Please confirm the password.';
    }
    if($password != $confirm_password){
        $error[] = 'Passwords do not match.';
    }
    if(strlen($password)<5){ // min 
        $error[] = 'The password is 6 characters long.';
    }
    if(strlen($password)>20){ // Max 
        $error[] = 'Password: Max length 20 Characters Not allowed';
    }
    $sql="select * from customer_login where (user_id='$user_id' or email_id='$email');";
    $res=mysqli_query($conn,$sql);
      if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          if($user_id==$row['user_id']){
              $error[] ='user_id alredy Exists.';
          } 
          if($email==$row['email']){
            $error[] ='Email alredy Exists.';
          } 
      
    }
    if(!isset($error)){ 
        //$date=date('Y-m-d');
        $options = array("cost"=>4);
        $password = password_hash($password,PASSWORD_BCRYPT,$options);
        $result = mysqli_query($conn,"INSERT into customer_login values('$fname','$user_id','$email','$p_no','$password')");
        if($result){
          $done=2; 
        }
        else{
          $error[] ='Failed : Something went wrong';
        }
    } 
}
if(isset($error)){ 
  foreach($error as $error){ 
  echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
  }
}
?>
        
        <?php
        if(isset($done)) 
      { 
        ?>
<div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="../Login/login.php" style="color:#fff;">Login here... </a> </div>
      <?php } else { ?>
        <form action="" method="post" id="Register"class="input-group">
            <label class="swap1"for="cars">Select User Type:</label>
            <select name="User"id="User">
                <option value="Customer">Customer</option>
                <option value="Admin">Admin</option>
              </select>
            <input type="text" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" class="input-field" name="fname" placeholder="Full Name"required>  
            <input type="text" value="<?php if(isset($error)){ echo $_POST['user_id'];}?>" class="input-field" name="user_id" placeholder="User Id"required>
            <input type="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" class="input-field" name="email" placeholder="Email Id"required>
            <input type="number" value="<?php if(isset($error)){ echo $_POST['p_no'];}?>" class="input-field" name="p_no" placeholder="Phone number"required>
            <input type="password" class="input-field" name="password" placeholder="Password"required>
            <input type="password" class="input-field" name="confirm_password" placeholder="Confirm Password"required>
            <input type="checkbox" class="checkbox"><span>I agree to the terms and conditions</span>
            <button type="submit " name="register" class="submit-btn">Register</button>
        </form>
      <?php } ?>

    </div>
    </div>
    <script>
        var x=document.getElementById("Login")
        var y=document.getElementById("Register")
        var z=document.getElementById("btn")
        function Register()
        {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function Login()
        {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>    
</html>
