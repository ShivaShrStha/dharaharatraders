<?php
require_once 'admin/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}

try {
    $email = $_POST['email'] ?? '';
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['error' => 'Valid email address required']);
        exit;
    }
    
    $db = new Database();
    $conn = $db->getConnection();
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM newsletter_subscriptions WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->fetch()) {
        echo json_encode(['error' => 'Email already subscribed']);
        exit;
    }
    
    // Insert new subscription
    $stmt = $conn->prepare("INSERT INTO newsletter_subscriptions (email) VALUES (?)");
    $stmt->execute([$email]);
    
    echo json_encode(['success' => true, 'message' => 'Successfully subscribed to newsletter']);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
