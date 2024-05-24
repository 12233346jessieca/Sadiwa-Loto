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
    $username = $_SESSION['username'];
    $meetings = array_reverse($meetings);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>

.container {
    max-width: 1200px;
    margin: 20px auto;
    display: flex;
    justify-content: space-between;
}

.meetings {
    flex: 1;
    padding: 20px;
    border-right: 1px solid #ccc;
}

.schedule-meeting {
    flex: 1;
    padding: 20px;
}

.schedule-meeting h2 {
    margin-top: 0;
}

a {
    display: block;
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #0056b3;
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
<a href="dashboard.php" class="return-button">&lt;</a>
<header class="dashboard-header">
    <div class="header-content">
        <span class="username"><p><?php echo $username; ?></p></span>
    </div>
</header>
<div class="breadcrumb">
    Home > Meetings 
</div>
    <div class="container">
        <div class="meetings">
            <?php
            // Include PHP code to display meetings
            include 'meetinglist.php';
            ?>
        </div>
        <div class="schedule-meeting">
            <h2>Schedule a Meeting</h2>
            <a href="meeting.php">Schedule Now</a>
        </div>
    </div>
</body>
</html>
