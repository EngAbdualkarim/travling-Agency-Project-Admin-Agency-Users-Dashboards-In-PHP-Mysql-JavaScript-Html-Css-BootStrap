<?php
session_start();
include('connect.php');

function getAverageRating($tripId, $conn)
{
    $sql = "SELECT AVG(no_of_rate) AS avg_rating FROM rate WHERE trip_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tripId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $averageRating = $row['avg_rating'];
    $stmt->close();

    return $averageRating;
}

$sql = "SELECT * FROM trip";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trips</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/trips.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <main>
        <div class="container mt-5">
            <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 40px; color: #09436a; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Trips</h1>
            <br>
            <div class="row">
                <?php
                while ($row = $result->fetch_assoc()) {
                    $tripId = $row['trip_id'];
                    $averageRating = getAverageRating($tripId, $conn);

                    $packageCheckSql = "SELECT COUNT(*) AS package_count FROM package WHERE trip_id = ?";
                    $packageCheckStmt = $conn->prepare($packageCheckSql);
                    $packageCheckStmt->bind_param("i", $tripId);
                    $packageCheckStmt->execute();
                    $packageCheckResult = $packageCheckStmt->get_result();
                    $packageCount = $packageCheckResult->fetch_assoc()['package_count'];
                    $packageCheckStmt->close();
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card border-primary" style="border-radius: 15px;">
                        <img src="../../agency/tripImages/<?php echo $row['image_name']; ?>" class="card-img-top" alt="Trip Image">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#"><?php echo $row['destination']; ?></a></h5>
                            <p class="card-text">Price: <?php echo $row['price']; ?> SAR</p>
                            <p class="card-text">Number of Days: <?php echo $row['days_of_stay']; ?></p>
                            <p class="card-text">Flight: <?php echo $row['flight']; ?></p>
                            <p class="card-text">Rating:
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $averageRating) {
                                        echo '<i class="fas fa-star"></i>';
                                    } else {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                }
                                ?>
                            </p>
                            <p class="card-text">Number of Ratings: <?php echo $averageRating; ?> <i class="far fa-heart"></i></p>
                            <?php if ($packageCount > 0) { ?>
                                <a href="package.php?trip_id=<?php echo $tripId; ?>" class="btn btn-primary">Read More</a>
                            <?php } else { ?>
                                <input class="add btn btn-danger" type="button" value="No Package Available" >
                            <?php } ?>
                            <input class="add btn btn-success" type="button" value="Add to Cart" data-product="<?php echo $row['destination']; ?>" data-price="<?php echo $row['price']; ?>" data-quantity="1" data-img-src="../../agency/tripImages/<?php echo $row['image_name']; ?>"  data-trip-id="<?php echo $tripId; ?>"  onclick="addToCart(this)">
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <br><br><br><br>
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
    
    echo "No approved trips available.";
}


$stmt->close();
$conn->close();
?>
