<?php
include('./mainInclude/header.php');
@include 'config.php';
?>



<section class="packages">

   <h1 class="heading-title">Types of Ambulance</h1>

   <div class="box-container">

   <?php
      $sql = "SELECT * FROM services ";
      $result =$conn->query($sql);
      if($result->num_rows >0){
         while($row=$result->fetch_assoc()){
            $service_id=$row['service_id'];
            echo ' 
            <div class="box">
            <div class="image">
               <img src="'.str_replace('..','.',$row['service_img']).'" alt="">
            </div>
            <div class="content">
               <h3>'.$row['service_name'].'</h3>
               <p>'.$row['service_desc'].'</p>
               <a href="view.php?service_id='.$service_id.'" class="btn">book now</a>
            </div>
         </div>';
         }
       }
      
      
      ?>
         

</section>

<?php
include('./mainInclude/footer.php');
?>
