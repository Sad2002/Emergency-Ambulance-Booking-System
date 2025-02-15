
<?php
include('./mainInclude/header.php');
?>
<div class="heading" style="background:url(uploads/book2.jpg) no-repeat">
   <h1>Contact us</h1>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form</title>
    <style>
     
     body {
    font-family: Arial, sans-serif;
      
    background-color: white;
}

h2 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
      font-size: 28px;
}

form {
    max-width: 600px;
    height:550px;
    margin: 0 auto;
    margin-top:1cm;
    margin-bottom:5cm;
    background-color: #d3d3d3;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);



}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 16px; 

    
}

input[type="text"]
{
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
    
}


textarea {
    width: 100%;
    padding: 30px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: red;
    font-size: 14px;
}
    </style>
</head>


<body>
     
    <form action="phpmailer/index.php" method="post">
    <h2>Contact Form</h2><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <span class="error" id="nameError"></span>

        <br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>
        <span class="error" id="emailError"></span>

        <br><br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
        <span class="error" id="messageError"></span>

        <br><br>

        <input type="submit" value="submit" onclick="validateForm()">
    </form>

    <script>
        function validateForm() {
           
            document.getElementById('nameError').innerHTML = '';
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('messageError').innerHTML = '';

         
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;

           
            if (name.trim() === '') {
                document.getElementById('nameError').innerHTML = 'Name is required';
            }else if (!/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/.test(name)) {
                document.getElementById('nameError').innerHTML = 'Name must contain only letters';
            }

           
            if (email.trim() === '') {
                document.getElementById('emailError').innerHTML = 'Email is required';
            } else if (!validateEmail(email)) {
                document.getElementById('emailError').innerHTML = 'Invalid email format';
            }

            if (message.trim() === '') {
                document.getElementById('messageError').innerHTML = 'Message is required';
            }
        }

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
        
    </script>
</body>
</html>

<?php
include('./mainInclude/footer.php');
?>


