<?php
session_start();

// Function to load notifications from XML
function loadNotifications($xmlFilePath) {
    $notifications = [];
    if (file_exists($xmlFilePath)) {
        $xml = simplexml_load_file($xmlFilePath);
        foreach ($xml->notification as $notification) {
            $notificationData = [
                'message' => (string)$notification,
                'date' => (string)$notification['date'],
                'time' => (string)$notification['time'],
                'target' => (string)$notification['target']
            ];
            $notifications[] = $notificationData;
        }
    }
    return $notifications;
}

// Load notifications from teacher and parent XML files
$teacherNotifications = loadNotifications("../XML/teacher_notifications.xml");
$parentNotifications = loadNotifications("../XML/parent_notifications.xml");

// Merge and sort notifications by date and time
$notifications = array_merge($teacherNotifications, $parentNotifications);
usort($notifications, function($a, $b) {
    return strtotime($b['date'] . ' ' . $b['time']) - strtotime($a['date'] . ' ' . $a['time']);
});
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
    /* Global Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    header, footer {
        background-color: maroon;
        color: #fff;
        padding: 10px 20px;
    }

    header h1 {
        margin: 0;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    nav ul li {
        margin-right: 20px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
    }

    main {
        padding: 20px;
    }

    h2 {
        color: maroon;
    }

    .meetings {
        margin-top: 20px;
    }
    .notification {
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .notification table {
        width: 100%;
        border-collapse: collapse;
    }

    .notification th, .notification td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .notification th {
        background-color: #333;
        color: #fff;
    }

    .notification tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    .button {
        background-color: #4CAF50;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        text-decoration: none;
        color: white;
    }

    .button:hover {
        background-color: darkgreen;
    }

        /* Return button style */
    .return-button {
        position: absolute;
        top: 60px; /* Adjust as needed */
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
</style>
<body>
<header>
        <!-- Return button -->
<a href="admin_dashboard.php" class="return-button">&#171;&#171;&#171;</a>
    <h1>Admin Dashboard</h1>
</header>
<main>
    <h2>Notifications</h2>
    <div class="notification">
        <?php if (!empty($notifications)) : ?>
            <table>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                    <th>To</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($notifications as $notification) : ?>
                    <tr>
                        <td><?= $notification['date'] ?></td>
                        <td><?= $notification['time'] ?></td>
                        <td><?= $notification['message'] ?></td>
                        <td><?= $notification['target'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No notifications available.</p>
        <?php endif; ?>
    </div>
    <a href="admin_postnotif.php" class="button">Post a Notification</a>
</main>
</body>
</html>
