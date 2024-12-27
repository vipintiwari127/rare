<?php
include 'admin/config.php';

$data = json_decode(file_get_contents('php://input'), true);
$productIds = $data['productIds'];

if (is_array($productIds) && !empty($productIds)) {
    $productIdsList = implode(',', $productIds);
    $sql = "SELECT * FROM products WHERE id IN ($productIdsList)";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful");

    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = [
            'id' => $row['id'],
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'discount_price' => $row['discount_price'],
            'color' => $row['color'],
            'image_paths' => str_replace("../uploads/", "./admin/uploads/", $row['image_paths']),
            'quantity' => 1
        ];
    }

    echo json_encode(['products' => $products]);
} else {
    echo json_encode(['products' => []]);
}
?>
