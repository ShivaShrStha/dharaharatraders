<?php
require_once 'admin/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}

try {
    $product_id = $_POST['product_id'] ?? '';
    $customer_name = $_POST['customer_name'] ?? '';
    $customer_email = $_POST['customer_email'] ?? '';
    $customer_phone = $_POST['customer_phone'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if (empty($customer_name) || empty($customer_email) || empty($customer_phone)) {
        echo json_encode(['error' => 'Name, email, and phone are required']);
        exit;
    }
    
    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['error' => 'Valid email address required']);
        exit;
    }
    
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->prepare("INSERT INTO product_inquiries (product_id, customer_name, customer_email, customer_phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$product_id, $customer_name, $customer_email, $customer_phone, $message]);
    
    echo json_encode(['success' => true, 'message' => 'Inquiry submitted successfully']);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
