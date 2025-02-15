
<?php
session_start();
$conn = mysqli_connect('localhost','root','','user_db');
if($conn->connect_error){
    die("connection failed");
}

if(!isset($_SESSION["login_sess"])) 
{
    header("location:driverlogin.php"); 
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


   <link rel="stylesheet" href="dashboard.css?v=<?php echo time();?>">

</head>
<body>
                              

<section class="header">

   <a href="home.php" class="logo">Aarogya</a>

   <nav class="navbar">
   <ul>
   <li> <a href="driverdashboard.php">Home</a></li>
        <li><a href="patientrequest.php">Patient Request For Ambulance</a></li>
        

        <li><a href="profile.php">My Profile<i class="fas fa-caret-down"></i></a>
                <ul>
                  <li><a href="editprofile.php">Edit Profile</a></li>
                  <li><a href="changepassword.php">Change Password</a></li>
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


<div class="swiper-slide slide" style="background:url(ambulance.gif) no-repeat">

<h1>Emergency Ambulance Booking</h1>



           
   <div class="content">
   
      
   </div>
  
</div>


</section>