<?php
// Start the session
session_start();

// Retrieve meeting details from URL parameters
$child = $_GET['child'] ?? '';
$teacher = $_GET['teacher'] ?? '';
$date = $_GET['date'] ?? '';
$time = $_GET['time'] ?? '';
$message = $_GET['message'] ?? '';
$format = $_GET['format'] ?? '';

// Retrieve the username from the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Get the reply data from the form
    $replyData = $_POST['reply_data'] ?? '';

    // Append the retrieved meeting details to the reply message
    $replyMessage = "Meeting Details:\n";
    $replyMessage .= "Child: $child\n";
    $replyMessage .= "Date: $date\n";
    $replyMessage .= "Time: $time\n";
    $replyMessage .= "Message: $message\n";
    $replyMessage .= "Format: $format\n";
    $replyMessage .= "Reply: $replyData";

    // Create or load the XML file for scheduled meetings
    $xmlFilePath = "../XML/scheduledmeetings.xml";
    if (!file_exists($xmlFilePath)) {
        // Create a new XML structure if the file doesn't exist
        $xml = new SimpleXMLElement('<scheduledmeetings></scheduledmeetings>');
    } else {
        // Load existing XML data
        $xml = simplexml_load_file($xmlFilePath);
    }

    // Add meeting details as child elements
    $meeting = $xml->addChild('meeting');
    $meeting->addChild('child', $child);
    $meeting->addChild('teacher', $teacher);   
    $meeting->addChild('date', $date);
    $meeting->addChild('time', $time);
    $meeting->addChild('format', $format);
    $meeting->addChild('message', $replyMessage);

    // Save the updated XML
    $xml->asXML($xmlFilePath);

    // Redirect back to the meeting update page
    header("Location: ../Teacher/meetingupdate.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Meeting</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
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
    <a href="meet_appointment.php" class="return-button">&lt;</a>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><?php echo $username; ?></span>
        </div>
    </header>
    <div class="breadcrumb">
        Home > Meetings > Reply to Meeting
    </div>
    <main>
        <h2>Reply to Meeting</h2>
        <div class="meeting-details">
            <h3>Meeting Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Child</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th>Mode</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $child ?></td>
                        <td><?= $date ?></td>
                        <td><?= $time ?></td>
                        <td><?= $message ?></td>
                        <td><?= $format ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="reply-form">
                <h3>Reply</h3>
                <form id="meetingForm" action="" method="post">
                    <!-- Include reply form fields here -->
                    <textarea name="reply_data" rows="4" cols="50"><?php echo htmlspecialchars($message); ?></textarea>
                    <br>
                    <input type="submit" value="Send Reply">
                </form>

            </div>
        </div>
    </main>
</body>
</html>
