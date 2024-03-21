<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidcred') {
        echo '<script>alert("Invalid Credentials")</script>';
    } else if($_GET['error'] === 'wrongpwd') {
        echo '<script>alert("Wrong Password")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Passenger login page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container" id="login">
        <h1 style="color:white;" class="mt-3">SIGN IN</h1> 
        <form action="includes/pas-login.inc.php" method="POST">
            <div class="form-row">
                   
                    <div class="input-text">  
                        <div class="input-group">
                            <label for="user_id">Username/ Email:</label>
                            <input type="text" name="user_id" id="user_id" placeholder="Enter your email/Username"  required>
                        </div>
                    
                        <div class="input-group">
                            <label for="user_pass">Password:</label>
                            <input type="password" name="user_pass" id="user_pass" placeholder="Enter your password"  required>
                        </div>
                    </div>
            </div>

                <!-- <div class="row mt-3">
                    <div class="col">
                    <a id="reset-pass" class="mr-5" href="reset-pwd.php"
                        style="float: left !important;">Reset Password</a>        
                    </div>         
                </div>  -->

                <div class="row mt-4">
                 

                    <div class="col text-center">
                        <button name="login_but" type="submit" class="btn btn-success mt-3">
                        <div style="font-size: 1.5 rem;">
                            <i class="fa fa-lg fa-arrow-right"></i> Login
                        </div>
                        </button>
                    </div>
                 </div>
                 <div class="col d-inline-flex flex-row mt-3 mb-0 ">
                 <h6>don't have an account?</h6>
                        <a href="pas-register.php">REGISTER
                        </a> 
                    </div>
        </form> 
<div class="col-md-3"></div>             
</div> 
</body>