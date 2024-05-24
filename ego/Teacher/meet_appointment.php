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
            'message' => (string)$meeting->message,
            'format' => (string)$meeting->format
        ];
    }
    // Reverse the order of meetings array
    $meetings = array_reverse($meetings);

    $username = $_SESSION['username'];
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
    background-color: darkgreen;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
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


.back-icon {
    margin-right: 5px;
}

    </style>
<body>
    <a href="meetingdashboard.php" class="return-button">&lt;</a>
<header class="dashboard-header">
    <div class="header-content">
        <span class="username"><p><?php echo $username; ?></p></span>
    </div>
</header>
<div class="breadcrumb">
    Home > Meetings > Pending Meetings
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
                            <th>Teacher</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message</th>
                            <th>Mode</th> <!-- Add Format column -->

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $meeting['child'] ?></td>
                            <td><?= $meeting['teacher'] ?></td>
                            <td><?= $meeting['date'] ?></td>
                            <td><?= $meeting['time'] ?></td>
                            <td><?= $meeting['message'] ?></td>
                            <td><?= $meeting['format'] ?></td> <!-- Display Format -->
                        </tr>

                        </tbody>
                    </table>
                    <div class="button-container">
                        <button onclick="replyToMeeting('<?= $meeting['child'] ?>', '<?= $meeting['date'] ?>', '<?= $meeting['time'] ?>', '<?= $meeting['message'] ?>', '<?= $meeting['format'] ?>' );">Reply</button>

                    </div>
                </div>
                <br> <!-- Add line break to separate meeting containers -->
            <?php endforeach; ?>
        <?php else : ?>
            <p>No meetings scheduled.</p>
        <?php endif; ?>
    </div>
</main>
<script>
    function replyToMeeting(child, date, time, message, format) {
        window.location.href = 'reply.php?child=' + encodeURIComponent(child) + '&date=' + encodeURIComponent(date) + '&time=' + encodeURIComponent(time) + '&message=' + encodeURIComponent(message) + '&format=' + encodeURIComponent(format);
    }
</script>

</body>
</html>

