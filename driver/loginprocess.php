<?php 

session_start();
$conn = mysqli_connect('localhost','root','','user_db');


if($conn->connect_error){
    die("connection failed");
}
//else{
    //echo"connected";
//}

if(isset($_POST['sublogin'])){ 
$login = $_POST['login_var'];
$password = $_POST['password'];
$query = "select * from driver where ( username ='$login' OR email = '$login')";
$res = mysqli_query($conn,$query);
$numRows = mysqli_num_rows($res);
if($numRows  == 1){
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password'])){
           $_SESSION["login_sess"]="1"; 
             $_SESSION["login_email"]= $row['email'];
  header("location:driverdashboard.php");
        }
        else{ 
     header("location:driverlogin.php?loginerror=".$login);
        }
    }
    else{
  header("location:driverlogin.php?loginerror=".$login);
    }
}
?>