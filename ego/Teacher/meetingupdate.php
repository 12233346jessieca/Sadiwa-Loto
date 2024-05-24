<?php
// Start the session
session_start();

// Retrieve meeting details from URL parameters
$date = $_GET['date'] ?? '';
$time = $_GET['time'] ?? '';
$child = $_GET['child'] ?? '';
$message = $_GET['message'] ?? '';

// Retrieve the username from the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Construct acceptance message
$acceptanceMessage = "<div style='background-color: maroon; color: white; padding: 10px;'>
                        <h2 style='margin: 0;'>Acceptance of Meeting Appointment</h2>
                      </div>";
$acceptanceMessage .= "<p>I hope this message finds you well.</p>";
$acceptanceMessage .= "<p>I am pleased to inform you that I accept the meeting appointment.</p>";
$acceptanceMessage .= "<p>I look forward to our discussion and collaboration during the meeting.</p>";
$acceptanceMessage .= "<p>Best regards,</p>";
$acceptanceMessage .= "<p>$username</p>"; // Replace [Your Name] with the sender's name

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceptance of Meeting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        p {
            margin-bottom: 10px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: maroon;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php echo $acceptanceMessage; ?>
        <a href="meetingdashboard.php" class="button">Return to Dashboard</a>
    </div>
</body>
</html>
