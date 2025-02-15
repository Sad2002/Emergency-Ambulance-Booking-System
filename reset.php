<?php
require_once("config.php");

if (isset($_GET["token"])) {
    $reset_token = $_GET["token"];

    // Check if the token is valid and not expired in your database
    // If valid, allow the user to reset the password
    // Example: Check if the token is in the database and not expired
    // If valid, display the password reset form
} else {
    echo "Invalid or expired reset token.";
    // You can provide a link back to the "Forgot Password" page.
}
?>
<!DOCTYPE html>
<head>
<title>Reset Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="login_form">
                <form action="reset_password.php" method="POST">
                    <div class="form-group">
                        <h2>Reset Password</h2><br>
                        <label class="label_txt">New Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <label class="label_txt">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <input type="hidden" name="token" value="<?php echo $reset_token; ?>">
                    <button type="submit" class="btn btn-primary btn-group-lg form_btn">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
