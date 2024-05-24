<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the meeting details from the form
    $child = $_POST['child'] ?? '';
    $teacher = $_POST['teacher'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $message = $_POST['message'] ?? '';

    $xmlFilePath = "../XML/meetings.xml";
    if (!file_exists($xmlFilePath)) {
        $xml = new SimpleXMLElement('<meetings></meetings>');
    } else {
 
        $xml = simplexml_load_file($xmlFilePath);
    }

    $meeting = $xml->addChild('meeting');
    $meeting->addChild('child', $child);
    $meeting->addChild('teacher', $teacher);
    $meeting->addChild('date', $date);
    $meeting->addChild('time', $time);
    $meeting->addChild('message', $message);

    $xml->asXML($xmlFilePath);

    header("Location: ../Parent/send_meetings.php");
    exit();
}
?>
