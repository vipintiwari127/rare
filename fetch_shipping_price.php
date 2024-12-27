<?php
include './admin/config.php';

// Assuming you have a function to get the shipping price
function getShippingPrice() {
    // Replace this with your actual logic to get the shipping price
    return 10; // Example static shipping price
}

$shippingPrice = getShippingPrice();
echo json_encode(['shippingPrice' => $shippingPrice]);
?>
