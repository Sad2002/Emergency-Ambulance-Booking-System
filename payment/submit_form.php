<?php
session_start();
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $ambulancetype = $_POST['ambulancetype'];
    $price = $_POST['price'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $source_address = $_POST['source_address'];
    $destination_address = $_POST['destination_address'];
    $note = $_POST['note'];

    // Insert the form data into the booking table
    $sql = "INSERT INTO bookings(ambulancetype, price, first_name, last_name, email, mobile_no, source_address, destination_address, note) 
            VALUES ('$ambulancetype', '$price', '$first_name', '$last_name', '$email', '$mobile_no', '$source_address', '$destination_address', '$note')";

    if ($conn->query($sql) === TRUE) {
        echo 'Form data inserted successfully.';
    } else {
        echo 'Error inserting form data: ' . $conn->error;
    }
} else {
    echo 'Invalid request method.';
}

// Close the database connection
$conn->close();
?>
