
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="navbar"></div>
    <div class="dashboard-container">
   
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage_trip.php">manage trips</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="manage_contactus.php">Manage contact us</a></li>
                <li><a href="profile.php"> profile</a></li>
                <li><a href="../../customers/phpfiles/logout.php">Log Out</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h2>Submitted Messages</h2>
        
            <table id="messagesTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ali</td>
                        <td>besttoyou@gmailcom</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
