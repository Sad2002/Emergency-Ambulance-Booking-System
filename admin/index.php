<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user'])){
	header('location:adminlogin.php');
}
$sql ="SELECT max(id) FROM users";
$conn = mysqli_connect('localhost','root','','user_db');
$result =$conn->query($sql);
$row= $result->fetch_row();
$registeruser=$row[0];



$sql ="SELECT max(service_id) FROM services";
$conn = mysqli_connect('localhost','root','','user_db');
$result =$conn->query($sql);
$row= $result->fetch_row();
$service=$row[0];




?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1.0">
    <title>admindashboard</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet"
          href="responsive.css">
</head>
 
<body>
    <style>
        a
        {
            text-decoration: none;
        }
   </style>

    <header>
 
        <div class="logosec">
            <div class="logo">My Book Recommender</div>
            <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn"
                id="menuicn"
                alt="menu-icon">
        </div>
 
        <center>  <div class="searchbar">
            <input type="text"
                   placeholder="Search">
            <div class="searchbtn">
             <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn"
                    alt="search-icon"></center>
                    
              </div>
             <h3> Hello  <?php echo $_SESSION['user']?></h3>
        </div>
        <style>

.link{
color:white;
}
</style>

    </header>
 
    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                    <a class="link" href="index.php">
                        <h3> Dashboard</h3>
                        </a>
                    </div>
 
                    <div class="option2 nav-option">
                            <a class="nav-link" href="service.php">
                        <h3> Book Management</h3>
                       </a>
                    </div>
 
                   
                   
 
                    <div class="nav-option option5">
                    <a class="nav-link" href="users.php">
                    <h3> Registered Clients</h3>
                      </a>   
                    </div>

        
                    <div class="nav-option logout">
                       
                        <a href="adminlogout.php">
                        <h3>Logout</h3></a>
                        
                    </div>
 
                </div>
            </nav>
        </div>
        <div class="main">

            <div class="box-container">
 
 <div class="box box1">
     <div class="text">
         <h2 class="topic-heading"><?php echo $registeruser;?></h2>
         <h2 class="topic">Registered clients</h2>
     </div>
 </div>

 


 <div class="box box4">
     <div class="text">
         <h2 class="topic-heading"><?php echo $service;?></h2>
         <h2 class="topic">Services</h2>
     </div>
</div>



<script src="./index.js"></script>
</body>
</html>

    