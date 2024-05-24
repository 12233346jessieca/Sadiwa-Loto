<?php
// Start the session
session_start();
    $notification_message = "<div style='background-color: maroon; color: white; padding: 10px;'>
                                <h2 style='margin: 0;'>Notification Posted</h2>
                            </div>";
    $notification_message .= "<p>Hello " . $_SESSION['username'] . ",</p>";
    $notification_message .= "<p>Your notification has been successfully posted. Thank you for keeping everyone informed.</p>";

    // Display notification message
    echo "<div style='margin: 20px auto; max-width: 600px;'>";
    echo $notification_message;
    echo "<a href='admin_notifupdates.php' style='display: block; text-align: center; background-color: maroon; color: white; padding: 10px; margin-top: 20px; text-decoration: none;'>Return to Dashboard</a>";
    echo "</div>";

?>
