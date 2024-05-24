<?php
session_start();

$xmlFilePath = "../XML/meetings.xml";
$meetings = [];

if (file_exists($xmlFilePath)) {
    $xml = simplexml_load_file($xmlFilePath);
    foreach ($xml->meeting as $meeting) {
        $meetings[] = [
            'child' => (string)$meeting->child,
            'teacher' => (string)$meeting->teacher,
            'date' => (string)$meeting->date,
            'time' => (string)$meeting->time,
            'message' => (string)$meeting->message,
            'format' => (string)$meeting->format
        ];
    }
    
    // Reverse the meetings array
    $meetings = array_reverse($meetings);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
    /* Global Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    header, footer {
        background-color: maroon;
        color: #fff;
        padding: 10px 20px;
    }

    header h1 {
        margin: 0;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    nav ul li {
        margin-right: 20px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
    }

    main {
        padding: 20px;
    }

    h2 {
        color: maroon;
    }

    .meetings {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table th {
        background-color: #333;
        color: #fff;
    }

    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Return button style */
    .return-button {
        position: absolute;
        top: 60px; /* Adjust as needed */
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
    <!-- Return button -->
<a href="admin_dashboard.php" class="return-button">&#171;&#171;&#171;</a>


    <!-- Header -->
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <!-- Main content -->
    <main>
        <h2>Meeting Scheduling</h2>
        <div class="meetings">
            <?php if (!empty($meetings)) : ?>
                <table>
                <thead>
                    <tr>
                        <th>Child</th>
                        <th>Teacher</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th>Format</th> <!-- Add Format column -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($meetings as $meeting) : ?>
                        <tr>
                            <td><?= $meeting['child'] ?></td>
                            <td><?= $meeting['teacher'] ?></td>
                            <td><?= $meeting['date'] ?></td>
                            <td><?= $meeting['time'] ?></td>
                            <td><?= $meeting['message'] ?></td>
                            <td><?= $meeting['format'] ?></td> <!-- Display Format -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php else : ?>
                <p>No meetings scheduled.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
