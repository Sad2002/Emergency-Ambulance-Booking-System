
<?php
include('./admininclude/header.php');

@include 'config.php';
if(isset($_REQUEST['aboutusSubmitBtn'])){
    
    if(($_REQUEST['aboutus_title']=="")||($_REQUEST['aboutus_desc']=="")){
$msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Fill All Fields</div>';
 } else{
$aboutus_title = $_REQUEST['aboutus_title'];
$aboutus_desc = $_REQUEST['aboutus_desc'];
$aboutus_image= $_FILES['aboutus_img']['name'];
$image_temp= $_FILES['aboutus_img']['tmp_name'];
$uploads_folder='../uploads'.$aboutus_image;
move_uploaded_file($image_temp,$uploads_folder);

$sql = "INSERT INTO aboutus(aboutus_title ,aboutus_desc,aboutus_img) VALUES('$aboutus_title','$aboutus_desc','$uploads_folder')";

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
    <h2 class="text-center">Add banner Page</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="aboutus_title">title</label><br>
   <input type="text" class="form-control" id="aboutus_title" name="aboutus_title">
</div>
<div class="form-group">
    <label for="course desc"> Description</label><br>
    <textarea class="form-control" id="aboutus_desc" name="aboutus_desc" row=2></textarea>
</div><br>
<div class="form-group">
    <label for="course_desc">Image</label><br>
    <input type="file" class="form-control-file" id="aboutus_img" name="aboutus_img" row=2>
</div><br>
<div class="text-center">
    <button type="submit" class="btn btn-danger"
        id="aboutusSubmitBtn" name="aboutusSubmitBtn">Submit</button>
        <a href="aboutus.php" class="btn1 btn-secondary">Close</a>



</div>
<?php if(isset($msg)){echo $msg;} ?>
</form>
</div>
</div>
