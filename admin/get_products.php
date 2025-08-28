<?php
require_once 'database.php';

header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Fix image field for compatibility
    foreach ($products as &$product) {
        if (isset($product['image_url']) && empty($product['image']) && !empty($product['image_url'])) {
            $product['image'] = $product['image_url'];
        }
    }
    echo json_encode($products);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
