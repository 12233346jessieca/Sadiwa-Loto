<?php
// Start the session
session_start();

// Load XML data
$xml = simplexml_load_file('../XML/teacher_login.xml');

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
        $_SESSION['username'] = "Wilmer M. Pascual";


        // Redirect to the dashboard page
        header("Location: teacher_dashboard.php");
        exit(); // Make sure that code below this line doesn't get executed after redirection
    } else {
        // If credentials don't match, display an error message
        echo "<p>Incorrect email or password. Please try again.</p>";
    }
}


// Retrieve the username and user details from session variables
$username = $_SESSION['username']; // Assuming username is stored in session

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<header class="dashboard-header">
    <div class="header-content">
        <span class="username"><p><?php echo $username; ?></p></span>
    </div>
</header>
<div class="breadcrumb">
    Home > Dashboard
</div>
<div class="welcome-message">
    <?php echo $username; ?>
</div>
<div class="box-container">
    <a href="teacher_notification.php" class="box1">
        <img src="../img/NOTIFICATION.png" width="100px" height="100px">
    </a>
    <a href="teacher_acadperformance.php" class="box2">
        <img src="../img/studentsacadperformance.png" width="100px" height="100px">
    </a>
    <a href="../Teacher/meetingdashboard.php" class="box4">
        <img src="../img/MEETINGS.png" width="100px" height="100px">
    </a>
    <a href="teacher_feedback.php" class="box5">
        <img src="../img/FEEDBACKS.png" width="100px" height="100px">
    </a>
    <a href="teacher_profile.php" class="box6">
        <img src="../img/PROFILES.png" width="100px" height="100px">
    </a>
</div>
</body>
</html>
