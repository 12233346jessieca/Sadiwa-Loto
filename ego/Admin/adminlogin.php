<?php
// Start the session
session_start();

// Define the predefined email and password
$correct_email = "Admin@gmail.com";
$correct_password = "Admin1234";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the entered email and password match the predefined values
    if ($email === $correct_email && $password === $correct_password) {
        // Set session variables
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = "Admin01";

        // Redirect to the dashboard page
        header("Location: admin_dashboard.php");
        exit(); // Make sure that code below this line doesn't get executed after redirection
    } else {
        // If credentials don't match, display an error message
        echo "<p>Incorrect email or password. Please try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: url('../img/mscentrance.jpg') center/cover fixed; /* Background image only for index.php */
}

.container {
    width: 400px;
    margin: 200px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    background: linear-gradient(to bottom right, #870000, #ff758c); /* Maroon gradient background */
    position: relative;
    z-index: 1;
}

h1 {
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    color: #333; /* Maroon color for text */
    padding: 20px;
    border-radius: 10px;
    margin-top: -80px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

h1:hover {
    background-color: rgba(255, 255, 255, 0.9); /* Lighter semi-transparent background on hover */
}

.input-group {
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.input-group input {
    width: calc(100% - 21px);
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #870000; /* Maroon border color */
    font-size: 16px;
    background-color: #f5f5f5; /* Light gray background for input */
    outline: none;
    transition: border-color 0.3s ease;
}

.input-group input:focus {
    border-color: #ff758c; /* Lighter maroon border color on focus */
}

.password-container {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

.login-button {
    width: 100%;
    padding: 10px;
    background-color: #870000; /* Maroon background color for login button */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-button:hover {
    background-color: #4b0000; /* Darker maroon color on hover */
}
</style>
<body>
    <div class="container">
        <h1>Admin Login</h1>
        <br>
        <form method="POST"> <!-- No need to specify action, it defaults to the current page -->
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="Admin@gmail.com">
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Enter your password" value="Admin1234">
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            <input type="submit" value="Login" class="login-button">
        </form>
    </div>
</body>
</html>
