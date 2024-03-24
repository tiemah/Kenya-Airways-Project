<?php
session_start();

if (isset($_POST['signup_submit'])) {
    require '../includes/dbconn.php';

    $username = $_POST['username'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    // Check for invalid email format
    if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../landingPage/pas-register.php?error=invalidemail');
        exit();
    }

    // Check if passwords match
    if ($password !== $password_repeat) {
        header('Location: ../landingPage/pas-register.php?error=pwdnotmatch');
        exit();
    }

    // Check if username already exists
    $username_sql = 'SELECT username FROM users WHERE username=?';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $username_sql)) {
        header('Location: ../landingPage/pas-register.php?error=sqlerror');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $username_check = mysqli_stmt_num_rows($stmt);
    if ($username_check > 0) {
        header('Location: ../landingPage/pas-register.php?error=usernameexists');
        exit();
    }

    // Check if email already exists
    $email_sql = 'SELECT email FROM users WHERE email=?';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $email_sql)) {
        header('Location: ../landingPage/pas-register.php?error=sqlerror');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $email_check = mysqli_stmt_num_rows($stmt);
    if ($email_check > 0) {
        header('Location: ../landingPage/pas-register.php?error=emailexists');
        exit();
    }

    // Insert new user
    $sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../landingPage/pas-register.php?error=sqlerror');
        exit();
    }

    $pwd_hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $email_id, $pwd_hash);
    mysqli_stmt_execute($stmt);

    // Redirect to login page with success message
    header('Location: ../landingPage/pas-login.php?signup=success');
    exit();
} else {
    // Redirect to registration page if signup_submit is not set
    header('Location: ../landingPage/pas-register.php');
    exit();
}
