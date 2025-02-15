<?php
include('./admininclude/header.php');
@include 'config.php';
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
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<link rel="stylesheet" href="css/adminstyle.css?v=<?php echo time();?>">
<div class="scroll-container">
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                   <div class="col-sm-8"><h2>List of <b>Ambulance</b></h2></div><br>
                    <div class="col-sm-4">

                  <div class="button-1">
                   <a href ="addambulance.php">
                    <h4 style="color:white;">Add</h4></a>

                    
                    </div>
</div>
                </div>
            </div>
            <?php
            $sql ="SELECT * FROM ambulancelist";
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
                        <th>Status</th>
                        <th>options</th>
                        <th>Actions</th>
                        
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
                   
                   echo  "<td>";
                   if($row['status']==1)
                   {
                    echo "<button class='custom-button'>Available</button>";
                   }else
                   {
                    echo "<button class='custom-button1'>Unavailable</button>";
                   }
                  "</td>";


                  echo  "<td>";
                  if($row['status']==1)
                  {
                   echo "<a href='deactivate.php?id=$row[ambulance_id]'>
                  <button>DeActivate</button>
                  </a>";
                  }else
                  {
                   echo "<a href='activate.php?id=$row[ambulance_id]'>
                   <button>Activate</button>
                   </a>";
                  }
                 
               
                 "</td>";
                        
                   
                   
                
                   echo  '<td>';
                   echo '<form action="editambulance.php" method ="POST" >
                          <input type="hidden" name="id" value='.$row["ambulance_id"].'>
                  <button type="submit"  class="btn btn-info mr-3" name="view" value="View">
                   <i class="fa-solid fa-pen-to-square"></i>
                          </button>
                          </form>
                          

                          <form action="" method ="POST" >
                          <input type="hidden" name="id" value='.$row["ambulance_id"].'>
                          <button type="submit"  class="btn btn-info mr-3" name="delete" value="Delete">
                          <i class="fa fa-trash"></i>
                          </button>
                    </form>
                            </td>';
                    '</tr>';
                     } ?>    
                </tbody>
            </table>
            <?php } else { echo "0 Result";}
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM ambulancelist WHERE ambulance_id={$_REQUEST['id']}";
               
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                }else{
                    echo "Unable to Delete Data";
                }
            }
            
            ?>
            </div>
        </div>
    </div>
</div>     
</body>
</html>