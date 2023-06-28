<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>mechBuddy</title>
</head>
<body>

    

    <nav class="navbar background">
        <ul class="nav-list">
            <div class="logo"><img src="img/logo.png" alt="Logo"></div>
            <li><a href = "home1.php">Home</a></li>
            <li><a href="pack/package.php">Packages</a></li>
            <li><a href = "cnt/ContactUs.php">ContactUs</a></li>
            <!-- <li><a href="#login">Login/Register</a></li> -->
        </ul>
        <li style="list-style:none;">
    <?php
if(!isset($_SESSION['username'])){
?>
<?php }
else{?>
<div class="dropdown">
  <button class="dropbtn"><p>Request</i></p></button>
  <div class="dropdown-content">
    <a href="pack/pending.php">Pending</a>
    <a href="pack/completed_history.php">Completed</a>
  </div>
</div>
<?php
}
?>
        </li>
        <div class="rightNav">
            <!-- <input type="text" name="Search" id="Search" style="padding: 5px; -->
            <!-- font-size: 17px;
            border: 2px solid rgb(128, 128, 128);
            border-radius: 8px;"> -->
            
            <?php
            if(!isset($_SESSION['username'])){
            ?>
            <button class="btn"> <a style =" text-decoration: none; " href="customer_login/register.php">Login/Register</a></button>
            <?php }
            else{?>
                <button class="btn btn-sm"><a style =" text-decoration: none;" href="logout.php">Logout</a></button> <?php
                echo '<p class="wel" >Welcome '.$_SESSION['username'].'</p>';
            }
            ?>
        </div>
    </nav>

    <div class="background fisrtSection slider">
        <!-- slides -->
        <div class="slider__slides">
          <div class="slide s--active">
            <div class="slide__inner">
              <div class="slide__content">
                <h2 class="slide__heading">Great service and long lasting</h2>
                <p class="slide__text">Greetings, Traveler!</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="slide__inner">
              <div class="slide__content">
                <h2 class="slide__heading">Affordable prices!</h2>
                <p class="slide__text">Industry competing prices!</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="slide__inner">
              <div class="slide__content">
                <h2 class="slide__heading">Huge discounts</h2>
                <p class="slide__text">It's cool, isn't it?</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="slide__inner">
              <div class="slide__content">
                <h2 class="slide__heading">Don't worry about repairing</h2>
                <p class="slide__text">Best mechanics with best experience</p>
              </div>
            </div>
          </div>
          <div class="slide s--prev">
            <div class="slide__inner">
              <div class="slide__content">
                <h2 class="slide__heading">No worrying your car anymore</h2>
                <p class="slide__text">We are here to take care about your car!</p>
              </div>
            </div>
          </div>
        </div>
        <!-- slides end -->
        <div class="slider__control">
          <div class="slider__control-line"></div>
          <div class="slider__control-line"></div>
        </div>
        <div class="slider__control slider__control--right m--right">
          <div class="slider__control-line"></div>
          <div class="slider__control-line"></div>
        </div>
      </div>
        
          <script src="js/index.js"></script>


    <section class="background firstSection">
        <div class="box-main">
            <div class="firstHalf">
                <!-- <p class="">mechBuddy</p> -->
                <!-- <p class="">Easy care by expertise with convenience. Your answer to all hassle-free car services at your home comfort</p> -->
                <!-- <div class"">
                    <button class="button"><span>Packages</span></button>
                    <button class="button"><span>Book Now</span></button>
                </div> -->
            </div>
            <div class="secondHalf">
                
            </div>
        </div>
    </section>

    <section class="section">
        <div class="paras">
        <p class="sectionTag text-big">End of your search is here</p>
        <p class="sectionSubTag text-small">Mechbuddy provides with seemless experience to the user. It provides smooth performance to your car ans SAVE UPTO 40% as compared to other competitors. We provide highly skilled technician for your car.</p><br>
        <p class="sectionSubTag text-small">YOUR CAR IS OUR FIRST PRIORITY.</p>

    </div>
        <div class="thumbnail">
            <img src="img/forestcar.jpg" alt="picture" class="imgFluid">
        </div>
    </section>

    <section class="section section-left">
        <div class="paras">
        <p class="sectionTag text-big">Industry Leading Spare Part</p>
        <p class="sectionSubTag text-small">We provide with the best spare parts available currently in the market. All parts are imported from the original manufacturer.</p>
    </div>
        <div class="thumbnail">
            <img src="img/suzukihandle.jpg" alt="picture" class="imgFluid">
        </div>
    </section>

    <section class="section">
        <div class="paras">
        <p class="sectionTag text-big">Our customer are our first priority</p>
        <p class="sectionSubTag text-small">We provide best customer support. Mechanic will contact the user and will come for the services as per your convinience</p>
    </div>
        <div class="thumbnail">
            <img src="img/streetcarmoving.jpg" alt="picture" class="imgFluid">
        </div>
    </section>
    <p class="questions">FAQ's</p>
    <div class="accordion box">
        <div class="contentBx">
            <div class="label">What are the different car services provided by mechBuddy?</div>
            <div class="content">
                <p>mechBuddy offers over 300+ top-rated Car Repairs and Car Services in Mumbai, from your Basic Car Service to Denting Painting, Road-Side Assistance, Detailing Services, Custom Services and much more.</p>
            </div>

        </div>

        <div class="contentBx">
            <div class="label">Which engine oil do you use during my car service?</div>
            <div class="content">
                <p>When you choose mechBuddy, you choose the best. mechBuddy uses only 100% Genuine OEM-recommended Mobil engine oil, which provides superior performance along with long term protection for your car.</p>
            </div>

        </div>

        <div class="contentBx">
            <div class="label">What kind of spare parts are used during my car service?</div>
            <div class="content">
                <p>mechBuddy uses only 100% Genuine OEM/OES car spare parts for your car service. We bulk procure these auto parts directly from our central supplier, which is then distributed to mechBuddy workshops across various cities in India.</p>
            </div>

        </div>

        <div class="contentBx">
            <div class="label">Do you provide any warranty or assurance on your car service?</div>
            <div class="content">
                <p>When you book your car service with mechBuddy, peace of mind is what we guarantee. That is why you get a network warranty of 1 month/1000kms on car services. For Denting & Painting services, we offer a warranty of 2 years whereas Tyres & Batteries are covered under manufacturer warranty.</p>
        </div>
        </div>


    </div>

    <script>
        const accordion = document.getElementsByClassName('contentBx');
        for(i=0; i<accordion.length; i++){
            accordion[i].addEventListener('click', function(){
                this.classList.toggle('active')
            })
        }
    </script>
    <section class="footer">
        <div class="social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-snapchat"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Services</a>
            </li>

            <li>
                <a href="#">About</a>
            </li>

            <li>
                <a href="#">Terms</a>   
            </li>

            <li>
                <a href="#">Privacy Policies</a>
            </li>

        </ul>
        
    </section>
    <div class="copyright">
    <footer class="copyright">
        <p class="text-footer" style="background-color:black">
        Copyright &copy; 2022 - All Rights Reserved
        </p>
    </footer>
    </div>
</body>
</html>