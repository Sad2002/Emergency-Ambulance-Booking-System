


<?php

include('./mainInclude/header.php');
@include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<link rel="stylesheet" href="ambulancelist.css?v=<?php echo time();?>">
<style>
input[type=text] {border-style: solid;
padding:8px;
} 
</style>  
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                  <div class="col-sm-8"><h2>Search <b>Ambulance</b></h2></div><br>
                    <div class="col-sm-4">
                    <div class="container ">
    <form method="post">
        <input type="text" placeholder="Search City" name="search">
        <button class="btn btn-dark btn-sm" name="submit">Search</button>
</div>
                  
</div>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])){
                $search=$_POST['search'];
            
            $sql ="SELECT * FROM ambulancelist where city='$search' or ambulancetype like'%$search%'";
            $conn = mysqli_connect('localhost','root','','user_db');
            
            $result=$conn->query($sql);
            
            if($result->num_rows > 0)
            {
            
                ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>VehicleNo	</th>
                        <th>Ambulance Type</th>
                        <th>Drivername</th>
                        <th>City</th>
                        <th>Price</th>

                        <th>Vehicle Status</th>
                        <th>Book Ambulance</th>
                        
                    </tr>
                </thead>
                <tbody>
                 <?php   while($row = $result->fetch_assoc()){
                   echo '<tr>';
                   echo '<th scope="row">'.$row['ambulance_id'].'</th>';
                   echo  '<td>'.$row['vehicleno'].'</td>';
                   echo  '<td>'.$row['ambulancetype'].'</td>';
                   echo  '<td>'.$row['drivername'].'</td>';
                   echo  '<td>'.$row['city'].'</td>';
                   echo  '<td>'.$row['price'].'</td>';
                   echo  "<td>";
                   if($row['status']==1)
                   {
                    echo "<button class='custom-button'>Available</button>";
                    echo '<form action="booking.php" method ="POST" >
                    <input type="hidden" name="id" value='.$row["ambulance_id"].'>
            <button type="submit"  class="btn btn-info mr-3" name="view" value="View">
             <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    </form> </td>';
                    '</tr>';






                   }else
                   {
                    echo "<button class='custom-button1'>Unavailable</button>";
                   
                   }
                  "</td>";
                   
                 
                  
                   
                  
                  
            
                echo  '</tr>';
                
                     } ?>    
                </tbody>
            </table>
            <?php } else{
                echo'<h2>Data not found</h2>';
            }}
            
            ?>
            </form>
        </div>
    </div>
</div>     
</body>
</html>