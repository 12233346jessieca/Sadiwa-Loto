<?php
session_start();

$xmlFilePath = "../XML/feedbacks.xml";
$feedbacks = [];

if (file_exists($xmlFilePath)) {
    $xml = simplexml_load_file($xmlFilePath);
    foreach ($xml->feedbacks->feedback as $feedback) {
        $feedbacks[] = [
            'child' => (string)$feedback->child,
            'teacher' => (string)$feedback->teacher,
            'acadprogress' => (string)$feedback->acadprogress,
            'classroomexp' => (string)$feedback->classroomexp,
        ];
    }
    
    // Reverse the feedbacks array
    $feedbacks = array_reverse($feedbacks);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Feedbacks</title>
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

    .feedbacks {
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
        <h1>Admin Feedbacks</h1>
    </header>

    <!-- Main content -->
    <main>
        <h2>Feedbacks</h2>
        <div class="feedbacks">
            <?php if (!empty($feedbacks)) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Child</th>
                            <th>Teacher</th>
                            <th>Academic Progress</th>
                            <th>Classroom Experience</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feedbacks as $feedback) : ?>
                            <tr>
                                <td><?= $feedback['child'] ?></td>
                                <td><?= $feedback['teacher'] ?></td>
                                <td><?= $feedback['acadprogress'] ?></td>
                                <td><?= $feedback['classroomexp'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No feedbacks available.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
