<!DOCTYPE html>
<html lang="en">
<head>
    <style>

        input[name="pay"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[name="pay"]:hover {
            background-color: #218838;
        }
    </style>
    <!-- Add the Razorpay script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

    <center>
        <h2>Booking Details</h2>

        <?php
        @include 'config.php';

        $ambulancetype = $_GET['ambulancetype'];
        $price = $_GET['price'];
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $source_address = $_GET['source_address'];
        $destination_address = $_GET['destination_address'];

        echo "<p>Ambulance Type: $ambulancetype</p>";
        echo "<p>Price: $price</p>";
        echo "<p>First Name: $first_name</p>";
        echo "<p>Last Name: $last_name</p>";
        echo "<p>Source Address: $source_address</p>";
        echo "<p>Destination Address: $destination_address</p>";
        ?><br><br>

        <!-- Razorpay payment button -->
        
            <input type="hidden" name="ambulancetype" value="<?php echo $ambulancetype; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <a href="javascript:void(0)">Buy Now</a>
        </form>
    </center>

    <script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

$(".buynow").click(function()
{

var amount=$(this).attr('data-amount');	
var productid=$(this).attr('data-productid');	
var productname=$(this).attr('data-productname');	
	
var options = {
    "key": "rzp_test_e1zLfoRhB2XPQm", 
    "amount": amount*100, 
    "name": "The Digital Oceans",
    "description": productname,
    "image": "https://example.com/your_logo",
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;
		
		$.ajax({
			url:"payment-process.php",
			type:"POST",
			data:{product_id:productid,payment_id:paymentid},
			success:function(finalresponse)
			{
				if(finalresponse=='done')
				{
					window.location.href="success.php";
				}
				else 
				{
					alert('Please check console.log to find error');
					console.log(finalresponse);
				}
			}
		})
        
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
 rzp1.open();
 e.preventDefault();
});

    </script>

</body>
</html>
