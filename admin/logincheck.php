<?php

session_start();
@include 'config.php';


$db = mysqli_select_db($con, 'user_db');

if(isset($_POST['submit'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$sql = " select * from  admintable where user='$username' and pass='$password' ";
    $con = mysqli_connect('localhost','root','','user_db');
	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['user'] = $username;
			header('location:index.php');
		}else{
			echo "login failed";
			header('location:adminlogin.php');
		}

}


?>

