<?php
session_start();
include('../../customers/phpfiles/connect.php');

if (!isset($_SESSION['agency_id'])) {
    header("Location: ../../customers/phpfiles/login.php");
    exit;
}

$agency_id = $_SESSION['agency_id'];

$stmt = $conn->prepare("SELECT name, email FROM travel_agency WHERE agency_id = ?");
$stmt->bind_param("i", $agency_id);
$stmt->execute();
$stmt->bind_result($name, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../../customers/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/shoppingcart.js"></script>
</head>
<body>
    <header class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <a href="#"><img src="../../customers/images/logo.png" alt="logo"></a>
                    <nav class="navbar navbar-dark">
                        <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="creat_trips.php">Create Trips </a></li>
                                <li class="nav-item"><a class="nav-link" href="creat_packages.php">Create Packages</a></li>
                                <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
                                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../customers/phpfiles/logout.php">Logout</a></li>
                            </ul>
                        </nav>
                </div>
            </div>
        </div>
    </header>
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="mx-auto d-block w-75 bg-danger img-fluid rounded-circle mb-4 p-3" src="../../customers/images/userIcon.jfif" alt="Image">
  <h1 class="font-weight-bold bg-red"><?php echo htmlspecialchars($name); ?></h1>
                    <p class="mb-4">
                    </p>
                    <div class="d-flex justify-content-center mb-5" style="margin-left:19px;">
                    <a class="btn btn-outline-primary mr-2 bg-red" href="mailto:<?php echo htmlspecialchars($email); ?>"><i><?php echo htmlspecialchars($email); ?></i></a>
          <br>
                    </div>
                </div>
                <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                    <i class="fas fa-2x fa-angle-double-right text-primary"></i>
                </div>
            </div>
            <div class="content">
                <div class="container p-0">
                    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
                        <a href="" class="navbar-brand d-block d-lg-none">Navigation</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav>
                </div>
                <br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <footer class="py-3" style="background: #333;">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-lg-12 mb-2">
                        <div class="mb-3 text-white">
                            <h4>Connect with Us</h4>
                            <a href="#" class="text-primary mr-3 hover-icon"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="#" class="text-primary mr-3 hover-icon"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#" class="text-primary hover-icon"><i class="fab fa-facebook fa-2x"></i></a>
                        </div>
                        <p class="mt-3 text-white">&copy; 2023 Travel. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    </html>
    