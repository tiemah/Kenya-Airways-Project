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

<div class="container" id="register">
    <h1 style="color:white;" class="mt-3"> REGISTER</h1>
    <form action="includes/pas-register.inc.php" method="POST">
        <div class="form-row">
            <div class="input-text">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <span class="error-message" id="username-error">Username should be in correct format</span>
                </div>
                <div class="input-group">
                    <label for="email_id">Email:</label>
                    <input type="text" name="email_id" id="email_id" placeholder="Enter your Email" required>
                    
                    <?php
                    // if(isset($_GET['error']) && $_GET['error'] === 'emailexists') {
                    //     echo 'Email is already used ';
                    // }
                    ?>
                        
                    <span class="error-message" id="email-error">Email should be in correct format
                   
                    </span>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                           placeholder="Enter Your Password">
                    <span class="error-message" id="password-error">Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                </div>
                <div class="input-group">
                    <label for="password_repeat">Confirm password:</label>
                    <input type="password" name="password_repeat" placeholder="Repeat Your Password" id="password_repeat" required>
                    <span class="error-message" id="password-repeat-error">Passwords do not match</span>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="text-center">
                <button name="signup_submit" type="submit" id="bt"
                        class="btn btn-info mt-2">
                    <div style="font-size: 1.5rem;">
                        <i class="fa fa-lg fa-arrow-right"></i>Register
                    </div>
                </button>
            </div>
        </div>
    </form>
    <div class="col-md-3"></div>
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
</body>
</html>