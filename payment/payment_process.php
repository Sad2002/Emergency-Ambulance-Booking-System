
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Booking Form</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body>
   
    <form action="submit_form.php" method="post">
       
        <?php

@include 'config.php';
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['ambulance_id']=="")||($_REQUEST['ambulancetype']=="")||
    ($_REQUEST['drivername']=="")||($_REQUEST['city']=="")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Fill All Fields</div>';
         } else{
        $id = $_REQUEST['ambulance_id'];    
      
        $ambulancetype = $_REQUEST['ambulancetype'];
        $drivername= $_REQUEST['drivername'];
        $city= $_REQUEST['city'];
        
        $sql = "UPDATE ambulancelist SET ambulance_id='$id',ambulancetype='$ambulancetype',drivername='$drivername',city='$city' WHERE ambulance_id='$id'";
        
        $conn = mysqli_connect('localhost','root','','user_db');
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" >Updated Successfully</div>';
        
        } else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" >Unable to Update</div>';
        }
        }
            
        
        }
        ?>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="form-group">
    <h2 class="text-center">Ambulance Booking Form</h2>
 <?php
 if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM ambulancelist WHERE ambulance_id={$_REQUEST['id']}";
    $conn = mysqli_connect('localhost','root','','user_db');
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

 }
 
 ?>

<link rel="stylesheet" href="style.css?v=<?php echo time();?>">


<form action="#" method="POST" enctype="multipart/form-data">

    
<div class="form-group">
    <label for="course_desc">Ambulance Type</label>
    <input type="text" class="form-control" id="ambulancetype" name="ambulancetype" value="<?php if(isset($row['ambulancetype'])){echo $row['ambulancetype'];}?>"readonly>
</div><br>

<div class="form-group">
    <label for="course_desc">Price</label>
    <input type="text" class="form-control" id="price" name="price"  value="<?php if(isset($row['price'])){echo $row['price'];}?> "readonly>
</div><br>

<div class="form-group">
    <label for="course_desc">First Name:</label>
    <input type="text" class="form-control" name="first_name"  required>
</div><br>
<div class="form-group">
    <label for="course_desc">Last Name:</label>
    <input type="text" class="form-control" name="last_name"  required>
</div><br>
<div class="form-group">
    <label for="course_desc">Email:</label>
    <input type="text" class="form-control" name="email"  required>
</div><br>

<div class="form-group">
    <label for="course_desc">Mobile No:</label>
    <input type="text" class="form-control" name="mobile_no"  required>
</div><br>


<div class="form-group">
        <label for="course_desc">Source Address:</label>
        <textarea name="source_address" ></textarea><br>
</div><br>
<div class="form-group">
        <label for="course_desc">Destination Address:</label>
        <textarea name="destination_address" ></textarea><br>
</div><br>
<div class="form-group">
        <label for="course_desc">Note:</label>
        <textarea name="note"></textarea><br>
</div><br>

<button type="button" class="btn btn-primary" id="rzp-button1" onclick="pay_now()">Pay</button>
    </form>
</body>
</html>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
    function pay_now(){
          //get the input from the form
          var name = $("#payee_name").val();
          var amount = $("#price").val();
          var actual_amount = amount*100;
     
          var description = $('#description').val();
          //var actual_amount = amount;
          var options = {
            "key": "rzp_test_e1zLfoRhB2XPQm", // Enter the Key ID generated from the Dashboard
            "amount": actual_amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": name,
            "description": description,
            "image": "razorpay.png",
            //"order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function (response){
                console.log(response);
                $.ajax({
 
                    url: 'payment_process.php',
                    'type': 'POST',
                    'data': {'payment_id':response.razorpay_payment_id,'amount':actual_amount,'name':name},
                    success:function(data){
                        console.log(data);
                      window.location.href = 'thank_you.php';
                    }
 
                });
                // alert(response.razorpay_payment_id);
                // alert(response.razorpay_order_id);
                // alert(response.razorpay_signature)
            },
             
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response){
                alert(response.error.code);
                alert(response.error.description);
                alert(response.error.source);
                alert(response.error.step);
                alert(response.error.reason);
                alert(response.error.metadata.order_id);
                alert(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }
    }
</script>




        

        