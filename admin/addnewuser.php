<?php
include('./admininclude/header.php');

@include 'config.php';
if(isset($_REQUEST['serviceSubmitBtn'])){
    
    if(($_REQUEST['service_name']=="")||($_REQUEST['service_desc']=="")){
$msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Fill All Fields</div>';
 } else{
$service_name = $_REQUEST['service_name'];
$service_desc = $_REQUEST['service_desc'];
$service_image= $_FILES['service_img']['name'];
$service_image_temp= $_FILES['service_img']['tmp_name'];
$upload_folder='../upload'.$service_image;
move_uploaded_file($service_image_temp,$upload_folder);

$sql = "INSERT INTO services(service_name,service_desc,service_img) VALUES('$service_name','$service_desc','$upload_folder')";

$conn = mysqli_connect('localhost','root','','user_db');
if($conn->query($sql)==TRUE){
    $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Services Added Successfully</div>';

} else{
    $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" >Unable to Add Service</div>';
}
}
    

}
?>
<html>




<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<div class="col-sm-6 mt-5 mx-3 jmbotron">
    <h3 class="text-center">Add New User Page</h3>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
   <input type="text" class="form-control" id="name" name="name">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <textarea class="form-control" id="email" name="email" row=2></textarea>
</div><br>
<div class="form-group">
    <label for="password">Password</label>
    <textarea class="form-control" id="password" name="password" row=2></textarea>
</div><br>

<div class="text-center">
    <button type="submit" class="btn btn-danger"
        id="newuserSubmitBtn" name="newuserSubmitBtn">Submit</button>
        <a href="user.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)){echo $msg;} ?>
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<style>

</html>