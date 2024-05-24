<?php
// Start the session
session_start();

// Load XML data
$xml = simplexml_load_file('../XML/parent_login.xml');

// Define the predefined email and password
$correct_email = (string) $xml->correct_email;
$correct_password = (string) $xml->correct_password;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the entered email and password match the predefined values
    if ($email === $correct_email && $password === $correct_password) {
        // Set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = "Pearl Joy Baradero";
        $_SESSION['children'] = array(
            array(
                "name" => "Mark Heindrich B. Loto - BSI/T-2C",
                "teachers" => (array) $xml->teachers->first_child->teacher
            ),
            array(
                "name" => "Shaireen Dianne B. Loto - BSBA-2B",
                "teachers" => (array) $xml->teachers->second_child->teacher
            )
        );

        // Redirect to the dashboard page
        header("Location: dashboard.php");
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
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="Pearljoybaradero@gmail.com">
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Enter your password" value="Pearl1234">
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

