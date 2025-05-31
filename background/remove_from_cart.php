<?php
session_start();
header('Content-Type: application/json');

if (isset($_GET['key'])) {
    $key = $_GET['key'];
    if (isset($_SESSION['cart'][$key])) {
        unset($_SESSION['cart'][$key]);
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Item not found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing key']);
}
?>
