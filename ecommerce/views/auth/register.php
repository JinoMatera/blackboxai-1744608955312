<?php
session_start();
require_once '../../includes/auth.php';

if (isLoggedIn()) {
    header('Location: ../../index.php?page=home');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    if (registerUser($email, $password, $firstName, $lastName)) {
        header('Location: ../../index.php?page=login');
        exit;
    } else {
        $error = "Registration failed. Email may already be taken.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="first_name" required placeholder="First Name">
        <input type="text" name="last_name" required placeholder="Last Name">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
