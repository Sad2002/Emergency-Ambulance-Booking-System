<?php
  @include 'config.php';
  $sql=( "UPDATE ambulancelist SET status=1 WHERE ambulance_id='$_GET[id]'");
  $conn = mysqli_connect('localhost','root','','user_db');
  mysqli_query($conn,$sql);
  header("location:ambulance.php");
  
  ?>


