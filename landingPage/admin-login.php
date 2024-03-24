<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Passenger login page</title>
  	
<body>
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
   <?php
    require_once "./navbar.php";
    require_once "./header.php";
   
?>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <div class="row">
        <div class="col-lg-4"></div>

        <div class="col-lg-4">
            <h2 class="mt-3 mx-5 text-center"> Admin Login</h2>

           

            <form action="../includes/admin-login.inc.php" method="POST">

                <label for="user_id" class="form-label text-dark mt-3">Username or E-mail:</label>
                <input type="text" name="user_id" id="user_id" class="form-control" placeholder="e.g johndoe@gmail.com" required>
                <!-- <input type="text" name="user_id" id="user_id" placeholder="Enter your email/Username"  required> -->

                <label for="user_pass" class="form-label text-dark mt-3">Password:</label>
                <input type="password" name="user_pass" id="user_pass" class="form-control" minlength="4" maxlength="12" placeholder="e.g 12234@ke" required>
                <!-- <input type="password" name="user_pass" id="user_pass" placeholder="Enter your password"  required> -->

                <input type="submit" class="btn btn-primary mt-5 mx-5" value="SUBMIT" name="login_but" style="border-radius: 30px;">
                <input type="submit" class="btn btn-primary mt-5" value="RESET" style="margin-left: 250px; border-radius:30px;">

                <!-- <p class="text-dark my-5">Not registered? <a href="register.php">Register Today</a></p>     -->
        </form>
        </div>
    </div>

    <?php
        require_once "footer.php"
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