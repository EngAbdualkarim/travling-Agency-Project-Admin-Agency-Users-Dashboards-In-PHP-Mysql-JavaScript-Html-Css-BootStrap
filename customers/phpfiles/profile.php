<?php 
session_start();
include('connect.php');

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit;
}

$customer_id = $_SESSION["customer_id"];
$stmt = $conn->prepare("SELECT name, email, phone_no FROM customer WHERE customer_id = ?");
$stmt->bind_param("i", $customer_id);

$stmt->execute();

$stmt->bind_result($name, $email, $phone_no);
$stmt->fetch();

$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
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
                    <a href="#"><img src="../images/logo.png" alt="logo"></a>
                    <nav class="navbar navbar-dark">
                    <ul class="nav">
                         <li class="nav-item"><a class="nav-link" href="trips.php">Trips</a></li>
                         <li class="nav-item"><a class="nav-link" href="creat_packages.php">Create Package</a></li>
                         <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                         <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                         <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                        <li class="nav-item"><a class="nav-link" href="add_viscard.php">Add Visa</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="mx-auto d-block w-75 bg-danger img-fluid rounded-circle mb-4 p-3" src="../images/userIcon.jfif" alt="Image">
  <h1 class="font-weight-bold bg-red"><?php echo $name; ?></h1>
                    <p class="mb-4">
                    </p>
                    <div class="d-flex justify-content-center mb-5" style="margin-left:19px;">
                    <a class="btn btn-outline-primary mr-2 bg-red" href="mailto:<?php echo $email; ?>"><i><?php echo $email; ?></i></a>
                    <a class="btn btn-outline-primary mr-2 bg-red" href="#"><i><?php echo $phone_no; ?></i></a>
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
                <div class="container p-0">
                    <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner arousel-item">
                            <div class="carousel-item active">
                                <img class="w-100" src="../images/georgia1.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="mb-3 text-white font-weight-bold">Enjoy your travel all over the world</h2>
                                    <div class="d-flex text-white">
                                        <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> since Aug 2023</small>
                                        <small class="mr-2 text-muted"><i class="fa fa-folder"></i> 3500 SAR</small>
                                    </div>
                                    <a href="trips.html" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="../images/georgia2.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="text-white font-weight-bold">Enjoy your travel all over the world</h2>
                                    <div class="d-flex">
                                        <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> since Aug 2023</small>
                                        <small class="mr-2 text-muted"><i class="fa fa-folder"></i> 3500 SAR</small>
                                    </div>
                                    <a href="trips.html" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
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
    