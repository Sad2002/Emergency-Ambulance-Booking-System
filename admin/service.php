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

          
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                   <div class="col-sm-8"><h2>List of <b>Services</b></h2></div><br>
                    <div class="col-sm-4">

                  <div class="button-1">
                   <a href ="addservice.php">
                    <h4 style="color:white;">Add</h4></a>

                    
                    </div>
</div>
                </div>
            </div>
            <?php
            $sql ="SELECT * FROM services";
            $conn = mysqli_connect('localhost','root','','user_db');
            
            $result=$conn->query($sql);
            if($result->num_rows > 0)
            {
            
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serviceid</th>
                        <th>Name</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                 <?php   while($row = $result->fetch_assoc()){
                   echo '<tr>';
                   echo '<th scope="row">'.$row['service_id'].'</th>';
                   echo  '<td>'.$row['service_name'].'</td>';
                
                   echo  '<td>';
                   echo '<form action="editservice.php" method ="POST" >
                          <input type="hidden" name="id" value='.$row["service_id"].'>
                  <button type="submit"  class="btn btn-info mr-3" name="view" value="View">
                   <i class="fa-solid fa-pen-to-square"></i>
                          </button>
                          </form>
                          

                          <form action="" method ="POST" >
                          <input type="hidden" name="id" value='.$row["service_id"].'>
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
                $sql = "DELETE FROM services WHERE service_id={$_REQUEST['id']}";
               
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
</body>
</html>