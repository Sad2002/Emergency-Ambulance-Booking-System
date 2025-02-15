
<?php

include 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ambulancestatus</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<link rel="stylesheet" href="status.css?v=<?php echo time();?>">
          
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                   <div class="col-sm-8"><h2><b>Booked Ambulance</b></h2></div><br>
                    <div class="col-sm-4">
                       
                    
                    </div>
                </div>
            </div>
            <?php
           
              require_once("config.php");
              if(!isset($_SESSION["login_sess"])) 
              {
                  header("location:login.php"); 
              }
                $email=$_SESSION["login_email"];
                $findresult = mysqli_query($conn, "SELECT * FROM bookings WHERE email= '$email'");
              if($res = mysqli_fetch_array($findresult))

        
            $conn = mysqli_connect('localhost','root','','user_db');
           
              ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>FName</th>
                        <th>LName</th>
                        <th>Email</th>
                        <th>MobileNo</th>
                        <th>Ambulancetype</th>
                        <th>Source Address</th>
                        <th>Destination Address</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                 <?php   foreach($findresult as $row){
                   echo "<tr>";
                   echo '<td>' .$row['id'].'</td>';
                   echo  '<td>'.$row['first_name'].'</td>';
                   echo  '<td>'.$row['last_name'].'</td>';
                   echo  '<td>'.$row['email'].'</td>';
                   echo  '<td>'.$row['mobile_no'].'</td>';  
                   echo  '<td>'.$row['ambulancetype'].'</td>';  
                   echo  '<td>'.$row['source_address'].'</td>'; 
                   echo  '<td>'.$row['destination_address'].'</td>'; 
                   echo  '<td>'.$row['price'].'</td>'; 
                       
                   echo  "<td>";
                   if($row['status']==1)
                   {
                    echo "<button class='custom-button'>Assigned</button>";
                   }else
                   {
                    echo "<button class='custom-button1'>Notassigned</button>";
                   }
                  "</td>";
                         
                
                   echo  "</tr>";
                  
                        
                     } ?>    
                </tbody>
            </table>
           <br>
            <a href="home.php" class="btn1 btn-secondary">Back</a>
</body>
</html>