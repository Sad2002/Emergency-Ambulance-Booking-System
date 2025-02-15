
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
$uploads_folder='../uploads'.$service_image;
move_uploaded_file($service_image_temp,$uploads_folder);

$sql = "INSERT INTO services(service_name,service_desc,service_img) VALUES('$service_name','$service_desc','$uploads_folder')";

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



<link rel="stylesheet" href="css/addservice.css?v=<?php echo time();?>">
<div class="service_form">
    <h2 class="text-center">Add Service Page</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="service_name">Service Name</label><br>
   <input type="text" class="form-control" id="service_name" name="service_name">
</div>
<div class="form-group">
    <label for="course_desc">Service Description</label><br>
    <textarea class="form-control" id="service_desc" name="service_desc" row=2></textarea>
</div><br>
<div class="form-group">
    <label for="course_desc">Service Image</label><br>
    <input type="file" class="form-control-file" id="service_img" name="service_img" row=2>
</div><br>
<div class="text-center">
    <button type="submit" class="btn btn-danger"
        id="serviceSubmitBtn" name="serviceSubmitBtn">Submit</button>
        <a href="service.php" class="btn1 btn-secondary">Close</a>
</div>
<?php if(isset($msg)){echo $msg;} ?>
</form>
</div>
</div>
