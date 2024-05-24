<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Function to load notifications from XML
function loadNotifications($xmlFilePath) {
    $notifications = [];
    if (file_exists($xmlFilePath)) {
        $xml = simplexml_load_file($xmlFilePath);
        foreach ($xml->notification as $notification) {
            $notificationData = [
                'message' => (string)$notification,
                'date' => (string)$notification['date'],
                'time' => (string)$notification['time']
            ];
            $notifications[] = $notificationData;
        }
    }
    return array_reverse($notifications);
}

$xmlFilePath = "../XML/teacher_notifications.xml";

// Retrieve the username from session variable
$username = $_SESSION['username'];

// Load notifications
$notifications = loadNotifications($xmlFilePath);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
    .notification-container {
        border: 2px solid gray;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #f7f7f7;
    }
    .notification-container p {
        margin: 0;
        line-height: 1.4;
        text-align: justify;
    }
    .notification-container .message {
        font-weight: bold;
    }

    .return-button {
    position: absolute;
    top: 20px;
    left: 20px;
    display: inline-block;
    padding: 10px;
    background-color: #800000; /* Maroon color */
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.return-button:hover {
    background-color: #660000; /* Darker maroon color on hover */
}


.back-icon {
    margin-right: 5px;
}

    
</style>
<body>
    <a href="teacher_dashboard.php" class="return-button">&lt;</a>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><p><?php echo $username; ?></p></span>
        </div>
    </header>
    <div class="breadcrumb">
        Home > Notification
        <br><br>
        <div class="notification">
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <div class="notification-container">
                        <div class="message">
                            <p><strong></strong> <?= $notification['message'] ?></p>
                        </div>
                        <p>Date: <?= $notification['date'] ?></p>
                        <p>Time: <?= $notification['time'] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No notifications available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

