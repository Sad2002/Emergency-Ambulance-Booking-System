<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
<title> SignUp </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" ></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="signup.css?v=<?php echo time();?>">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
  
     <div class="col-sm-4">
    </div>
  </div>
	<div class="row">
<?php 
 if(isset($_POST['signup'])){
  extract($_POST);
        if(strlen($fname) < 3) {
          $error['fname'] = 'Please enter First Name using 3 characters at least.';
      }

if(strlen($fname)>20){  
      $error['fname'] = 'First Name: Max length 20 Characters Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
            $error['fname'] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
        }    
if(strlen($lname)<3){ 
      $error['lname'] = 'Please enter Last Name using 3 charaters atleast.';
        }
if(strlen($lname)>20){  
      $error['lname'] = 'Last Name: Max length 20 Characters Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
            $error['lname'] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
              }    
      if(strlen($username)<3){   
            $error['username'] = 'Please enter Username using 3 charaters atleast.';
        }
  if(strlen($username)>50){ 
            $error['username'] = 'Username : Max length 50 Characters Not allowed';
        }
  if(!preg_match("/^[^0-9][a-z0-9]+([_-]?[a-z0-9])$/", $username)){
            $error['username'] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - myusername';
        }  
if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$email)){  
            $error['email'] = 'Invalid Email. Email should contains lowercase letter or special symbols @';
        }
   if($passwordConfirm ==''){
            $error['passwordConfirm'] = 'Please confirm the password.';
        }
        if($password != $passwordConfirm){
            $error['password'] = 'Passwords do not match.';
        }
          if(strlen($password)<5){ 
            $error['password'] = 'The password is 6 characters long.';
        }
        
         if(strlen($password)>20){ 
            $error['password'] = 'Password: Max length 20 Characters Not allowed';
        }
        if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]*$/", $password)) {
            $error['password']= 'Invalid Password. Password should conatins one uppercase letter,Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)!';
        }   

          $sql="select * from users where (username='$username' or email='$email');";
      $res=mysqli_query($conn,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

     if($username==$row['username'])
     {
           $error['username'] ='Username alredy Exists.';
          } 
       if($email==$row['email'])
       {
            $error['email'] ='Email alredy Exists.';
          } 
      }
         if(!isset($error)){ 
              $date=date('Y-m-d');
            $options = array("cost"=>4);
    $password = password_hash($password,PASSWORD_BCRYPT,$options);
            
            $result = mysqli_query($conn,"INSERT into users(fname,lname,username,email,password,date) values('$fname','$lname','$username','$email','$password','$date')");

           if($result)
    {
     $done=2; 
    }
    else{
      $error[] ='Failed : Something went wrong';
    }
 }
 } ?>

		 <div class="col-sm-4">
     
     

<style>
  .error-message {
    color: red;
    font-size: 13px;
    margin-top: 5px;
    margin-left:0.5cm;
  }
</style>
		</div>
		<div class="col-sm-4">
      <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
      <?php } else { ?>
       <div class="signup_form">
		<form action="" method="POST">
   <br> <h2>Registration Page</h2><br>


   <div class="form-group">
    <label class="label_txt">First Name</label>
    <input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
    <span class="error-message"><?php if(isset($error) && isset($error['fname'])){ echo $error['fname']; } ?></span>
</div>


  <div class="form-group">
    <label class="label_txt">Last Name</label>
    <input type="text" class="form-control" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
    <span class="error-message"><?php if(isset($error) && isset($error['lname'])){ echo $error['lname']; } ?></span>
</div>

<div class="form-group">
    <label class="label_txt">Username</label>
    <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="">
    <span class="error-message"><?php if(isset($error) && isset($error['username'])){ echo $error['username']; } ?></span>
</div>


<div class="form-group">
    <label class="label_txt">Email</label>
    <input type="text" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
    <span class="error-message"><?php if(isset($error) && isset($error['email'])){ echo $error['email']; } ?></span>
</div>


<div class="form-group">
    <label class="label_txt">Password</label>
    <input type="password" class="form-control" name="password" value="<?php if(isset($error)){ echo $_POST['password'];}?>" required="">
    <span class="error-message"><?php if(isset($error) && isset($error['password'])){ echo $error['password']; } ?></span>
</div>

<div class="form-group">
    <label class="label_txt">Confirm Password</label>
    <input type="password" class="form-control" name="passwordConfirm" value="<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>" required="">
    <span class="error-message"><?php if(isset($error) && isset($error['passwordConfirm'])){ echo $error['passwordConfirm']; } ?></span>
</div>


  <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</h5></button>
   <p>Have an account?  <a href="login.php">Log in</a> </p>
</form>
<?php } ?> 
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