<?php
session_start();
include 'admin/config.php';

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip']) && isset($_POST['payment_method']) && isset($_POST['total'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $payment_method = $_POST['payment_method'];
    $total = $_POST['total'];
    $payment_status = "pending";

    // Insert the order into the database
    $query = "INSERT INTO orders (first_name, last_name, email, mobile, address1, address2, country, city, state, zip, payment_method, total, payment_status) VALUES ('$first_name', '$last_name', '$email', '$mobile', '$address1', '$address2', '$country', '$city', '$state', '$zip', '$payment_method', '$total', '$payment_status')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $order_id = mysqli_insert_id($conn);
        $_SESSION['OID'] = $order_id;

        // If the payment method is COD, update the payment status to "completed"
        if ($payment_method === 'cod') {
            $update_query = "UPDATE orders SET payment_status='completed' WHERE id='$order_id'";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                echo json_encode(['status' => 'success', 'message' => 'Order inserted and payment status updated successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update payment status', 'query' => $update_query]);
            }
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Order inserted successfully']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert order', 'query' => $query]);
    }
}

if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];

    $query = "UPDATE orders SET payment_status='completed', payment_id='$payment_id' WHERE id='" . $_SESSION['OID'] . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Payment updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update payment', 'query' => $query]);
    }
}
?>
