<?php
session_start();
include('../../customers/phpfiles/connect.php');

if (!isset($_SESSION['agency_id'])) {
    header("Location: ../../customers/phpfiles/login.php");
    exit;
}

$agency_id = $_SESSION['agency_id'];
$trips_query = "SELECT * FROM `trip` WHERE `agency_id` = ?";
$trips_stmt = $conn->prepare($trips_query);
$trips_stmt->bind_param("i", $agency_id);
$trips_stmt->execute();
$trips_result = $trips_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../../customers/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function () {
        if ($('tbody tr').length === 0) {
            var noHistoryAlert = $('<div>', {
                class: 'alert alert-danger text-center', 
                role: 'alert',
            }).text('No history available.');
            $('#noHistoryContainer').append(noHistoryAlert);
        }
    });
</script>

</head>
<body>

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

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th rowspan="2" style="width: 150px;">Trip Image</th>
                        <th rowspan="2" style="width: 150px;">Package Image</th>
                        <th rowspan="2">Trip ID</th>
                        <th colspan="5">Trip Information</th>
                        <th colspan="5">Package Information</th>
                    </tr>
                    <tr>
                        <th>Date of Trip</th>
                        <th>Days of Stay</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th>Flight</th>
                        <th>Package ID</th>
                        <th>Package Name</th>
                        <th>Hotel Name</th>
                        <th>Activities</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($trips_result !== null) {
                        while ($row = $trips_result->fetch_assoc()) {
                            $package_query = "SELECT * FROM `package` WHERE `trip_id` = ?";
                            $package_stmt = $conn->prepare($package_query);
                            $package_stmt->bind_param("i", $row['trip_id']);
                            $package_stmt->execute();
                            $package_result = $package_stmt->get_result();

                            if ($package_result->num_rows > 0) {
                                $package_row = $package_result->fetch_assoc();
                            } else {
                                $package_row = [
                                    'package_id' => 'N/A',
                                    'name' => 'No Package',
                                    'hotel' => 'No Package',
                                    'activities' => 'No Package',
                                    'image_name' => 'No Package',
                                    'trip_id' => $row['trip_id'],
                                ];
                            }
                            ?>
                            <tr>
                            <td class="align-middle">
    <img src="../tripImages/<?php echo $row['image_name']; ?>" alt="Trip Image" class="img-fluid img-thumbnail" style="width: 300px; height: 150px;">
</td>
<td class="align-middle">
    <?php
    if ($package_row['image_name'] !== 'No Package') {
        echo '<img src="../packagesImages/' . $package_row['image_name'] . '" alt="Package Image" class="img-fluid img-thumbnail" style="width: 200px; height: 150px;">';
    } else {
        echo 'No Image';
    }
    ?>
</td>

                                <td class="align-middle"><?php echo $row['trip_id']; ?></td>
                                <td class="align-middle"><?php echo $row['date_of_trip']; ?></td>
                                <td class="align-middle"><?php echo $row['days_of_stay']; ?></td>
                                <td class="align-middle"><?php echo $row['destination']; ?></td>
                                <td class="align-middle"><?php echo $row['price']; ?></td>
                                <td class="align-middle"><?php echo $row['flight']; ?></td>
                                <td class="align-middle"><?php echo $package_row['package_id']; ?></td>
                                <td class="align-middle"><?php echo $package_row['name']; ?></td>
                                <td class="align-middle"><?php echo $package_row['hotel']; ?></td>
                                <td class="align-middle"><?php echo $package_row['activities']; ?></td>
                            </tr>
                            <?php
                            $package_stmt->close();
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div id="noHistoryContainer" class="container mt-3"></div>
        </div>
    </div>

    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <footer>
        <div class="container">
            <div class="mb-3 text-white">
                <h4>Connect with Us</h4>
                <a href="#" class="text-primary mr-3 hover-icon"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="#" class="text-primary mr-3 hover-icon"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="text-primary hover-icon"><i class="fab fa-facebook fa-2x"></i></a>
            </div>
            <p class="mt-3 text-white">&copy; 2023 Travel. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
