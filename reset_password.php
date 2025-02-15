<?php
require_once("config.php");

$conn = mysqli_connect('localhost','root','','user_db');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email and token from the URL
$email = $_GET['email'];
$token = $_GET['token'];

// Check if the token is valid
$sql = "SELECT * FROM reset_tokens WHERE email='$email' AND token='$token' AND expiration > NOW()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Token is valid, allow the user to reset their password
    echo "Token is valid. Allow the user to reset their password.";

    // Add your password reset form here

    // After password reset, delete the token from the database
    $deleteSql = "DELETE FROM reset_tokens WHERE email='$email' AND token='$token'";
    $conn->query($deleteSql);
} else {
    echo "Invalid or expired token.";
}

// Close the database connection
$conn->close();


?>
