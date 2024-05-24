<?php
// Start the session
session_start();

$username = $_SESSION['username'];
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
    <a href="teacher_newmessage.php" class="new-message-button">Write a New Message</a>

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
