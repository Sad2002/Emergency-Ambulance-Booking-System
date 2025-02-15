
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