<?php
session_start();
include('connect.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
                    <span class="text-white ml-8" id="counter"></span>
                    <img src="../images/shopping-cart.png" alt="Shopping Cart" width="100px" height="100px" class="ml-3">    
                </div>
            </div>
        </div>
    </header>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 border rounded shadow">
                <span id="counter"></span>
                <div class="boxa">
                    <div class="shopping-cart">
                        <div class="shTitle">
                            <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #333;">Shopping Cart</h1>
                        </div>
                        <div class="cart-items" id="orders"></div>
                        <div class="text-center mt-3">
                            <input class="btn btn-danger" type="button" value="Clear" onclick="emptyCart()">
                            <input class="btn btn-success" type="button" value="Book" onclick="book()">
                        </div>
                    </div>
                </div>
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

