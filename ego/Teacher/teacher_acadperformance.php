
<?php
// Start the session
session_start();

// Load XML data
$xml = simplexml_load_file('../XML/teacher_login.xml');

// Define the predefined email and password
$correct_email = (string) $xml->correct_email;
$correct_password = (string) $xml->correct_password;

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Academic Performance</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
.notification-container {
    border: 2px solid gray;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    background-color: #f7f7f7;
}
.notification-container p {
    margin: 0;
    line-height: 1.4;
    text-align: justify;
}
.notification-container .message {
    font-weight: bold;
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

.header-content {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    height: 50px;
}

.username {
    margin-right: 20px;
}

.back-icon {
    margin-right: 5px;
}

    </style>
<body>
    <a href="teacher_dashboard.php" class="return-button">&lt;</a>
    <header class="dashboard-header">
        <div class="header-content">
            <span class="username"><?php echo $username; ?></span>
        </div>
    </header>
    <div class="breadcrumb">
        Home > Student's Academic Performance
    </div>
    <style type="text/css">
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.main1 {
    padding: 20px;
    text-align: center;
}

.table {
    display: inline-block;
    width: calc(33.33% - 20px);
    margin: 10px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-sizing: border-box;
}

.table h4 {
    margin: 0;
}
    </style>    
<body>
    <div class="header">
        <div class="header-left">
            <h1><?php echo $username; ?></h1>
        </div>
    </div>
    <div class="main1">
        <h2>STUDENTS ACADEMIC PERFORMANCE</h2>
        <h3>Integrative Programming</h3>
        <div class="table">
            <h4>BSIT-2A (27 students)</h4>
        </div>
        <div class="table">
            <h4>BSIT-2B (30 students)</h4>
        </div>
        <div class="table">
            <h4>BSIT-2C (29 students)</h4>
        </div>
        <div class="table">
            <h4>BSIT-2D (28 students)</h4>
        </div>
        <div class="table">
            <h4>BSIT-2E (29 students)</h4>
        </div>
        <div class="table">
            <h4>BSIT-2F (26 students)</h4>
        </div>
    </div>
</body>
</html>