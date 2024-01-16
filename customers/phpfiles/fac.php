<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
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

    <div class="container mt-5">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-question-circle mr-2"></i> Why do I need a travel agent?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        A good travel agent is a travel expert who understands everything associated with planning and booking the perfect trip. They can give advice on places to go, as well as how much you’ll need to spend and how long to spend there.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fas fa-question-circle mr-2"></i> Why should I book from Best to You travel agent?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Over 15 years industry experience, Guide Me Away agents have also built strong partnerships with suppliers across the travel industry, meaning customers can gain exclusive access to deals and packages that wouldn’t be available via independent booking. We’ve already helped over 5,000 people book their holidays of a lifetime, so what are you waiting for?
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fas fa-question-circle mr-2"></i> How can I set up a consultation with Best to You travel agent?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        To set up a consultation with Best to You travel expert, you can contact us directly via phone, Toll-free: 553-4119 or email us at info@besttoyou.com. You can even reach us on Whatsapp at (553-4119).
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
    