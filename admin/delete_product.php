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
    
    if (empty($id)) {
        echo json_encode(['error' => 'Product ID missing']);
        exit;
    }
    
    // Get product details before deletion to remove image file
    $stmt = $conn->prepare("SELECT image_url FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        // Delete product from database
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
        
        // Delete image file if exists
        if ($product['image_url'] && file_exists('../' . $product['image_url'])) {
            unlink('../' . $product['image_url']);
        }
        
        echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
