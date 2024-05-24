<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Parent-Teacher Communication Portal</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <style>
        /* Additional CSS for aesthetic enhancements */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #fff; /* White text color */
        }

        .container {
            width: 80%; /* Adjusted width */
            max-width: 400px; /* Set maximum width */
            margin: 190px auto; /* Centered container */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
            text-align: center; /* Center align content */
        }

        h1 {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            color: #333; /* Maroon color for text */
            padding: 20px;
            border-radius: 10px;
            margin-top: -80px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            }

        p {
            margin-bottom: 20px; /* Added spacing */
            font-size: 18px; /* Larger font size */
        }

        .buttons {
            display: flex;
            justify-content: space-around; /* Evenly spaced buttons */
        }

        .button {
            padding: 10px 20px; /* Increased padding */
            background-color: #fff; /* White background */
            color: #870000; /* Maroon text color */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #ff758c; /* Lighter maroon color on hover */
            color: #fff; /* White text color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Online Parent-Teacher Communication Portal</h1>
        <p>Please Choose Your Role</p>
        <div class="buttons">
            <a href="../ego/Parent/parent.php" class="button">Login as Parent</a>
            <a href="../ego/Teacher/teacher_login.php" class="button">Login as Teacher</a>
        </div>
    </div>
</body>
</html>
