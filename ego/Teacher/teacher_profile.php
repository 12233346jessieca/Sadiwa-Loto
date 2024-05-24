<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the username and user details from session variables
$username = $_SESSION['username']; // Assuming username is stored in session
$role = $_SESSION['role'] ?? ''; // Assuming user role is stored in session
$email = $_SESSION['email'] ?? ''; // Assuming user email is stored in session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.header {
    background-color: maroon;
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
}

.header h1 {
    margin: 0;
}

.header ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.header ul li {
    display: inline;
    margin-left: 20px;
}

.header ul li a {
    text-decoration: none;
    color: white;
}

.main {
    padding: 20px;
}

.profile-box {
    background-color: #f7f7f7;
    text-align: center;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.profile-box h2 {
    margin-top: 0;
    text-align: center;
}

.profile-box p {
    margin-top: 5px;
    margin-bottom: 0;
    text-align: center;
}

</style>
<body>
    <div class="header">
        <div class="header-left">
            <h1>Profile</h1>
        </div>
        <div class="header-right">
            <ul>
                <li><a href="teacher_dashboard.php">Home</a></li>
                <li><a href="../index.php">Logout</a></li> <!-- Add logout functionality -->
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="profile-box">
            <h2>(<?php echo $username; ?>)</h2>
            <p>Teacher</p>
            <!-- Add more profile information as needed -->
        </div>
    </div>
</body>
</html>
