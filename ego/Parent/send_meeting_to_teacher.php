<?php
// Start the session
session_start();
    $notification_message = "<div style='background-color: maroon; color: white; padding: 10px;'>
                                <h2 style='margin: 0;'>Appointment Request Received</h2>
                            </div>";
    $notification_message .= "<p>Hello " . $_SESSION['username'] . ",</p>";
    $notification_message .= "<p>Thank you for your appointment request. Before confirming, we kindly ask you to wait in patience as we review our schedule. We'll reach out to you shortly to confirm the appointment details. Your understanding is greatly appreciated.</p>";

    // Display notification message
    echo "<div style='margin: 20px auto; max-width: 600px;'>";
    echo $notification_message;
    echo "<a href='dashboard.php' style='display: block; text-align: center; background-color: maroon; color: white; padding: 10px; margin-top: 20px; text-decoration: none;'>Return to Dashboard</a>";
    echo "</div>";

?>