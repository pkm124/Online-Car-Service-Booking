<?php session_start(); ?>
<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="common.css">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <script type="text/javascript">
            function sendEmail() {
                var name=document.getElementById("name").value
                var email=document.getElementById("email").value
                var message=document.getElementById("message").value
                var a='Name: '+name+'<br>Email: '+email+'<br>Subject: '+message;
                Email.send({
    
                    Host: "smtp.gmail.com",
                    Username : "wpmphost@gmail.com",
                    Password : "Pass@123",
                    //SecureToken : "aba7a08a-0077-41e6-9160-1970d8ffc5b2",
                    To : "wpmphost@gmail.com",
                    From : "wpmphost@gmail.com",
                    Subject : name,
                    Body : a
                })
                .then(function(message){
                    popup()
                    //alert("mail sent successfully")
                });
                
            }
            function popup(){
                var openPopupBtn = document.querySelector("#open-popup-btn");
                var closePopupBtn = document.querySelector(".popup-close-btn");
                openPopupBtn.addEventListener("click",function(){
                    document.body.classList.add("popup-active");
                });
                closePopupBtn.addEventListener("click",function(){
                    document.body.classList.remove("popup-active");
                });
            }
            setTimeout(popup, 1);
        </script>
    </head>
    <body class="body">
        <header>
            <nav class="navbar background">
                <ul class="nav-list">
                    <div class="logo"><img src="../img/logo.png" alt="Logo"></div>
                    <li><a href = "../home1.php">Home</a></li>
                    <li><a href="../pack/package.php">Packages</a></li>
                    <li><a href = "ContactUs.php">ContactUs</a></li>
                    <!-- <li><a href="#login">Login/Register</a></li> -->
                </ul>
                <div class="rightNav">
                    <!-- <input type="text" name="Search" id="Search" style="padding: 5px; -->
                    <!-- font-size: 17px;
                    border: 2px solid rgb(128, 128, 128);
                    border-radius: 8px;"> -->
                        <?php
                        if(!isset($_SESSION['username'])){
                        ?>
                        <button class="btn"> <a style ="text-decoration: none; color: #fff;" href="../customer_login/register.php">Login/Register</a></button>
                        <?php }
                        else{?>
                            <button class="btn btn-sm"><a style =" text-decoration: none; color: #fff;" href="../logout.php">Logout</a></button> <?php
                            echo '<p style="color:white;">Welcome '.$_SESSION['username'].'</p>';
                        }
                        ?>
                </div>
            </nav>
        </header>
        <section class="section">
            <div class="contact-card">
                <h2 class="h1-1">Helpline No. - <a href="https://wa.me/9199XXXXXXXX">99XXXXXXXX</a></h1><hr class="hr-1">
                <h2 class="h1-1">Email - <a href="mailto:wpmphost@gmail.com">wpmphost@gmail.com</a></h1><hr class="hr-1">
                <h2 class="h1-2">Address - </h2><br>
                <p>Dr. K. M. Vasudevan Pillai Campus,<br> Plot No. 10, Sector 16,<br> New Panvel East,<br> Navi Mumbai, Maharashtra 410206</p>
            </div>
            <div class="contact-card1">
                <h1 class="h1-3">Send us a message!!!<br>We will get back to you soon!!!</h1>
                <form action="javascript:sendEmail()">
                    <input type="text" name="name" id="name" placeholder="Enter your Name" required><br><br>
                    <input type="email" name="email" id="email" placeholder="Enter your Email" required><br><br>
                    <textarea name="message" placeholder="Enter your message" id="message" maxlength="500" required></textarea><br><br>
                    <input type="Submit" name="submit" id="open-popup-btn" value="Send Now" class="click">
                </form>
                <div class="popup-overlay"></div>
                <div class="popup">
                <img src="check.png" alt="" class="imgpop"><br><br>
                <h1 class="h1popup">Mail Sent Successfully!!!</h1><br>
                <button class="popup-close-btn">OK</button>
                </div>
            </div>
        </section>
    </body>
</html>