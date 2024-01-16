<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@') === false) {
        echo "<script>alert('Invalid email format. Must contain @');window.location.href = 'contact.php';</script>";
        exit;
    }
    $customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
    $stmt = $conn->prepare("INSERT INTO contacts (customer_id, name, email, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $customer_id, $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Contact form submitted successfully');window.location.href = 'contact.php';</script>";
    } else {
        echo "<script>alert('Error submitting contact form');window.location.href = 'contact.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
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
    <header>
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
                        echo'<ul class="nav">
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
		<div class="container">
            <div class="boxs mt-5 p-4">
                <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #333;">Contact Us</h1>
				<form action="contact.php" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subject" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Subject</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the Subject" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Message</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="message" name="message" placeholder="Enter Your Message" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Send</button>
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
