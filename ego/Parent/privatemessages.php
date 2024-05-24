<?php
// Start the session
session_start();

// Define the predefined email and password
$correct_email = "Pearljoybaradero@gmail.com";
$correct_password = "Pearl1234";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the entered email and password match the predefined values
    if ($email === $correct_email && $password === $correct_password) {
        // Set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = "Pearl Joy Baradero";
        $_SESSION['children'] = array(
            array(
                "name" => "Mark Heindrich B. Loto - BSI/T-2C",
                "teachers" => array("Wilmer Pascual", "Ivy Aguiflor", "Kierven Villaruel")
            ),
            array(
                "name" => "Shaireen Dianne B. Loto - BSBA-2B",
                "teachers" => array("Teacher 1", "Teacher 2", "Teacher 3")
            )
        );

        // Redirect to the dashboard page
        header("Location: dashboard.php");
        exit(); // Make sure that code below this line doesn't get executed after redirection
    } else {
        // If credentials don't match, display an error message
        echo "<p>Incorrect email or password. Please try again.</p>";
    }
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
    <title>Messages</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><?php echo $username; ?></span>
        </div>
    </header>
    <div class="breadcrumb">
        Home > Messages
    </div>
    <div class="container1">
        <h1>Messages</h1>
        <div class="messages-options">
            <button onclick="showMessages('private')">Private Messages</button>
            <button onclick="showMessages('community')">Community Messages</button>
        </div>
        
        <!-- Child Selection Dropdown -->
        <div class="child-select">
            <label for="child">Select Child:</label>
            <select id="child" name="child" style="width: 300px;">
                <?php
                foreach ($_SESSION['children'] as $child) {
                    echo "<option value='" . $child['name'] . "'>" . $child['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        
        <!-- Message Sections -->
        <div id="private-messages" class="message-container">
            <h2>Private Messages</h2>
            <div class="message sent">
                <p>This is a private message sent by you.</p>
            </div>
            <div class="message received">
                <p>This is a private message received from another user.</p>
            </div>
        </div>
        
        <div id="community-messages" class="message-container" style="display: none;">
            <h2>Community Messages</h2>
            <div class="message sent">
                <p>This is a community message sent by you.</p>
            </div>
            <div class="message received">
                <p>This is a community message received from another user.</p>
            </div>
        </div>
    </div>

    <!-- "Write a new message" feature -->
    <a href="../Parent/new.message.php" class="new-message-button">Write a New Message</a>

    <script>
        function showMessages(type) {
            var privateMessages = document.getElementById('private-messages');
            var communityMessages = document.getElementById('community-messages');

            if (type === 'private') {
                privateMessages.style.display = 'block';
                communityMessages.style.display = 'none';
            } else if (type === 'community') {
                privateMessages.style.display = 'none';
                communityMessages.style.display = 'block';
            }
        }
    </script>
</body>
</html>
