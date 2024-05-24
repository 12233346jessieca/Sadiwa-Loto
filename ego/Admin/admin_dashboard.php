<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

header {
    background-color: maroon;
    color: #fff;
    padding: 10px 20px;
}

header h1 {
    margin: 0;
}

.sidebar {
    margin-top: 10px;
    background-color: maroon;
    color: #f3f3f3;
    width: 200px;
    height: calc(100vh - 40px); /* Adjusted height to account for header and footer */
    overflow-y: auto; /* Added overflow-y to enable scrolling if content exceeds height */
    z-index: 1; /* Ensure sidebar is above main content */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added shadow for depth */
    border-radius: 35px;
}
ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    margin-bottom: 10px;
}

ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
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
    margin-top: 40px;
    color: #fff;
    text-decoration: none;
    display: block;
    text-align: center;
}

nav ul li a:hover {
    background-color: #555;
}

main {
    padding: 20px;
    margin-left: 220px; /* Adjusted to accommodate sidebar width and add space */
}

/* Dashboard Section Styles */
.recent-activity {
    margin-bottom: 30px;
}
.statistics{
    margin-top: -630px;
}

.stat-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.stat-card {
    flex: 1;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
}

.activity-log {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.activity-item {
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
}

</style>
<body>
    <header>
        <h1>Admin Dashboard</h1>        
    </header>
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="meetinginfo.php">Meeting Schedules</a></li>
                <li><a href="admin_notifupdates.php">Notifications</a></li>
                <li><a href="admin_managefeedbacks.php">Manage Feedbacks</a></li>
                <li><a href="adminlogin.php">Log Out</a></li>
            </ul>
            </ul>
        </nav>
    </div>
    <main>
        <section class="statistics">
            <h2>Statistics</h2>
            <div class="stat-cards">
                <div class="stat-card">
                    <h3>Total Users</h3>
                    <p>1000</p>
                </div>
                <div class="stat-card">
                    <h3>Total Posts</h3>
                    <p>500</p>
                </div>
                <div class="stat-card">
                    <h3>New Users Today</h3>
                    <p>50</p>
                </div>
                <div class="stat-card">
                    <h3>New Posts Today</h3>
                    <p>20</p>
                </div>
            </div>
        </section>
        <section class="recent-activity">
            <h2>Recent Activity</h2>
            <div class="activity-log">
                <div class="activity-item">
                    <p>User John Doe registered.</p>
                    <span>1 hour ago</span>
                </div>
                <div class="activity-item">
                    <p>Post "Lorem ipsum dolor sit amet" published.</p>
                    <span>2 hours ago</span>
                </div>
                <div class="activity-item">
                    <p>User Jane Doe updated profile.</p>
                    <span>3 hours ago</span>
                </div>
                <div class="activity-item">
                    <p>Post "Sed ut perspiciatis unde omnis iste natus" deleted.</p>
                    <span>4 hours ago</span>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
