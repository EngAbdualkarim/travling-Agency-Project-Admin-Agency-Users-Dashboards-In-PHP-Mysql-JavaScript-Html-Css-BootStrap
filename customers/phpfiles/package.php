<?php
session_start();
include('connect.php');

if(isset($_GET['trip_id'])) {
    $tripId = $_GET['trip_id'];

    $packageQuery = "SELECT * FROM package WHERE trip_id = ?";
    $packageStmt = $conn->prepare($packageQuery);
    $packageStmt->bind_param("i", $tripId);
    $packageStmt->execute();
    $packageResult = $packageStmt->get_result();
    if($packageResult->num_rows > 0) {
        $packageRow = $packageResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package For Trips</title>
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
                    <?php
                        if (isset($_SESSION['customer_id'])) {
                            echo '<ul class="nav">
                                    <li class="nav-item"><a class="nav-link" href="trips.php">Trips</a></li>
                                    <li class="nav-item"><a class="nav-link" href="creat_packages.php">Create Package</a></li>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                                    <li class="nav-item"><a class="nav-link" href="add_viscard.php">Add Visa</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                                </ul>';
                        } else {
                            echo '<ul class="nav">
                                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="signup_page.php">Sign up</a></li>
                                    <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="trips.php">Trips</a></li>
                                    <li class="nav-item"><a class="nav-link" href="fac.php">FAQ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                                </ul>';
                        }
                        ?> 
                    </nav>
                </div>
            </div>
        </div>
    </header>
<br>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-4"> 
            <div class="card border-primary" style="padding: 30px; width: 100%;"> 
                <img src="../../agency/packagesImages/<?php echo $packageRow['image_name']; ?>" class="card-img-top img-fluid" alt="Package Image">
                <div class="card-body text-center">
                    <h5 class="card-title"><a href="#"><?php echo $packageRow['name']; ?></a></h5>
                    <p class="card-text">Hotel: <?php echo $packageRow['hotel']; ?></p>
                    <p class="card-text">Activities: <?php echo $packageRow['activities']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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

<?php
    } else {
        echo '<p>No package available for the selected trip.</p>';
    }

    $packageStmt->close();
} else {
    echo '<p>Trip ID not specified.</p>';
}

$conn->close();
?>
