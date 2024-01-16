
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
<body>
<div class="boxa">
    <div class="admin-panel">
        <h2> Manage Contact Information</h2>
            <label for="facebook">Facebook:</label>
            <input type="text" name="facebook" placeholder="Enter Facebook URL" required>
            <br>

            <label for="twitter">Twitter: </label>
            <input type="text" name="twitter" placeholder="Enter Twitter URL" required>
            <br>

            <label for="instagram">Instagram:</label>
            <input type="text" name="instagram" placeholder="Enter Instagram URL" required>
            <br>

            <button type="submit">Update</button>
    </div>
        </form>

  