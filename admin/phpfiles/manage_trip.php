
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin Dashboard</title>
</head>
<body>

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
            <h2>Manage Trips</h2>
            <table id="tripsTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Trip Name</th>
                        <th>Price</th>
                        <th>Days</th>
                        <th>Flight</th>
                        <th>Package ID</th>
                        <th>Agency Name</th>
                        <th>Hotel</th>
                        <th>Activities</th>
                        <th>Image Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                 
                    <tr>
                        <td><img src="trip1.jpg" alt="Trip Image"></td>
                        <td>Trip A</td>
                        <td>$1000</td>
                        <td>7</td>
                        <td>ABC Airlines</td>
                        <td>123</td>
                        <td>Agency XYZ</td>
                        <td>5-star Hotel</td>
                        <td>Scuba Diving, Sightseeing</td>
                        <td>activities.jpg</td>
                        <td>
                            <button class="accept-btn">Accept</button><br>
                            <br><button class="reject-btn">Reject</button>
                        </td>
                    </tr>
                
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
