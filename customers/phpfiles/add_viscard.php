<?php
session_start();
include('connect.php');

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cardNumber = $_POST['cardNumber'];
    $cvv = $_POST['cvv'];
    $expirationDate = $_POST['expirationDate'];
    $balance = $_POST['balance'];

    if (!preg_match('/^\d{16}$/', $cardNumber)) {
        echo "<script>alert('Invalid card number. Please enter a 16-digit card number.');</script>";
    } else {
        if (!preg_match('/^\d{3}$/', $cvv)) {
            echo "<script>alert('Invalid CVV. Please enter a 3-digit CVV.');</script>";
        } else {
            $checkStmt = $conn->prepare("SELECT * FROM payment_cards WHERE customer_id = ?");
            $checkStmt->bind_param("i", $_SESSION['customer_id']);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows > 0) {
                echo "<script>alert('Card information already exists for this customer.');</script>";
            } else {
                $checkStmt = $conn->prepare("SELECT * FROM payment_cards WHERE card_no = ?");
                $checkStmt->bind_param("s", $cardNumber); // Use "s" for string
                $checkStmt->execute();
                $checkResult = $checkStmt->get_result();

                if ($checkResult->num_rows > 0) {
                    echo "<script>alert('Card number already exists. Please use a different card number.');</script>";
                } else {
                    $insertStmt = $conn->prepare("INSERT INTO payment_cards (card_no, balance, cvv, expired_date, customer_id) VALUES (?, ?, ?, ?, ?)");
                    $insertStmt->bind_param("isisi", $cardNumber, $balance, $cvv, $expirationDate, $_SESSION['customer_id']); // Use "isisi" for string, integer, string, integer, integer

                    if ($insertStmt->execute()) {
                        echo "<script>alert('Card added successfully!');</script>";
                    } else {
                        echo "<script>alert('Error adding card: " . $insertStmt->error . "');</script>";
                    }

                    $insertStmt->close();
                }
            }
        }
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Visa Card</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
    <div class="container">
        <div class="boxs mt-5 p-4">
        <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 42px; color: black;">
    Add Visa Card <i class="fab fa-cc-visa" style="font-size: 1em; color: #3498db;"></i>
</h1>
 <form action="add_viscard.php" method="post">
                <div class="form-group row">
                    <label for="cardNumber" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">
                        <i class="fas fa-credit-card" title="Card Number"></i>Number
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter Card Number" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cvv" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">
                        <i class="fas fa-lock" title="CVV"></i> CVV
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter CVV" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expirationDate" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">
                        <i class="far fa-calendar-alt" title="Expiration Date"></i>Exp Date
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="expirationDate" name="expirationDate" placeholder="Enter Expiration Date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="balance" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">
                        <i class="fas fa-dollar-sign" title="Balance"></i> Balance
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter Balance" required>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Add Card</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
