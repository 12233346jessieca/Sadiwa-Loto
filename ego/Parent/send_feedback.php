<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected recipient, academic progress, and classroom experience
    $recipient = $_POST['recipient'];
    $academic_progress = $_POST['academic_progress'];
    $classroom_experience = $_POST['classroom_experience'];

    // Check if the selected recipient, academic progress, and classroom experience are not empty
    if (!empty($recipient) && !empty($academic_progress) && !empty($classroom_experience)) {
        // Prepare the XML data
        $xml_data = simplexml_load_file("../XML/feedbackinfo.xml");

        // Create a new feedback entry
        $feedback = $xml_data->addChild('feedback');
        $feedback->addChild('child_name', $_SESSION['children'][0]['name']);
        $feedback->addChild('recipient', $recipient);
        $feedback->addChild('academic_progress', $academic_progress);
        $feedback->addChild('classroom_experience', $classroom_experience);

        // Save the updated XML file
        $xml_data->asXML("../XML/feedback.xml");

        // Redirect to the feedback display page
        header("Location: feedback_display.php");
        exit();
    } else {
        // If any of the fields are empty, display an error message
        echo "<p>Please fill in all fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Information</title>
</head>
<body>
    <h1>Feedback Information</h1>

    <div id="feedback-container">
        <?php
        // Load the XML file
        $xml = simplexml_load_file("feedbackinfo.xml");

        // Display the feedback information
        foreach ($xml->feedback as $feedback) {
            echo "<div class='feedback'>";
            echo "<p><strong>Child Name:</strong> " . $feedback->child_name . "</p>";
            echo "<p><strong>Recipient:</strong> " . $feedback->recipient . "</p>";
            echo "<p><strong>Academic Progress:</strong> " . $feedback->academic_progress . "</p>";
            echo "<p><strong>Classroom Experience:</strong> " . $feedback->classroom_experience . "</p>";
            echo "</div><br>";
        }
        ?>
    </div>
</body>
</html>
