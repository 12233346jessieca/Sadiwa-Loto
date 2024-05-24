<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $child = $_POST['child'] ?? '';
    $teacher = $_POST['teacher'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $message = $_POST['message'] ?? '';
    $format = $_POST['format'] ?? '';

    $xmlFilePath = "../XML/meetings.xml";

    if (file_exists($xmlFilePath) && filesize($xmlFilePath) > 0) {
        $xml = simplexml_load_file($xmlFilePath);
        if ($xml === false) {
            die('Error loading XML file');
        }
    } else {
        $xml = new SimpleXMLElement('<meetings></meetings>');
    }

    $meeting = $xml->addChild('meeting');
    $meeting->addChild('child', $child);
    $meeting->addChild('teacher', $teacher);
    $meeting->addChild('date', $date);
    $meeting->addChild('time', $time);
    $meeting->addChild('message', $message);
    $meeting->addChild('format', $format);

    $result = $xml->asXML($xmlFilePath);
    if ($result === false) {
        die('Error saving XML file');
    }

    header("Location: ../Parent/send_meeting_to_teacher.php");
    exit();
}
?>
