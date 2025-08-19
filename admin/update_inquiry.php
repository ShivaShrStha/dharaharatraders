<?php
require_once 'security.php';
require_once 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $id = $_POST['id'] ?? '';
    $status = $_POST['status'] ?? 'pending';
    
    if (empty($id)) {
        echo json_encode(['error' => 'Inquiry ID missing']);
        exit;
    }
    
    $stmt = $conn->prepare("UPDATE product_inquiries SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
    
    echo json_encode(['success' => true, 'message' => 'Inquiry status updated successfully']);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
