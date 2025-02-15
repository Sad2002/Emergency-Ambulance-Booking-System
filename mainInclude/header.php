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

</body>
</html>