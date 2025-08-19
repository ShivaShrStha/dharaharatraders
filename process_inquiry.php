<?php
// Process product inquiry form submission
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

require_once 'admin/database.php';

try {
    // Get form data
    $product_id = $_POST['product_id'] ?? null;
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $quantity = trim($_POST['quantity'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validate required fields
    if (empty($product_id) || empty($name) || empty($email) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields']);
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Please enter a valid email address']);
        exit;
    }
    
    // Connect to database
    $db = new Database();
    $conn = $db->getConnection();
    
    // Check if product exists
    $stmt = $conn->prepare("SELECT name FROM products WHERE id = ? AND status = 'active'");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$product) {
        echo json_encode(['success' => false, 'message' => 'Product not found']);
        exit;
    }
    
    // Insert inquiry into database
    $stmt = $conn->prepare("
        INSERT INTO product_inquiries 
        (product_id, product_name, customer_name, customer_email, customer_phone, company, quantity, message, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, datetime('now'))
    ");
    
    $result = $stmt->execute([
        $product_id,
        $product['name'],
        $name,
        $email,
        $phone,
        $company,
        $quantity,
        $message
    ]);
    
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Inquiry sent successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save inquiry']);
    }
    
} catch(PDOException $e) {
    error_log("Database error in process_inquiry.php: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error occurred']);
} catch(Exception $e) {
    error_log("Error in process_inquiry.php: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred while processing your inquiry']);
}
?>
