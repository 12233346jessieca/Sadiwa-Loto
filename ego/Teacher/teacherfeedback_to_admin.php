<?php
// Start the session
session_start();

// Notification message for new message received
$notification_message = "<div style='background-color: #3366cc; color: white; padding: 10px;'>
                            <h2 style='margin: 0;'>New Message Received</h2>
                        </div>";
$notification_message .= "<p>Hello " . $_SESSION['username'] . ",</p>";
$notification_message .= "<p>You have received a new message. Please check your inbox for details.</p>";
$notification_message .= "<p>Thank you!</p>";

// Display notification message
echo "<div style='margin: 20px auto; max-width: 600px;'>";
echo $notification_message;
echo "<a href='inbox.php' style='display: block; text-align: center; background-color: #3366cc; color: white; padding: 10px; margin-top: 20px; text-decoration: none;'>Go to Inbox</a>";
echo "</div>";
?>
