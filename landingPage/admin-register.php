<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Passenger Register page</title>
  	<!-- <link href="../css/bootstrap.min.css" rel="stylesheet" >
	<link href="../css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
	<script src="../js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
<?php

    require_once "header.php";
    require_once "navbar.php";
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Invalid email")</script>';
    } else if($_GET['error'] === 'pwdnotmatch') {
        echo '<script>alert("Passwords do not match")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'usernameexists') {
        echo"<script>alert('Username already exists')</script>";
    } else if($_GET['error'] === 'emailexists') {
        echo"<script>alert('Email already exists')</script>";
    }
}
?>
 <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

<div class="row mt-5">
        <div class="col-lg-4"></div>

        <div class="col-lg-4">
            <h2 class="mt-3 mx-5 text-center"> Admin Register</h2>

        <form action="../includes/admin-register.inc.php" method="POST">
            

            <label for="user_id" class="form-label text-dark mt-3">Username:</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="e.g John" required>
                <!-- <input type="text" name="user_id" id="user_id" placeholder="Enter your email/Username"  required> -->

            <label for="email_id" class="form-label text-dark mt-3">Email- address:</label>
                <input type="text" name="email_id" id="email_id" placeholder="e.g john@gmail.com"  class="form-control" required>

            <label for="password" class="form-label text-dark mt-3">Password:</label>
                <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control"
                             placeholder="Enter Your Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

            <label for="password_repeat" class="form-label text-dark mt-3">Confirm password:</label>
                <input type="password" name="password_repeat" placeholder="Repeat Your Password" id="password_repeat" class="form-control" required>

                <input type="submit" class="btn btn-primary mt-5 mx-5" value="SUBMIT" name="signup_submit" style="border-radius: 30px;">
                <input type="submit" class="btn btn-primary mt-5" value="RESET" style="border-radius:30px;">


        </form>  
        </div>
</div>  
<?php
    require_once "footer.php";
?>
<!-- JavaScript Libraries -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./lib/wow/wow.min.js"></script>
    <script type="text/javascript" src="./lib/easing/easing.min.js"></script>
    <script type="text/javascript" src="./lib/waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="./lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="./lib/tempusdominus/js/moment.min.js"></script>
    <script type="text/javascript" src="./lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script type="text/javascript" src="./lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


</body>
</html>