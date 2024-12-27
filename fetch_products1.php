<?php
include 'admin/config.php';

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);
$productIds = $data['productIds'] ?? [];

if (is_array($productIds) && !empty($productIds)) {
    // Prepare the SQL query using placeholders
    $placeholders = implode(',', array_fill(0, count($productIds), '?'));
    $sql = "SELECT * FROM products WHERE id IN ($placeholders)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters
        $types = str_repeat('i', count($productIds));
        mysqli_stmt_bind_param($stmt, $types, ...$productIds);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = [
                'id' => $row['id'],
                'product_name' => $row['product_name'],
                'product_price' => $row['discount_price'],
                'original_price' => $row['product_price'], // Add original price
                'image_paths' => str_replace("../uploads/", "./admin/uploads/", $row['image_paths']),
                'quantity' => 1
            ];
        }

        // Close the statement
        mysqli_stmt_close($stmt);

        // Return the products as JSON
        echo json_encode(['products' => $products]);
    } else {
        // Handle the error if the statement preparation fails
        echo json_encode(['error' => 'Query preparation unsuccessful']);
    }
} else {
    // Return an empty array if no product IDs are provided
    echo json_encode(['products' => []]);
}
?>
