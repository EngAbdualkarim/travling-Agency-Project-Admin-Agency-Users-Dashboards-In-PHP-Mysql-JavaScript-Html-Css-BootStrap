<?php
session_start();
include('../../customers/phpfiles/connect.php');

if (!isset($_SESSION['agency_id'])) {
    header("Location: ../../customers/phpfiles/login.php");
    exit;
}

$agency_id = $_SESSION['agency_id'];
$trips_query = "SELECT `trip_id`, `destination` FROM `trip` WHERE `agency_id` = ?";
$trips_stmt = $conn->prepare($trips_query);
$trips_stmt->bind_param("i", $agency_id);
$trips_stmt->execute();
$trips_result = $trips_stmt->get_result();

if ($trips_result->num_rows === 0) {
    echo "<script>alert('You must add at least one trip before adding a package.'); setTimeout(function(){ window.location.href='creat_trips.php'; }, 200);</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = false;
    $package_name = $_POST['package_name'];
    $hotel_name = $_POST['hotel_name'];
    $activities = $_POST['activities'];
    $trip_id = $_POST['trip_id'];

    $image_file = $_FILES['image_file'];
    $image_name = uniqid() . '_' . $image_file['name'];
    $target_path = '../packagesImages/' . $image_name;
    move_uploaded_file($image_file['tmp_name'], $target_path);

    $check_query = "SELECT * FROM `package` WHERE `trip_id` = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("i", $trip_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $update_query = "UPDATE `package` SET 
            `name` = ?, 
            `hotel` = ?, 
            `activities` = ?, 
            `image_name` = ? 
            WHERE `trip_id` = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("ssssi", $package_name, $hotel_name, $activities, $image_name, $trip_id);
        $result = $update_stmt->execute();

        if ($result) {
            echo "<script>alert('Package information updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating package information.');</script>";
        }
    } else {
        $insert_query = "INSERT INTO `package` 
            (`name`, `hotel`, `activities`, `image_name`, `trip_id`) 
            VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("ssssi", $package_name, $hotel_name, $activities, $image_name, $trip_id);
        $result = $insert_stmt->execute();

        if ($result) {
            echo "<script>alert('Package created successfully!');</script>";
        } else {
            echo "<script>alert('Error creating package.');</script>";
        }
    }

    $check_stmt->close();

    if (isset($update_stmt)) {
        $update_stmt->close();
    }

    if (isset($insert_stmt)) {
        $insert_stmt->close();
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
    <title>Agency-Craete Packages</title>
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
        <h1 class="text-center mb-4" style="border-bottom: 2px solid #3498db; padding-bottom: 10px; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #333;">Create Package For Trips</h1>

        <form action="creat_packages.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="trip_id" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Select Trip</label>
            <div class="col-sm-9">
                <select class="form-control" id="trip_id" name="trip_id" required>
                    <?php
                    while ($row = $trips_result->fetch_assoc()) {
                        echo "<option value='{$row['trip_id']}'>{$row['destination']} ({$row['trip_id']})</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    <div class="form-group row">
        <label for="package_name" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Package Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="hotel_name" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Hotel Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Enter Hotel Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="activities" class="col-sm-3 col-form-label" style="display: block; margin-right: 0;">Activities</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="activities" name="activities" placeholder="Enter Activities" required>
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
            <button type="submit" class="btn btn-primary">Create Package</button>
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
