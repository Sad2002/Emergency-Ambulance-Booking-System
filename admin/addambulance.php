
<?php
include('./admininclude/header.php');

@include 'config.php';
if(isset($_REQUEST['serviceSubmitBtn'])){
    
    if(($_REQUEST['vehicleno']=="")||($_REQUEST['ambulancetype']=="")||($_REQUEST['drivername']=="")||
    ($_REQUEST['licenseno']=="")||  ($_REQUEST['city']=="")){
$msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Fill All Fields</div>';
 } else{
$vehicleno =$_REQUEST['vehicleno'];
$ambulancetype= $_REQUEST['ambulancetype'];
$drivername =$_REQUEST['drivername'];
$licenseno= $_REQUEST['licenseno'];
$city= $_REQUEST['city'];

$sql = "INSERT INTO ambulancelist(vehicleno,ambulancetype,drivername,licenseno,city) VALUES('$vehicleno','$ambulancetype','$drivername','$licenseno','$city')";

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

<body>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="stylesheet" href="css/addservice.css?v=<?php echo time();?>">
<div class="service_form">
    <h2 class="text-center">Add Ambulance Page</h2>
<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="vehicleno">Vehicleno</label><br>
   <input type="text" class="form-control" id="vehicleno" name="vehicleno">
</div>
<div class="form-group">
    <label for="ambulancetype">Ambulancetype</label><br>
    <input type="text" class="form-control" id="ambulancetype" name="ambulancetype">
</div><br>
<div class="form-group">
    <label for="drivername">Drivername</label><br>
    <input type="text" class="form-control-file" id="drivername" name="drivername" row=2>
</div><br>
<div class="form-group">
    <label for="licenseno">Licenseno</label><br>
    <input type="text" class="form-control-file" id="licenseno" name="licenseno" row=2>
</div><br>
<div class="form-group">
    <label for="city">City</label><br>
    <input type="text" class="form-control-file" id="city" name="city" row=2>
</div><br>
<div class="text-center">
    <button type="submit" class="btn btn-danger"
        id="serviceSubmitBtn" name="serviceSubmitBtn">Submit</button>
        <a href="ambulance.php" class="btn1 btn-secondary">Close</a>
        </div>
<?php if(isset($msg)){echo $msg;} ?>
</form>
</div>
</div>


</body>
</html>
