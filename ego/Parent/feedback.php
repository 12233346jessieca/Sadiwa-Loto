<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the meeting details from the form
    $child = $_POST['child'] ?? '';
    $teacher = $_POST['teacher'] ?? '';
    $acadprogress = $_POST['acadprogress'] ?? '';
    $classroomexp = $_POST['classroomexp'] ?? '';


    // Create or load the XML file
    $xmlFilePath = "../XML/feedbacks.xml";
    if (!file_exists($xmlFilePath)) {
        // Create a new XML structure
        $xml = new SimpleXMLElement('<feedbacks></feedbacks>');
    } else {
        // Load existing XML data
        $xml = simplexml_load_file($xmlFilePath);
    }

    // Add meeting details as child elements
    $meeting = $xml->addChild('feedbacks');
    $meeting->addChild('child', $child);
    $meeting->addChild('teacher', $teacher);
    $meeting->addChild('acadprogress', $acadprogress);
    $meeting->addChild('classroomexp', $classroomexp);

    // Save the updated XML
    $xml->asXML($xmlFilePath);

    // Redirect back to the schedule meeting page
    header("Location: send_feedback_to_teacher.php");
    exit();
}

// Retrieve the username and user details from session variables
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";

// Check if children are set in session and get the first child
$firstChild = isset($_SESSION['children'][0]['name']) ? $_SESSION['children'][0]['name'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
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
</style>
<body>
    <a href="dashboard.php" class="return-button">&lt;</a>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><p><?php echo $username; ?></p></span>
        </div>
    </header>

    <div class="breadcrumb">
        Home > Feedback
    </div>

    <div class="container1">
        <!-- New message form -->
        <h1>New Message</h1>
        <form action="" method="post">
            <label for="child">Child:</label>
            <select id="child" name="child">
                <option value="Mark Heindrich B. Loto">Mark Heindrich B. Loto</option>
                <option value="Shaireen Dianne B. Loto">Shaireen Dianne B. Loto</option>
            </select><br><br>
            <label for="teacher">Recipient:</label>
            <select id="teacher" name="teacher">
                <!-- Recipient options will be populated dynamically based on the selected child -->
            </select><br><br>
            <div class="message-title">
                Child Academic Progress
            </div>
            <textarea name="acadprogress" class="big-input-box" placeholder="Please write your message"></textarea>
            <div class="message-title">
                Classroom Experience
            </div>
            <textarea name="classroomexp" class="big-input-box" placeholder="Please write your message"></textarea>

            <!-- Send button -->
            <input type="submit" value="Send Message">
        </form>
    </div>

    <!-- JavaScript to update recipient options -->
    <script>
        // Define the teacher options for each child
        var teacherOptions = {
            "Mark Heindrich B. Loto": ["Wilmer Pascual", "Ivy Aguiflor", "Kierven Villaruel"],
            "Shaireen Dianne B. Loto": ["Teacher 1", "Teacher 2", "Teacher 3"]
        };

        // Function to update the teacher options based on the selected child
        function updateTeachers() {
            var childSelect = document.getElementById('child');
            var teacherSelect = document.getElementById('teacher');
            var selectedChildName = childSelect.value;

            // Clear previous options
            teacherSelect.innerHTML = '';

            // Add new options based on the selected child
            var teachers = teacherOptions[selectedChildName];
            if (teachers) {
                teachers.forEach(function(teacher) {
                    var option = document.createElement('option');
                    option.text = teacher;
                    teacherSelect.add(option);
                });
            }
        }

        // Call the function initially to populate teachers based on the initial child
        updateTeachers();

        // Add event listener to child select to update teachers when the child selection changes
        document.getElementById('child').addEventListener('change', updateTeachers);
    </script>

</body>
</html>
