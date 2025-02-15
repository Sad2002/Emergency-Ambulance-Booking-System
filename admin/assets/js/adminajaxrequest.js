//ajax call for admin login verification

function checkAdminLogin(){

var adminLogEmail = $("#adminLogemail").val();
var adminLogPass = $("#adminLogpass").val();
$.ajax({
url:"admin/admin.php",
method:"POST"
data:{
      checkLogemail:"checklogmail",
      adminLogEmail:adminLogEmail
      adminLogPass:adminLogPass,
},
success:function(data){
    if(data == 0){
        $("$status AdminLogMsg").html(
            '<small class="alert-danger">Invalid Email ID or Password !</small>'
        );
    }else if (data == 1){
        $("#status AdminLogMsg").html(
            '<small class="alert-success">Success Loading... !</small>'
        );
        setTimeout(()=>{
            window.location.href="home.php";
        },1000);
    }
    }
});
}




