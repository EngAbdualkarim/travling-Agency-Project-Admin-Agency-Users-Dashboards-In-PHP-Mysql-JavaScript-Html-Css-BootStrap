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
        <header>
               <h1>besttoyou </h1>   
    <div class="research-box">
        <form action="#" method="GET">
            <input type="text" name="search" placeholder="Enter your query">
            <button type="submit">Search</button>
        </form>
    </div>
            </header>
       
          

            <section class="cards">
                <div class="card">
                    <h3>Total Users</h3>
                    <div class="numbers">40</div>
                </div>
                <div class="card">  
                      <h3>travel agency</h3>
                    <div class="numbers">4</div>
                

                </div>
                <div class="card"> 
                    <h3>trips</h3>
                    <div class="numbers">18</div>
                   
                </div>
            <div class="card">
                <h3>reserved</h3>
                    <div class="numbers">10</div>
            </section>

            <section class="recent-reversed">
                <h2>Recent reversed</h2>
           
                <table>
                    <thead>
                        <tr>
        
                            <th>Reservation ID</th>
                            <th>User</th>
                            <th>Travel Agency</th>
                            <th>Trip</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ali</td>
                            <td>Agency A</td>
                            <td>yamen</td>
                            <td>2023-11-15</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Smith</td>
                            <td>Agency B</td>
                            <td>oman</td>
                            <td>2023-11-14</td>
                        </tr>
                    </tbody>
                </table>
   
</body>
</html>
