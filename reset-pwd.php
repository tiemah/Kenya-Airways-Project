<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Pasword reset</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container" style="margin-top: 50px;">
        <div class="legend">
            <img src="images/airtic.png" alt="Plane Image">
        </div>
        <h2>RESET PASSWORD</h2> 
        <div class="text-center mb-0" 
            style="margin-left: 60px; margin-right:60px;" role="alert">   
            An email will be send to you with instructions on how to reset your password.
        </div>
        <form action="includes/password-reset.inc.php" method="POST">            
                <div>
                    <input type="text" name="user_email" 
                        placeholder="Enter your Email" class="form-input" required>
                </div>
            <div class="row mt-3 text-center">
                <div class="col">
                        <button name="reset-req-submit" type="submit" class="btn btn-success mt-3">
                        <div style="font-size: 1.5rem;">
                            <i class="fa fa-lg fa-arrow-right"></i> Submit
                        </div>
                        </button>
                    </div>
             </div>
      </form>                          
</div>
<?php
if(isset($_GET['err']) || isset($_GET['mail'])) {
    if(isset($_GET['err']) && $_GET['err'] === 'invalidemail') {
        echo '<script>alert("Invalid email");</script>';
    } else if(isset($_GET['err']) && $_GET['err'] === 'sqlerr') {
        echo '<script>alert("An error occurred while processing your request. Please try again later.");</script>';        
    } else if(isset($_GET['mail']) && $_GET['mail'] === 'success') {
        echo '<script>alert("Email has been successfully sent to you");</script>';        
    } else if(isset($_GET['err']) && $_GET['err'] === 'mailerr') {
        echo '<script>alert("An error occurred while sending the email. Please contact support.");</script>';        
    } else {
        // Log the contents of $_GET for debugging
        echo '<script>console.log(' . json_encode($_GET) . ');</script>';
    }                    
}

?>
</body>

