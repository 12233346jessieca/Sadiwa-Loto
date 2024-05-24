<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meeting Schedule</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<?php
$xmlFilePath = "../XML/meetings.xml";

if (file_exists($xmlFilePath) && filesize($xmlFilePath) > 0) {
    $xml = simplexml_load_file($xmlFilePath);
    if ($xml === false) {
        die('Error loading XML file');
    }

    echo "<table>
            <thead>
              <tr>
                <th>Child</th>
                <th>Teacher</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
              </tr>
            </thead>
            <tbody>";

    foreach ($xml->meeting as $meeting) {
        echo "<tr>
                <td>{$meeting->child}</td>
                <td>{$meeting->teacher}</td>
                <td>{$meeting->date}</td>
                <td>{$meeting->time}</td>
                <td>{$meeting->message}</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No meetings scheduled yet.</p>";
}
?>

</body>
</html>
