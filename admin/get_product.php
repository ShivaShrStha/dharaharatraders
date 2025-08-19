<?php
require_once 'database.php';

header('Content-Type: application/json');

try {
    $id = $_GET['id'] ?? '';
    
    if (empty($id)) {
        echo json_encode(['error' => 'Product ID required']);
        exit;
    }
    
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        echo json_encode($product);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
