<?php
// Start the session
session_start();

// Define the predefined email and password
$correct_email = "wilmerpascual@gmail.com";
$correct_password = "wilmer1234";

$xmlFilePath = "../XML/teacher_login.xml";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the entered email and password match the predefined values
    if ($email === $correct_email && $password === $correct_password) {

        // Set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = "Wilmer M. Pascual";
        $_SESSION['role'] = "Teacher"; // Adding a role for the teacher

        // Check if the directory for XML files exists, if not, create it
        if (!file_exists(dirname($xmlFilePath))) {
            mkdir(dirname($xmlFilePath), 0777, true); // Creates directory recursively with full permissions
        }

        // Create or load the XML file for logins
        if (!file_exists($xmlFilePath)) {
            // Create a new XML structure if the file doesn't exist
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><logins></logins>');
        } else {
            // Load existing XML data
            $xml = simplexml_load_file($xmlFilePath);
        }

        // Add the username and role as a login entry
        $login = $xml->addChild('login');
        $login->addChild('username', $email); // Using entered email as username
        $login->addChild('role', 'Teacher'); // Adding the role as "teacher"
        $xml->asXML($xmlFilePath);

        // Redirect to the dashboard page
        header("Location: teacher_dashboard.php");
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
    <title>Online Parent-Teacher Communication Portal</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="container">
        <h1>Online Parent-Teacher Communication Portal</h1>
        <form action="teacher_dashboard.php" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="wilmerpascual@gmail.com">
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Enter your password" value="wilmer1234">
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            <input type="submit" value="Login" class="login-button">
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var icon = document.querySelector(".toggle-password i");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
