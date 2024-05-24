<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the username and user details from session variables
$username = $_SESSION['username']; // Assuming username is stored in session

// Check if children are set in session and get the first child's name and section
$firstChild = isset($_SESSION['children']) ? $_SESSION['children'][0]['name'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Performance</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
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
    <a href="dashboard.php" class="return-button">&lt;</a>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><?php echo $username; ?></span>
        </div>
    </header>
    <div class="breadcrumb">
        Home > Academic Performance
    </div>
<body>
    <div class="container3">
        <h1>LOTO, MARK HEINDRICH B. (BSIT-2C)</h1>
        <div class="box1">
            <h2>SUBJECTS ENROLLED (Second Semester)</h2>
            <ul>
                <li>Integrative Programming and Technologies</li>
                <li>Quantitative Methods</li>
                <li>Applications Development and Emerging Technologies</li>
            </ul>
        </div>
        <div class="box1">
            <h2>Attendance</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>2024-05-12</td>
                    <td>Present</td>
                </tr>
                <!-- Add more rows as needed -->
            </table>
        </div>
        <div class="box1">
            <h2>Full Schedule</h2>
            <table>
                <tr>
                    <th>CODES</th>
                    <th>SUBJECT TITLE</th>
                    <th>SECTION</th>
                    <th>SCHEDULE/ROOM</th>
                    <th>FACULTY</th>
                </tr>
                <tr>
                    <td>ITP09</td>
                    <td>Integrative Programming and Technologies</td>
                    <td>BSI/T-2C</td>
                    <td>W 1:30 PM - 4:30 PM</td>
                    <td>Wilmer Pascual</td>
                </tr>
                <tr>
                    <td>ITP07</td>
                    <td>Quantitative Methods</td>
                    <td>BSI/T-2C</td>
                    <td>Th 1:30 PM - 3:00 PM</td>
                    <td>Ivy Aguiflor</td>
                </tr>
                <tr>
                    <td>CC106</td>
                    <td>Applications Development and Emerging Technologies</td>
                    <td>BSI/T-2C</td>
                    <td>W 4:30 PM - 7:30 PM</td>
                    <td>Kierven Villaruel</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
