
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

</div>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<link rel="stylesheet" href="ambulancelist.css?v=<?php echo time();?>">
<style>
input[type=text] {border-style: solid;
padding:8px;
width:20cm ;
} 
.btn {
  padding: 8px 12px;
  background-color: #343a40; 
  color: #fff; 
  border: 1px solid #343a40; 
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
}


.btn:hover {
  background-color: #555; 
  border-color: #555; 
}
</style>  

<div class="container-lg">
    
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                  <div class="col-sm-8"><h2><b>Recommended Books</b></h2></div><br>
                  <div class="col-sm-8"><h2><b></b></h2></div><br>
                    <div class="col-sm-4">
                    <div class="container ">
    <form method="post">
        <input type="text" placeholder="Search Book" name="search">
        <button class="btn btn-dark btn-sm" name="submit">Search</button>
</div>
                  
</div>
              
            <br><a href="/project/home.php" class="btn4 btn-secondary">Back</a>  
            </form>
        </div>
    </div>
</div>     
</body>
</html>