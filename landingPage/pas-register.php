<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Passenger Register page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <style>
        .error-message {
            display: none;
            color: red;
            font-size: 20px;
        }
    </style>

</head>
<body>
    <?php
        require_once "navbar.php";
        require_once "header.php";
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
            <h2 class="mt-3 mx-5 text-center">  Register</h2>

        <form action="../includes/pas-register.inc.php" method="POST">
            

            <label for="user_id" class="form-label text-dark mt-3">Username:</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="e.g John" required>
                <span class="error-message" id="username-error">Username should be in correct format</span>

            <label for="email_id" class="form-label text-dark mt-3">Email- address:</label>
                <input type="text" name="email_id" id="email_id" placeholder="e.g john@gmail.com"  class="form-control" required>
                <span class="error-message" id="email-error">Email should be in correct format
                   
                    </span>

                    <label for="password" class="form-label text-dark mt-3">Password:</label>
                    <input type="password" name="password" id="password"  class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                           placeholder="Enter Your Password">
                    <span class="error-message" id="password-error">Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>

            <label for="password_repeat" class="form-label text-dark mt-3">Confirm password:</label>
                    <input type="password" name="password_repeat" placeholder="Repeat Your Password" id="password_repeat" class="form-control" required>
                    <span class="error-message" id="password-repeat-error">Passwords do not match</span>

                <input type="submit" class="btn btn-primary mt-5 mx-5" value="SUBMIT" name="signup_submit" style="border-radius: 30px;">
                <input type="submit" class="btn btn-primary mt-5" value="RESET" style="border-radius:30px;">


        </form>  
        </div>
</div>  




<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the form and input fields
        var registerForm = document.querySelector("form");
        var emailInput = document.getElementById("email_id");
        var passwordInput = document.getElementById("password");
        var passwordRepeatInput = document.getElementById("password_repeat");

        // Get the error message spans
        var emailErrorSpan = document.getElementById("email-error");
        var passwordErrorSpan = document.getElementById("password-error");
        var passwordRepeatErrorSpan = document.getElementById("password-repeat-error");

        // Function to check if the email is in correct format
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Function to display error messages
        function showError(element, message) {
            element.textContent = message;
            element.style.display = "block";
        }

        // Function to hide error messages
        function hideError(element) {
            element.textContent = "";
            element.style.display = "none";
        }

        // Event listener for email input
        emailInput.addEventListener("input", function () {
            if (!isValidEmail(emailInput.value)) {
                showError(emailErrorSpan, "Invalid email format");
            } else {
                hideError(emailErrorSpan);
            }
        });

        // Event listener for password input
        passwordInput.addEventListener("input", function () {
            if (passwordInput.value.length < 8) {
                showError(passwordErrorSpan, "Password must be at least 8 characters long");
            } else {
                hideError(passwordErrorSpan);
            }
        });

        // Event listener for password repeat input
        passwordRepeatInput.addEventListener("input", function () {
            if (passwordInput.value !== passwordRepeatInput.value) {
                showError(passwordRepeatErrorSpan, "Passwords do not match");
            } else {
                hideError(passwordRepeatErrorSpan);
            }
        });

        // Event listener for form submission
        registerForm.addEventListener("submit", function (event) {
            // Check if email is already used
            var emailExists = false; // Placeholder, replace with your logic to check email existence
            if (emailExists) {
                event.preventDefault(); // Prevent form submission
                alert("Email is already used");
            } 
        });
    });
    
</script>
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