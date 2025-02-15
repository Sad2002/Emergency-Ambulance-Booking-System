<?php
include('./admininclude/header.php');
@include 'config.php';
//update
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['ambulance_id']=="")||($_REQUEST['vehicleno']=="")||($_REQUEST['ambulancetype']=="")||
    ($_REQUEST['drivername']=="")||($_REQUEST['city']=="")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Fill All Fields</div>';
         } else{
        $id = $_REQUEST['ambulance_id'];    
        $vehicleno = $_REQUEST['vehicleno'];
        $ambulancetype = $_REQUEST['ambulancetype'];
        $drivername= $_REQUEST['drivername'];
        $city= $_REQUEST['city'];
        
        $sql = "UPDATE ambulancelist SET ambulance_id='$id',vehicleno='$vehicleno',ambulancetype='$ambulancetype',drivername='$drivername',city='$city' WHERE ambulance_id='$id'";
        
        $conn = mysqli_connect('localhost','root','','user_db');
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Updated Successfully</div>';
        
        } else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" >Unable to Update</div>';
        }
        }
            
        
        }
        ?>






<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="col-sm-6 mt-5 mx-3 jmbotron">
    <h2 class="text-center">Update Ambulance Page</h2>
 <?php
 if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM ambulancelist WHERE ambulance_id={$_REQUEST['id']}";
    $conn = mysqli_connect('localhost','root','','user_db');
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

 }
 
 ?>

<link rel="stylesheet" href="css/addservice.css?v=<?php echo time();?>">


<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
        
        <label for="ambulance_id">Ambulance Id</label>
   <input type="text" class="form-control" id="ambulance_id" name="ambulance_id" value="<?php if(isset($row['ambulance_id'])){echo $row['ambulance_id'];}?>"readonly>
</div>
    <div class="form-group">
         <label for="vehicleno">Vehicle No</label>
   <input type="text" class="form-control" id="vehicleno" name="vehicleno" value="<?php if(isset($row['vehicleno'])){echo $row['vehicleno'];}?>">
</div>
<div class="form-group">
    <label for="course_desc">Ambulance Type</label>
    <textarea class="form-control" id="ambulancetype" name="ambulancetype" row=2><?php if(isset($row['ambulancetype'])){echo $row['ambulancetype'];}?> </textarea>
</div><br>
<div class="form-group">
    <label for="course_desc">Drivername</label>
    <textarea class="form-control" id="drivername" name="drivername" row=2><?php if(isset($row['drivername'])){echo $row['drivername'];}?> </textarea>
</div><br>
<div class="form-group">
    <label for="course_desc">City</label>
    <textarea class="form-control" id="city" name="city" row=2><?php if(isset($row['city'])){echo $row['city'];}?> </textarea>
</div><br>



<div class="text-center">
    <button type="submit" class="btn btn-danger"
        id="requpdate" name="requpdate">Update</button>
        <a href="service.php" class="btn1 btn-secondary">Close</a>
</div>
<?php if(isset($msg)){echo $msg;} ?>
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<style>




