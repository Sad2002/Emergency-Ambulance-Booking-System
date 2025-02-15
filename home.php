<?php

require_once 'config.php';  
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


   <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

</head>
<body>
   

<section class="header">

   <a href="home.php" class="logo">Aarogya</a>

   <nav class="navbar">
   <ul>
        <li><a href="home.php">home</a></li>
        <li> <a href="about.php">about</a></li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="services.php">services</a></li>
        <li> <a href="payment/view.php">Search Ambulance</a></li>
        <li><a href="myprofile.php">myprofile<i class="fas fa-caret-down"></i></a>
                <ul>
                  <li><a href="edit-profile.php">Edit Profile</a></li>
                  <li> <a href="ambulancestatus.php">Booking Ambulance Status</a></li>
                  <li><a href="change-password.php">Change Password</a></li>
                  <li><a href="logout.php">Logout</a></li>
                    
                    </ul>
                    </li>
                    
</ul>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>


<body>
<section class="home">

   <div class="swiper home-slider">
   <div class="swiper-wrapper">

<div class="swiper-slide slide" style="background:url(uploads/ambulance.gif) no-repeat">

<h1>Emergency Ambulance Booking</h1>

           
   <div class="content">
   
      
   </div>
  
</div>


</section>

         



<section class="services">

   <h1 class="heading-title"> our services </h1>

   <div class="box-container">

      <div class="box">
         <img src="uploads/choose1.png" alt="">
         <h3>24/7 availability</h3>
      </div>

      <div class="box">
         <img src="uploads/choose2.png" alt="">
         <h3>fastest response time</h3>
      </div>

    

      <div class="box">
         <img src="uploads/choose4.png" alt="">
         <h3>experienced staff</h3>
      </div>

      

      <div class="box">
         <img src="uploads/choose6.png" alt="">
         <h3>variety of ambulance services</h3>
      </div>

   </div>

</section>



<section class="home-about">

   <div class="image">
      <img src="uploads/about.png" alt="">
   </div>

   <div class="content">
      <h3>about us</h3>
      <p>we EABS,situated at area,city is a reputed and committed ambulance provider.
         we are committed to provide excellent and critical care services in emergencies
      we are recognised for our passionate care,we take to improve standard critical care transport.
         we feel honored and privilaged that our pre-existing clients have positive feedback towards us.</p>
      <a href="about.php" class="btn">read more</a>
   </div>

</section>


<section class="packages">

   <h1 class="heading-title">Types of Ambulance</h1>

   <div class="box-container">
     <?php
      $sql = "SELECT * FROM services LIMIT 3";
      $result =$conn->query($sql);
      if($result->num_rows >0){
         while($row=$result->fetch_assoc()){
            $service_id=$row['service_id'];
            echo ' <div class="box">
            <div class="image">
               <img src="'.str_replace('..','.',$row['service_img']).'" alt="">
            </div>
            <div class="content">
               <h3>'.$row['service_name'].'</h3>
               <p>'.$row['service_desc'].'</p>
               <a href="view.php" class="btn">book now</a>
            </div>
         </div>';
   

         
         }
      }
     ?>
      

     
    <div class="center">
   <div class="load-more"><a href="services.php" class="btn">load more</a></div>
</div>
</section>



<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="contact.php"> <i class="fas fa-angle-right"></i> contact</a>
         <a href="services.php"> <i class="fas fa-angle-right"></i>services</a>
         <a href="login.php"> <i class="fas fa-angle-right"></i>login</a>
         <a href="driverpanel.php"> <i class="fas fa-angle-right"></i>driverpanel</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

</section>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


<script src="script.js"></script>

</body>
</html>