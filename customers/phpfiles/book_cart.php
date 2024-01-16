<?php

include('connect.php');

session_start();

if (!isset($_SESSION['customer_id'])) {
    echo "You must sign in or register to add items to the cart.";
    exit;
}

$tripIds = explode(",", $_POST['tripIds']);
$prices = explode(",", $_POST['prices']);

$customerId = $_SESSION['customer_id'];


$query = "SELECT * FROM payment_cards WHERE customer_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: add_viscard.php");
    exit;
}
$cardData = $result->fetch_assoc();
$cardBalance = $cardData['balance'];
$totalPrice = array_sum($prices);
if ($cardBalance < $totalPrice) {
    echo "Not enough balance in your card. Please add funds.";
    exit;
}
$query = "INSERT INTO cart (customer_id, trip_id) VALUES (?, ?)";
$stmt = $conn->prepare($query);
foreach ($tripIds as $tripId) {
    $stmt->bind_param("ii", $customerId, $tripId);
    $stmt->execute();
}

$updateQuery = "UPDATE payment_cards SET balance = balance - ? WHERE customer_id = ?";
$stmt = $conn->prepare($updateQuery);
$stmt->bind_param("di", $totalPrice, $customerId);
$stmt->execute();

echo "Cart items booked successfully!";
?>
