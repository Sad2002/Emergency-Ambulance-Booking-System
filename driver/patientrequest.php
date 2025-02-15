<?php
session_start();
$conn = mysqli_connect('localhost','root','','user_db');
if(!isset($_SESSION["login_sess"])) 
{
    header("location:driverlogin.php"); 
}

if($conn->connect_error){
    die("connection failed");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>

form{
    display:inline-block;
}
    body {
        margin: 0;
        padding: 0;
    }

    .scroll-container {
        overflow-x: auto;
        white-space: nowrap; 
        
    }

</style>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>patientrequest</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<link rel="stylesheet" href="patientrequest.css?v=<?php echo time();?>">
<div class="scroll-container">
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                   <div class="col-sm-8"><h2>List of <b> Patient Request For Ambulance</b></h2></div><br>
                    <div class="col-sm-4">

                  

</div>
                </div>
            </div>
            <?php
            $sql ="SELECT * FROM bookings";
            $conn = mysqli_connect('localhost','root','','user_db');
            
            $result=$conn->query($sql);
            if($result->num_rows > 0)
            {
            
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Source Address</th>
                        <th>Destination Address</th>
                        <th>Disease</th>
                        <th>Ambulance Status</th>
                        <th>Status</th>
                       
                        
                        
                    </tr>
                </thead>
                <tbody>
                 <?php   while($row = $result->fetch_assoc()){
                   echo '<tr>';
                   echo '<th scope="row">'.$row['id'].'</th>';
                   echo  '<td>'.$row['first_name'].'</td>';
                   echo  '<td>'.$row['email'].'</td>';
                   echo  '<td>'.$row['mobile_no'].'</td>';
                   echo  '<td>'.$row['source_address'].'</td>';
                   echo  '<td>'.$row['destination_address'].'</td>';
                   echo  '<td>'.$row['note'].'</td>';

                   
                   echo  "<td>";
                   if($row['status']==1)
                   {
                    echo "<button class='custom-button'>Assigned</button>";
                   }else
                   {
                    echo "<button class='custom-button1'>Notassigned</button>";
                   }
                  "</td>";


                  echo  "<td>";
                  if($row['status']==1)
                  {
                   echo "<a href='notassigned.php?id=$row[id]'>
                  <button>DeActivate</button>
                  </a>";
                  }else
                  {
                   echo "<a href='assigned.php?id=$row[id]'>
                   <button>Activate</button>
                   </a>";
                  }
                 
               
                 "</td>";
                                               

                    '</tr>';
                     } ?>    
                </tbody>
            </table>
            <?php } else { echo "0 Result";}
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM bookings WHERE id={$_REQUEST['id']}";
               
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                }else{
                    echo "Unable to Delete Data";
                }
            }
           
            ?>
            <br>
            <a href="driverdashboard.php" class="btn4 btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>     
</body>
</html>