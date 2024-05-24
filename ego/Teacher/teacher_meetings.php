<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Parent Online Communication Portal - Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
}

main {
    padding: 20px;
}

section {
    margin-bottom: 30px;
}

section h2 {
    color: #333;
}

section p {
    color: #666;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

</style>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#notifications">Notifications</a></li>
            <li><a href="#academic">Academic Performance</a></li>
            <li><a href="#meetings">Meetings</a></li>
            <li><a href="#feedbacks">Feedbacks</a></li>
            <li><a href="#profile">Profile</a></li>
        </ul>
    </nav>
    <main>
        <section id="notifications">
            <h2>Notifications</h2>
            <p>This section allows the admin to send notifications to teachers and parents.</p>
        </section>
        <section id="academic">
            <h2>Academic Performance</h2>
            <p>This section provides access to academic performance data of students.</p>
        </section>
        <section id="meetings">
            <h2>Meetings</h2>
            <p>This section manages schedules for meetings between teachers and parents.</p>
        </section>
        <section id="feedbacks">
            <h2>Feedbacks</h2>
            <p>This section allows collection and review of feedback from teachers and parents.</p>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Teacher Parent Online Communication Portal - Admin</p>
    </footer>
</body>
</html>
