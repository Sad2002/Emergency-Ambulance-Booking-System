<?php 
$conn = mysqli_connect('localhost','root','','user_db');
if($conn->connect_error){
    die("connection failed");
}
session_start();
session_destroy();
header('location:driverlogin.php');

?>