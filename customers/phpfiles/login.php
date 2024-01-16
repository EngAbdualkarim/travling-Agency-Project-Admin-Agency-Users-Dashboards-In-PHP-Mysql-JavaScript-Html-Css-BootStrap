<?php
session_start();
include('connect.php');

if (isset($_SESSION['customer_id'])) {
    header("Location: trips.php");
    exit;
}

if (isset($_SESSION['agency_id'])) {
    header("Location:../../agency/phpfiles/profile.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@') === false) {
        echo "<script>alert('Invalid email format. Must contain @');window.location.href = 'login.php';</script>";
        exit;
    }

    if (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters');window.location.href = 'login.php';</script>";
        exit;
    }

    $checkCustomerQuery = "SELECT customer_id, password FROM customer WHERE email = ?";
    $checkCustomerStmt = $conn->prepare($checkCustomerQuery);
    $checkCustomerStmt->bind_param("s", $email);
    $checkCustomerStmt->execute();
    $result = $checkCustomerStmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $customer_id = $row['customer_id'];
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['customer_id'] = $customer_id;
            header("Location: trips.php");
            exit;
        } else {
            echo "<script>alert('Invalid password');window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Customer not found');window.location.href = 'login.php';</script>";
    }

    $checkCustomerStmt->close();
    $conn->close();
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer - Login</title>
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
                        <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="signup_page.php">Sign up</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                                <li class="nav-item"><a class="nav-link" href="trips.php">Trips</a></li>
                                <li class="nav-item"><a class="nav-link" href="fac.php">FAQ</a></li>
                                <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
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
            <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #333;">Login Customer</h1>
            <form action="login.php" method="post">
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
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
            <div class="form-group row text-center">
                <div class="col-sm-12">
                    <p>Not a customer? <a href="../../agency/phpfiles/login_agency.php">Is Agency</a> | <a href="/travling_agency_project/admin/phpfiles/dashboard.php">Is Admin</a></p>
                </div>
            </div>
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
