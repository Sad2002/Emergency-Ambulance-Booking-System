
 <?php
session_start();
$conn = mysqli_connect('localhost','root','','user_db');


if($conn->connect_error){
    die("connection failed");
}
//else{
    //echo"connected";
//}
?>

<!DOCTYPE html>
<head>
<title> Login </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="driver.css?v=<?php echo time();?>">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
    <img style="float:right;margin:0px 0px 10px 15px;"src="ambulancelogo.png" height="80"/>
			<div class="login_form">
 	<form action="loginprocess.php" method="POST">
  <div class="form-group">
 <h2>Driver Login</h2><br>

 <style>
  .error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
    
  }
</style>
<?php 
if(isset($_GET['loginerror'])) {
	$loginerror=$_GET['loginerror'];
}
 if(!empty($loginerror)){  echo '<p class="error-message">Invalid login credentials, Please Try Again..</p>'; } ?>

    <label class="label_txt">Username or Email </label>
    <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">Password </label>
    <input type="password" name="password" class="form-control" required="">
  </div><br>
  <button type="submit" name="sublogin" class="btn btn-primary btn-group-lg form_btn">Login</button>
</form>
<p>Don't have an account? <a href="driversignup.php">Sign up</a> </p>
  </div>
		<div class="col-sm-4">
		</div>
		</div>
	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>