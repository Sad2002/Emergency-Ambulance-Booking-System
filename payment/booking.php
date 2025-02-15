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
<style>
select{
  width:300px;
  height:35px;
  
}
select option{
  width:300px;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Booking Form</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
    <script>
    function validateForm() {
        var ambulancetype = $("#ambulancetype").val();
        var price = $("#price").val();
        var firstName = $("input[name=first_name]").val();
        var lastName = $("input[name=last_name]").val();
        var email = $("input[name=email]").val();
        var mobileNo = $("input[name=mobile_no]").val();
        var sourceAddress = $("textarea[name=source_address]").val();
        var destinationAddress = $("textarea[name=destination_address]").val();

        
        $(".error-message").remove();

        var isValid = true;

       
        if (ambulancetype === "") {
            $("#ambulancetype").after('<div class="error-message">Please enter Ambulance Type</div>');
            isValid = false;
        }

        if (price === "") {
            $("#price").after('<div class="error-message">Please enter Price</div>');
            isValid = false;
        }

        if (firstName === "") {
            $("input[name=first_name]").after('<div class="error-message">Please enter First Name</div>');
            isValid = false;
        }

       

        return isValid; 
    }

    
    $(document).ready(function () {
        $("form").submit(function () {
            return validateForm();
        });
    });
</script>

</head>
<body>
   
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
   <center> <h2 class="text-center">Ambulance Booking Form</h2></center>
 <?php
 if(isset($_REQUEST['book'])){
    $sql="SELECT * FROM ambulancelist WHERE ambulance_id={$_REQUEST['id']}";
    $conn = mysqli_connect('localhost','root','','user_db');
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

 }
 
 ?>

<link rel="stylesheet" href="style.css?v=<?php echo time();?>">


<form action="submit_form.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

    
<div class="form-group">
    <label for="course_desc">Ambulance Type</label>
    <select name="ambulancetype">
        <option>Basic Life Support Ambulance</option>
        <option>Advanced Life Support ambulance</option>
        <option>Patient Transport Ambulance</option>
        <option>Neonatal Ambulance</option>
        <option>Mortuary Ambulance</option>
        <option>Intensive Care Unit Ambulance</option>
        

</select>
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
    <input type="text" class="form-control" id="last_name" name="last_name"  required>
</div><br>
<div id="last_name-error"></div>
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
        <textarea name="source_address" required></textarea><br>
</div><br>
<div class="form-group">
        <label for="course_desc">Destination Address:</label>
        <textarea name="destination_address" required ></textarea><br>
</div><br>
<div class="form-group">
        <label for="course_desc">Patient Description:</label>
        <textarea name="note" required></textarea><br>
</div><br>
<input type="hidden" id="payee_name" value="Emergency Ambulance Booking System">
                <input type="hidden" id="description" value="Ambulance Booking">
                

                <button type="button" class="btn btn-primary" id="rzp-button1" onclick="pay_now()">Pay</button>
            </form>
        </div>
        </body>
</html>
       
      
    
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
    function pay_now() {
        
        
        var name = $("#payee_name").val();
        var amount = $("#price").val();
        var actual_amount = amount * 100;
        var description = $('#description').val();


        var formData = {
            'ambulancetype': $("#ambulancetype").val(),
            'price': amount,
            'first_name': $("input[name=first_name]").val(),
            'last_name': $("input[name=last_name]").val(),
            'email': $("input[name=email]").val(),
            'mobile_no': $("input[name=mobile_no]").val(),
            'source_address': $("textarea[name=source_address]").val(),
            'destination_address': $("textarea[name=destination_address]").val(),
            'note': $("textarea[name=note]").val(),
            'payment_description': description
        };

       
        $.ajax({
            url: 'submit_form.php', 
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data); 
            }
        });

      
        var options = {
            "key": "rzp_test_e1zLfoRhB2XPQm",
            "amount": actual_amount,
            "currency": "INR",
            "name": name,
            "description": description,
            "image": "razorpay.png",
            "handler": function (response) {
                console.log(response);
                $.ajax({
                    url: 'booking.php',
                    type: 'POST',
                    data: {
                        'payment_id': response.razorpay_payment_id,
                        'amount': actual_amount,
                        'name': name
                    },
                    success: function (data) {
                        console.log(data);
                        window.location.href = 'thank_you.php';
                    }
                });
            },
        };

        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response) {
           
            console.log(response);
        });

        document.getElementById('rzp-button1').onclick = function (e) {
            rzp1.open();
            e.preventDefault();
        }
    }
</script>
