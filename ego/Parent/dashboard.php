<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}

// Retrieve the username and user details from session variables
$username = $_SESSION['username']; // Assuming username is stored in session

// Check if children are set in session and get the first child's name and section
$firstChild = isset($_SESSION['children']) ? $_SESSION['children'][0]['name'] : null;
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
        Welcome back, <?php echo $username; ?>
    </div>
    <div class="box-container">
        <a href="notification.php" class="box1">
            <img src="../img/NOTIFICATION.png" width="100px" height="100px">
        </a>
        <a href="acadperformance.php" class="box2">
            <img src="../img/ACADEMIC PERFORMANCE.png" width="100px" height="100px">
        </a>
        <a href="meetingdashboard.php" class="box4">
            <img src="../img/MEETINGS.png" width="100px" height="100px">
        </a>
        <a href="feedback.php" class="box5">
            <img src="../img/FEEDBACKS.png" width="100px" height="100px">
        </a>
        <a href="user_profile.php" class="box6">
            <img src="../img/PROFILES.png" width="100px" height="100px">
        </a>
    </div>
</body>
</html>

