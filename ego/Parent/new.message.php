<?php
// Start the session
session_start();

// Retrieve the username and user details from session variables
$username = $_SESSION['username']; // Assuming username is stored in session

// Define your recipient data here
$recipientData = array(
    'Mark Heindrich B. Loto - BSI/T-2C' => array('Wilmer Pascual', 'Ivy Aguiflor', 'Kierven Villaruel'),
    'Shaireen Dianne B. Loto - BSBA-2B' => array('Teacher 1', 'Teacher 2', 'Teacher 3'),
    // Add more recipients as needed
);

// Check if children are set in session and get the first child's name
$firstChildName = isset($_SESSION['children'][0]['name']) ? $_SESSION['children'][0]['name'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><?php echo $username; ?></span>
        </div>
    </header>
    <div class="breadcrumb">
        Home > Messages > New Message
    </div>
    </div>
    <div class="container1">
        <!-- Your new message form goes here -->
        <h1>New Message</h1>
        <form action="send_message.php" method="post">
            <label for="child">Child:</label>
            <select id="child" name="child">
                <?php
                // Populate the dropdown menu with children from session data
                foreach ($_SESSION['children'] as $child) {
                    echo "<option value='" . $child['name'] . "'>" . $child['name'] . "</option>";
                }
                ?>
            </select><br><br>
            <label for="recipient">Recipient:</label>
            <select id="recipient" name="recipient">
                <!-- Recipient options will be populated dynamically based on the selected child -->
            </select><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="8" cols="50"></textarea><br><br> <!-- Adjusted rows for a bigger message box -->
            <input type="submit" value="Send Message">
        </form>
    </div>
    <!-- JavaScript to update recipient options -->
    <script>
        document.getElementById('child').addEventListener('change', function() {
            var childName = this.value;
            var recipients = <?php echo json_encode($recipientData); ?>;
            var recipientSelect = document.getElementById('recipient');
            recipientSelect.innerHTML = ''; // Clear previous options
            recipients[childName].forEach(function(recipient) {
                var option = document.createElement('option');
                option.value = recipient;
                option.text = recipient;
                recipientSelect.appendChild(option);
            });
        });
    </script>
</body>
</html>

