<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the meeting details from the form
    $child = $_POST['child'] ?? '';
    $teacher = $_POST['teacher'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $message = $_POST['message'] ?? '';

    // Create or load the XML file
    $xmlFilePath = "../XML/meetings.xml";
    if (!file_exists($xmlFilePath)) {
        // Create a new XML structure
        $xml = new SimpleXMLElement('<meetings></meetings>');
    } else {
        // Load existing XML data
        $xml = simplexml_load_file($xmlFilePath);
    }

    // Add meeting details as child elements
    $meeting = $xml->addChild('meeting');
    $meeting->addChild('child', $child);
    $meeting->addChild('teacher', $teacher);
    $meeting->addChild('date', $date);
    $meeting->addChild('time', $time);
    $meeting->addChild('message', $message);

    // Save the updated XML
    $xml->asXML($xmlFilePath);

    // Redirect back to the schedule meeting page
    header("Location: meeting.php");
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
    <title>Schedule Meeting</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        /* Additional CSS for the form */
        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        select, input[type="date"], input[type="time"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 16px;
        }
    .header-content {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 50px;
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
</head>
<body>
    <a href="meetingdashboard.php" class="return-button">&lt;</a>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><?php echo $username; ?></span>
        </div>
    </header>
    <div class="breadcrumb">
        Home > Schedule Meeting
    </div>
    <div class="container2">
        <h1>Schedule Meeting</h1>
        <form id="meetingForm" action="../PHPCodes/meetinginfo_to_xml.php" method="post">
            <label for="child">Child:</label>
            <select id="child" name="child">
                <option value="Mark Heindrich B. Loto">Mark Heindrich B. Loto</option>
                <option value="Shaireen Dianne B. Loto">Shaireen Dianne B. Loto</option>
            </select>

            <label for="teacher">To:</label>
            <select id="teacher" name="teacher"></select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date">

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" min="08:00" max="16:00" step="1800">

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" cols="50"></textarea>

            <label for="format">Preferred Meeting Format:</label>
            <select id="format" name="format">
                <option value="face_to_face">Face-to-Face</option>
                <option value="gmeet">Google Meet</option>
            </select>

            <input type="submit" value="Send">
        </form>
    </div>

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

        // Function to validate form before submission
        document.getElementById('meetingForm').addEventListener('submit', function(event) {
            var dateInput = document.getElementById('date');
            var timeInput = document.getElementById('time');
            var messageInput = document.getElementById('message');

            // Check if date, time, and message are filled out
            if (dateInput.value === "" || timeInput.value === "" || messageInput.value === "") {
                alert("Please fill out all fields: Date, Time, and Message.");
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Check if selected date is not in the past
            var selectedDate = new Date(dateInput.value);
            var currentDate = new Date();
            currentDate.setHours(0, 0, 0, 0); // Set current date to midnight

            if (selectedDate <= currentDate) {
                alert("Selected date cannot be today or in the past.");
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Check if selected date is not Saturday or Sunday
            var dayOfWeek = selectedDate.getDay();
            if (dayOfWeek === 0 || dayOfWeek === 6) {
                alert("Selected date cannot be a Saturday or Sunday.");
                event.preventDefault(); // Prevent form submission
                return;
            }
        });

        // Set minimum date to tomorrow
        var today = new Date();
        today.setDate(today.getDate() + 1);
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        tomorrow = yyyy + '-' + mm + '-' + dd;
        document.getElementById("date").setAttribute("min", tomorrow);
    </script>
</body>
</html>
