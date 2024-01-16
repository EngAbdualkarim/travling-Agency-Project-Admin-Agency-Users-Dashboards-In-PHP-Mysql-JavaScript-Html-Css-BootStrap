
<?php
session_start();
include('../../customers/phpfiles/connect.php');

if (!isset($_SESSION['agency_id'])) {
    header("Location: ../../customers/phpfiles/login.php");
    exit;
}

$agency_id = $_SESSION['agency_id'];
$date_of_trip = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $days_of_stay = $_POST['days_of_stay'];
    $destination = $_POST['destination'];
    $price = $_POST['price'];
    $flight = $_POST['flight_name']; 
    $image_name = generateUniqueImageName($_FILES['image_file']); 
    $upload_path = '../tripImages/';


    if (!empty($_FILES['image_file']['tmp_name'])) {
        move_uploaded_file($_FILES['image_file']['tmp_name'], $upload_path . $image_name);
    } else {
        echo "<script>alert('Error: Image file not uploaded.');</script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO trip (date_of_trip, days_of_stay, destination, price, flight, image_name, agency_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissssi", $date_of_trip, $days_of_stay, $destination, $price, $flight, $image_name, $agency_id);

    try {
        if ($stmt->execute()) {
            echo "<script>alert('Trip created successfully!');</script>";
        } else {
            echo "<script>alert('Error creating trip: " . $stmt->error . "');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }

    $stmt->close();
}

function generateUniqueImageName($file) {
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $unique_name = uniqid('trip_image_') . '.' . $extension;
    return $unique_name;
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency-Craete Trips</title>
    <link rel="stylesheet" href="../../customers/css/style.css">
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
                        <a href="#"><img src="../../customers/images/logo.png" alt="logo"></a>
                        <nav class="navbar navbar-dark">
                        <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="creat_trips.php">Create Trips </a></li>
                                <li class="nav-item"><a class="nav-link" href="creat_packages.php">Create Packages</a></li>
                                <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
                                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../customers/phpfiles/logout.php">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <br>
        
        <div class="container">
    <div class="boxs mt-5 p-4">
        <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #333;">Create Trips</h1>
        <form action="creat_trips.php" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="destination" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Destination</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Price</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="flight_name" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Flight Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="flight_name" name="flight_name" placeholder="Enter Flight Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="days_of_stay" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Days of Stay</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="days_of_stay" name="days_of_stay" placeholder="Enter Days of Stay" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="image_file" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Image File</label>
        <div class="col-sm-9">
            <input type="file" class="form-control-file" id="image_file" name="image_file" accept="image/*" required>
        </div>
    </div>
    <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Create Trip</button>
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
