<?php
// Start the session
session_start();

// Define the predefined email and password
$correct_email = "Pearljoybaradero@gmail.com";
$correct_password = "Pearl1234";

// Path to the XML file
$xmlFilePath = "../XML/login.xml";

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
        $_SESSION['role'] = "Parent"; // Hardcoded username, you can change this as needed

        // Check if the directory for XML files exists, if not, create it
        if (!file_exists(dirname($xmlFilePath))) {
            mkdir(dirname($xmlFilePath), 0777, true); // Creates directory recursively with full permissions
        }

        // Create or load the XML file for logins
        if (!file_exists($xmlFilePath)) {
            // Create a new XML structure if the file doesn't exist
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><logins></logins>');
        } else {
            // Load existing XML data
            $xml = simplexml_load_file($xmlFilePath);
        }

        // Add the username as a login entry
        $login = $xml->addChild('login');
        $login->addChild('username', $email); // Using entered email as username
        $login->addChild('role', 'Parent');     
        $xml->asXML($xmlFilePath);

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

// Define your recipient data here
$recipientData = array(
    'Mark Heindrich B. Loto - BSI/T-2C' => array('Wilmer Pascual', 'Ivy Aguiflor', 'Kierven Villaruel'),
    'Shaireen Dianne B. Loto - BSBA-2B' => array('Teacher 1', 'Teacher 2', 'Teacher 3'),
    // Add more recipients as needed
);

// Check if children are set in session and get the first child's name
$firstChildName = isset($_SESSION['children'][0]['name']) ? $_SESSION['children'][0]['name'] : null;
?>
