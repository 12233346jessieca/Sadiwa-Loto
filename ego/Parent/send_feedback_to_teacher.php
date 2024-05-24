<?php
// Start the session
session_start();

// Notification message for feedback submission
$notification_message = "<div style='background-color: maroon; color: white; padding: 10px;'>
                            <h2 style='margin: 0;'>Feedback Received</h2>
                        </div>";
$notification_message .= "<p>Hello " . $_SESSION['username'] . ",</p>";
$notification_message .= "<p>Thank you for providing your valuable feedback. Your input helps us improve our services and better meet your needs.</p>";
$notification_message .= "<p>We appreciate your time and effort in sharing your thoughts with us.</p>";

// Display notification message
echo "<div style='margin: 20px auto; max-width: 600px;'>";
echo $notification_message;
echo "<a href='dashboard.php' style='display: block; text-align: center; background-color: maroon; color: white; padding: 10px; margin-top: 20px; text-decoration: none;'>Return to Dashboard</a>";
echo "</div>";
?>
