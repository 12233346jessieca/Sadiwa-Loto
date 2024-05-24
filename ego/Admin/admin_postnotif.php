<?php
// Start the session
session_start();

// Function to save notification to XML file
function saveNotification($message, $date, $time, $xmlFilePath) {
    // Create the XML file if it doesn't exist
    if (!file_exists($xmlFilePath)) {
        // Create a new XML structure
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><notifications></notifications>');
        // Save the initial XML content to the file
        $xml->asXML($xmlFilePath);
    }

    // Load the XML file
    $xml = simplexml_load_file($xmlFilePath);

    // Add the new notification message as a child element
    $notification = $xml->addChild('notification', $message);
    // Add date and time attributes
    $notification->addAttribute('date', $date);
    $notification->addAttribute('time', $time);

    // Save the updated XML
    $xml->asXML($xmlFilePath);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the message, date, time, and target from the form
    $message = $_POST['message'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $target = $_POST['target'] ?? '';

    // Check the target and save the notification accordingly
    if ($target === 'teacher') {
        saveNotification($message, $date, $time, "../XML/teacher_notifications.xml");
    } elseif ($target === 'parent') {
        saveNotification($message, $date, $time, "../XML/parent_notifications.xml");
    } elseif ($target === 'both') {
        saveNotification($message, $date, $time, "../XML/teacher_notifications.xml");
        saveNotification($message, $date, $time, "../XML/parent_notifications.xml");
    }

    // Redirect back to the meeting scheduling page
    header("Location: schedule_meeting.php");
    exit();
}

// Retrieve the username and user details from session variables
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Notification</title>
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

.header-content {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    height: 50px;
}

.username {
    margin-right: 20px;
}

.back-icon {
    margin-right: 5px;
}

    </style>
<body>
    <a href="admin_dashboard.php" class="return-button">&#171;&#171;&#171;</a>
    <header class="dashboard-header">
        <div class="header-content">
        </div>
    </header>
    <div class="breadcrumb">
        Admin Notification
    </div>
    <div class="container2">
        <h1>Post Notification</h1>
        <form action="../PHPCodes/admin_confirmpost_to_xml.php" method="post">
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
            
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" required><br><br>

            <label for="time">Time:</label><br>
            <input type="time" id="time" name="time" required><br><br>

            <label for="target">Post to:</label><br>
            <input type="radio" id="teacher" name="target" value="teacher" required>
            <label for="teacher">Teacher</label><br>
            <input type="radio" id="parent" name="target" value="parent">
            <label for="parent">Parent</label><br>
            <input type="radio" id="both" name="target" value="both">
            <label for="both">Both Teacher and Parent</label><br><br>

            <input type="submit" value="Post Notification">
        </form>
    </div>
</body>
</html>


