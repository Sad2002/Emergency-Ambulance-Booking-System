<?php
require_once 'config.php'; 
$conn = mysqli_connect('localhost','root','','user_db');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a random token
function generateToken() {
    return bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's email from the form
    $email = $_POST['email'];

    // Generate a unique token
    $token = generateToken();

    // Store the token and email in the database
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $sql = "INSERT INTO reset_tokens (email, token, expiration) VALUES ('$email', '$token', '$expiry')";
    $conn->query($sql);

    // Send an email to the user with the reset link
    $resetLink = "http://localhost/reset_password.php?email=$email&token=$token";
    $subject = "Password Reset";
    $message = "Click the following link to reset your password: $resetLink";
    mail($email, $subject, $message);

    echo "An email has been sent with instructions to reset your password.";
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="login_form">
                    <h2>Forgot Password</h2>
                    <form action="forgot_password.php" method="POST">
                        <div class="form-group">
                            <label class="label_txt">Email</label>
                            <input type="email" name="email" class="form-control" required="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-group-lg form_btn">Reset Password</button>
                    </form>
                    <p style="font-size: 14px;text-align: center;margin-top: 10px;"><a href="login.php" style="color: #00376b;">Login</a> </p>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
