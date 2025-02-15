<?php
session_start();
$conn = mysqli_connect('localhost','root','','user_db');
if(!isset($_SESSION["login_sess"])) 
{
    header("location:\project\login.php"); 
}

if($conn->connect_error){
    die("connection failed");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 
<div class="container mt-3">
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> Payment Paid Successfully.
    <a href="\project\home.php" class="btn1 btn-secondary">Close</a>
  </div>
</div>
 
</body>
</html>