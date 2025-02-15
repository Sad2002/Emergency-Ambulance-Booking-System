<?php
include('./admininclude/header.php');
@include 'config.php';
//update
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['service_id']=="")||($_REQUEST['service_name']=="")||($_REQUEST['service_desc']=="")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Fill All Fields</div>';
         } else{
        $sid = $_REQUEST['service_id'];    
        $sname = $_REQUEST['service_name'];
        $sdesc = $_REQUEST['service_desc'];
        $service_image= $_FILES['service_img']['name'];
         $service_image_temp= $_FILES['service_img']['tmp_name'];
         $uploads_folder='../uploads'.$service_image;
         move_uploaded_file($service_image_temp,$uploads_folder);

        
        $sql = "UPDATE services SET service_id='$sid',service_name='$sname',service_desc='$sdesc',service_img='$uploads_folder' WHERE service_id='$sid'";
        
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
    <h2 class="text-center">Update Service Page</h2>
 <?php
 if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM services WHERE service_id={$_REQUEST['id']}";
    $conn = mysqli_connect('localhost','root','','user_db');
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

 }
 
 ?>

<link rel="stylesheet" href="css/addservice.css?v=<?php echo time();?>">


<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
        
        <label for="service_id">Service ID</label>
   <input type="text" class="form-control" id="service_id" name="service_id" value="<?php if(isset($row['service_id'])){echo $row['service_id'];}?>"readonly>
</div>
    <div class="form-group">
         <label for="service_name">Service Name</label>
   <input type="text" class="form-control" id="service_name" name="service_name" value="<?php if(isset($row['service_name'])){echo $row['service_name'];}?>">
</div>
<div class="form-group">
    <label for="course_desc">Service Description</label>
    <textarea class="form-control" id="service_desc" name="service_desc" row=2><?php if(isset($row['service_desc'])){echo $row['service_desc'];}?> </textarea>
</div><br>
<div class="form-group">
    <label for="service_img">Service Image</label>
    <img src="<?php if(isset($row['service_img'])){echo $row['service_img'];}?>" alt="" class="img-thumbnail"><br>
    <input type="file" class="form-control-file" id="service_img" name="service_img" row=2>
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




