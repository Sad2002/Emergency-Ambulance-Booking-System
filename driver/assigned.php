<?php
  @include 'config.php';
  $sql=( "UPDATE bookings SET status=1 WHERE id='$_GET[id]'");
  $conn = mysqli_connect('localhost','root','','user_db');
  mysqli_query($conn,$sql);
  header("location:patientrequest.php");
  
  ?>


