<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $child = $_POST['child'] ?? '';
    $teacher = $_POST['teacher'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $message = $_POST['message'] ?? '';
    $format = $_POST['format'] ?? '';

    $xmlFilePath = "../XML/scheduledmeetings.xml";

    // Check if the XML file exists and has content
    if (file_exists($xmlFilePath) && filesize($xmlFilePath) > 0) {
        // Load existing XML data
        $xml = simplexml_load_file($xmlFilePath);
        if ($xml === false) {
            die('Error loading XML file');
        }
    } else {
        // Create a new XML structure if the file doesn't exist or is empty
        $xml = new SimpleXMLElement('<scheduledmeetings></scheduledmeetings>');
    }

    // Add meeting details as child elements
    $meeting = $xml->addChild('meeting');
    $meeting->addChild('child', $child);
    $meeting->addChild('teacher', $teacher);
    $meeting->addChild('date', $date);
    $meeting->addChild('time', $time);
    $meeting->addChild('message', $message);
    $meeting->addChild('format', $format);

    // Save the updated XML
    $result = $xml->asXML($xmlFilePath);
    if ($result === false) {
        die('Error saving XML file');
    }

    // Redirect to the appropriate page after scheduling the meeting
    header("Location: ../Teacher/meetingupdate.php");
    exit();
}
?>
