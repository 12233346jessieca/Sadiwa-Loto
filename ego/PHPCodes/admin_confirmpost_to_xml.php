<?php
// Start the session
session_start();

// Function to save notification to XML file
function saveNotification($message, $date, $time, $target, $xmlFilePath) {
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
    // Add date, time, and target attributes
    $notification->addAttribute('date', $date);
    $notification->addAttribute('time', $time);
    $notification->addAttribute('target', $target);

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
        saveNotification($message, $date, $time, $target, "../XML/teacher_notifications.xml");
    } elseif ($target === 'parent') {
        saveNotification($message, $date, $time, $target, "../XML/parent_notifications.xml");
    } elseif ($target === 'both') {
        saveNotification($message, $date, $time, 'teacher', "../XML/teacher_notifications.xml");
        saveNotification($message, $date, $time, 'parent', "../XML/parent_notifications.xml");
    }

    // Redirect back to the meeting scheduling page
    header("Location: ../Admin/admin_confirmpost.php");
    exit();
}

// Retrieve the username and user details from session variables
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
?>
