<?php
// Start the session
session_start();

// Load XML data
$xml = simplexml_load_file('../XML/teacher_login.xml');

// Define the predefined email and password
$correct_email = (string) $xml->correct_email;
$correct_password = (string) $xml->correct_password;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the entered email and password match the predefined values
    if ($email === $correct_email && $password === $correct_password) {
        // Set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = "Wilmer M. Pascual";


        // Redirect to the dashboard page
        header("Location: teacher_dashboard.php");
        exit(); // Make sure that code below this line doesn't get executed after redirection
    } else {
        // If credentials don't match, display an error message
        echo "<p>Incorrect email or password. Please try again.</p>";
    }
}


// Retrieve the username and user details from session variables
$username = $_SESSION['username']; // Assuming username is stored in session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Meeting Dashboard</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .meeting-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .meeting-table th,
        .meeting-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .meeting-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .meeting-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .meeting-table tbody tr:hover {
            background-color: #f2f2f2;
        }

        .toggle-pending {
            margin-top: 20px;
            text-align: center;
        }

        .toggle-pending button {
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .toggle-pending button:hover {
            background-color: darkgreen;
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
    <a href="teacher_dashboard.php" class="return-button">&lt;</a>
<header class="dashboard-header">
    <div class="header-content">
        <span class="username"><p><?php echo $username; ?></p></span>
    </div>
</header>
<div class="breadcrumb">
    Home > Meetings
</div>
    </header>
    <div class="container">
        <h2>Scheduled Meetings</h2>

                <div class="meetings">
                    <?php
                    // Include PHP code to display meetings
                    include '../Parent/meetinglist.php';
                    ?>
                </div>
        <div class="toggle-pending" id="toggle-pending">
            <button onclick="redirectToPending()">Show Pending Meetings</button>
        </div>
    </div>
    <script>
        function redirectToPending() {
            window.location.href = "meet_appointment.php";
        }
    </script>
</body>
</html>
