<?php
session_start();
include('connect.php');

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageName = $_POST['packageName'];
    $packageDescription = $_POST['packageDescription'];
    $packagePrice = $_POST['packagePrice'];

    $currentDate = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO customer_packages (name, description, price, date, customer_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsi", $packageName, $packageDescription, $packagePrice, $currentDate, $_SESSION['customer_id']);
    if ($stmt->execute()) {
        echo "<script>alert('Package created successfully!');</script>";
    } else {
        echo "<script>alert('Error creating package: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create packages</title>
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
<br>

<main class="container mt-5">
    <div class="boxs p-4">
        <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #333;">Create your own package</h1>
        <form action="creat_packages.php" method="POST" id="packageForm">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="packageName">Package Name:</label>
            <input type="text" class="form-control" id="packageName" name="packageName" required>
        </div>
        <div class="form-group col-md-6">
            <label for="packagePrice">Package Price:</label>
            <input type="number" class="form-control" id="packagePrice" name="packagePrice" required>
        </div>
    </div>
    <div class="form-group">
        <label for="packageDescription">Description:</label>
        <textarea class="form-control" id="packageDescription" name="packageDescription" rows="4" required></textarea>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Create Package</button>
    </div>
</form>

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
        