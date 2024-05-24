<?php
// Start the session
session_start();

// Load the XML file for scheduled meetings
$xmlFilePath = "../XML/scheduled_meetings.xml";
if (file_exists($xmlFilePath)) {
    $xml = simplexml_load_file($xmlFilePath);
    $meetings = [];
    foreach ($xml->meeting as $meeting) {
        $meetings[] = [
            'child' => (string)$meeting->child,
            'teacher' => (string)$meeting->teacher,
            'date' => (string)$meeting->date,
            'time' => (string)$meeting->time,
            'message' => (string)$meeting->message
        ];
    }
} else {
    $meetings = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduled Meetings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="dashboard-header">
        <div class="header-content">
            <h1>Scheduled Meetings</h1>
        </div>
    </header>
    <div class="container">
        <h2>Scheduled Meetings</h2>
        <?php if (!empty($meetings)) : ?>
            <ul>
                <?php foreach ($meetings as $meeting) : ?>
                    <li>
                        <strong>Child:</strong> <?= $meeting['child'] ?><br>
                        <strong>Teacher:</strong> <?= $meeting['teacher'] ?><br>
                        <strong>Date:</strong> <?= $meeting['date'] ?><br>
                        <strong>Time:</strong> <?= $meeting['time'] ?><br>
                        <strong>Message:</strong> <?= $meeting['message'] ?><br>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No scheduled meetings.</p>
        <?php endif; ?>
    </div>
</body>
</html>
