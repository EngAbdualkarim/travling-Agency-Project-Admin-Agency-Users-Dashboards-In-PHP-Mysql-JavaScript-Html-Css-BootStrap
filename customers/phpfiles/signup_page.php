<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
    <style>
        /* Add custom styles as needed */
        body {
            font-family: 'Poppins', sans-serif;
        }

        .center-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .center-buttons a {
            margin: 10px;
            font-size: 1.5em;
            padding: 20px 40px;
            border-radius: 10px;
            text-decoration: none;
        }

        .btn-customer {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-agency {
            background-color: #17a2b8;
            color: #fff;
            border: none;
        }
    </style>
</head>
<body>
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
    
    <div class="container">
        <div class="center-buttons">
            <a href="signup.php" class="btn btn-customer">Signup As Customer</a>
            <a href="../../agency/phpfiles/signup_agency.php" class="btn btn-agency">Signup As Agency</a>
        </div>
    </div>

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
