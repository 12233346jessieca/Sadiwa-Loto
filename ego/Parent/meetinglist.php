<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meeting Schedule</title>
  <style>
    .meeting-container {
      width: 70%;
      margin: 20px auto;
      border: 2px solid #007bff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .meeting-header {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #007bff;
    }
    .meeting-details {
      margin-bottom: 10px;
    }
    .meeting-id {
      font-size: 16px;
      margin-bottom: 5px;
    }
    .meeting-message {
      font-size: 16px;
    }
  </style>
</head>
<body>

<?php
$xmlScheduledFilePath = "../XML/scheduledmeetings.xml";

if (file_exists($xmlScheduledFilePath) && filesize($xmlScheduledFilePath) > 0) {
    $xmlScheduled = simplexml_load_file($xmlScheduledFilePath);
    if ($xmlScheduled === false) {
        die('Error loading scheduled meetings XML file');
    }

    // Store meeting containers in an array to reverse their order
    $meetingContainers = [];

    foreach ($xmlScheduled->meeting as $scheduledMeeting) {
        // Extract meeting details
        $child = (string)$scheduledMeeting->child;
        $date = (string)$scheduledMeeting->date;
        $time = (string)$scheduledMeeting->time;
        $originalMessageParts = explode("Original Message:", (string)$scheduledMeeting->message);
        $originalMessage = isset($originalMessageParts[1]) ? $originalMessageParts[1] : '';
        $replyParts = explode("Reply:", (string)$scheduledMeeting->message);
        $reply = isset($replyParts[1]) ? $replyParts[1] : '';
        $format = (string)$scheduledMeeting->format; // Include the 'format' attribute

        // Create the meeting container HTML
        $meetingContainer = "<div class='meeting-container'>";
        $meetingContainer .= "<div class='meeting-header'>Meeting Appointment Notification</div>";
        $meetingContainer .= "<div class='meeting-details'>";
        $meetingContainer .= "<div class='meeting-id'><span style='font-size:20px;'>Child:</span> $child</div>";
        $meetingContainer .= "<div class='meeting-id'>Date: $date</div>";
        $meetingContainer .= "<div class='meeting-id'>Time: $time</div>";
        $meetingContainer .= "<div class='meeting-id'>Reply: $reply</div>";
        $meetingContainer .= "<div class='meeting-id'>Format: $format</div>"; // Display the 'format' attribute
        $meetingContainer .= "</div>";
        $meetingContainer .= "</div>";

        // Store the meeting container in the array
        $meetingContainers[] = $meetingContainer;
    }

    // Reverse the order of meeting containers
    $meetingContainers = array_reverse($meetingContainers);

    // Display the meeting containers
    foreach ($meetingContainers as $container) {
        echo $container;
    }
} else {
    echo "<p>No scheduled meetings found.</p>";
}
?>

</body>
</html>
