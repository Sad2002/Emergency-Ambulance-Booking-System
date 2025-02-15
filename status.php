<?php
include('connection.php');
$id=$_GET['id'];
$status=$_GET['status'];

$query="update ambulancelist SET status=$status where id=$id";
mysqli_query($conn,$query);
header('location:ambulancelist.php');


?>