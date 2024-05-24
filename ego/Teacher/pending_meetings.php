<?php
session_start();

$xmlFilePath = "../XML/meetings.xml";
$meetings = [];

if (file_exists($xmlFilePath)) {
    $xml = simplexml_load_file($xmlFilePath);
    foreach ($xml->meeting as $meeting) {
        $meetings[] = [
            'child' => (string)$meeting->child,
            'teacher' => (string)$meeting->teacher,
            'date' => (string)$meeting->date,
            'time' => (string)$meeting->time,
            'message' => (string)$meeting->message
        ];
    }
    // Reverse the order of meetings array
    $meetings = array_reverse($meetings);

    $username = $_SESSION['username']; // Assuming username is stored in session

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Appointments</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
h1 {
    margin: 0;
}

main {
    padding: 20px;
}

.meetings {
    display: flex;
    flex-direction: column; /* Stack containers vertically */
    align-items: center; /* Center containers horizontally */
}

.meeting-details {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 600px; /* Adjust the width of the meeting details container */
    transition: transform 0.3s ease;
    margin-bottom: 20px; /* Add space between meeting containers */
}

.meeting-details:hover {
    transform: translateY(-5px);
}

.meeting-details h3 {
    color: #333;
    margin-top: 0;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px; /* Add space between table rows */
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    max-width: 300px; /* Limit the width of table cells */
    overflow-wrap: break-word; /* Wrap long words within cells */
    word-wrap: break-word; /* Handle word breaks for older browsers */
}

th {
    background-color: #f2f2f2;
}

.button-container {
    text-align: center;
}

button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-right: 10px;
}

button:hover {
    background-color: #45a049;
}


</style>
<body>
<header class="dashboard-header">
    <div class="header-content">
        <span class="username"><p><?php echo $username; ?></p></span>
    </div>
</header>
<div class="breadcrumb">
    Home > Pending  Meetings
</div>
<main>
    <h2>Meeting Schedule</h2>
    <div class="meetings">
        <?php if (!empty($meetings)) : ?>
            <?php foreach ($meetings as $meeting) : ?>
                <div class="meeting-details">
                    <h3>Meeting Details</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Child</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $meeting['child'] ?></td>
                            <td><?= $meeting['teacher'] ?></td>
                            <td><?= $meeting['date'] ?></td>
                            <td><?= $meeting['time'] ?></td>
                            <td><?= $meeting['message'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="button-container">
                        <button onclick="location.href='savedmeetings.php';">Reply</button>
                        <button onclick="location.href='reschedule.php';">Reschedule Appointment</button>
                    </div>
                </div>
                <br> <!-- Add line break to separate meeting containers -->
            <?php endforeach; ?>
        <?php else : ?>
            <p>No meetings scheduled.</p>
        <?php endif; ?>
    </div>
</main>

</body>
</html>

