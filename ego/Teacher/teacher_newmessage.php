<?php
// Start the session
session_start();

// Retrieve the username from session variable
$username = $_SESSION['username']; // Assuming username is stored in session

// Define your recipient data here
$recipientData = array(
    'BSI/T-2A' => array('Parent 1 (Student 1)', 'Parent 2 (Student 2)', 'Parent 3 (Student 3)'),
    'BSI/T-2B' => array('Parent 4 (Student 4)', 'Parent 5 (Student 5)', 'Parent 6 (Student 6)'),
    'BSI/T-2C' => array('Jocelyn L. Sadiwa (Jessieca L. Sadiwa)', 'Pearl Joy C. Baradero (Mark Heindrich B. Loto)')
    // Add more recipients as needed
);
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
<div class="container1">
    <!-- Your new message form goes here -->
    <h1>New Message</h1>
    <form action="teacher_send_message.php" method="post">
        <label for="Section">Section:</label>
        <select id="Section" name="Section">
            <?php
            // Populate the dropdown menu with sections from recipient data
            foreach ($recipientData as $section => $recipients) {
                echo "<option value='" . $section . "'>" . $section . "</option>";
            }
            ?>
        </select><br><br>
        <label for="recipient">Recipient:</label>
        <select id="recipient" name="recipient">
            <!-- Recipient options will be populated dynamically based on the selected section -->
        </select><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="8" cols="50"></textarea><br><br>
        <input type="submit" value="Send Message">
    </form>
</div>
<!-- JavaScript to update recipient options -->
<script>
    document.getElementById('Section').addEventListener('change', function() {
        var section = this.value;
        var recipients = <?php echo json_encode($recipientData); ?>;
        var recipientSelect = document.getElementById('recipient');
        recipientSelect.innerHTML = ''; // Clear previous options
        recipients[section].forEach(function(recipient) {
            var option = document.createElement('option');
            option.value = recipient;
            option.text = recipient;
            recipientSelect.appendChild(option);
        });
    });
</script>
</body>
</html>
