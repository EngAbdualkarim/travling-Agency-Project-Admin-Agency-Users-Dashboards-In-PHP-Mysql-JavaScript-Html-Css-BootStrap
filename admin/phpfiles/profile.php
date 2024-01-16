<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/signup.css">

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
                </head>
                <body>

<div class="container">
   <div class="boxs mt-5 p-4">
   <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #333;">Update Profile</h1>
       <form action="sigup.php" method="post">
    <div class="form-group row">
 <label for="name" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Name</label>
        <div class="col-sm-9">
  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Full Name" required>
     </div>
     </div>
      <div class="form-group row">
  <label for="email" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Email</label>
    <div class="col-sm-9">
     <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required>
      </div>
     </div>
     <div class="form-group row">
      <label for="password" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Password</label>
         <div class="col-sm-9">
       <input type="password" class="form-control" name="password" placeholder="Enter a Strong Password" required>
         </div>
      </div>   
     <div class="form-group row text-center">
      <div class="col-sm-12">
   <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </div>
     </form>
  </div>
    </div>
     </body>
     </html>
                
                
        
        