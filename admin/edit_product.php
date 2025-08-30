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
    $name = $_POST['name'] ?? '';
    $category = $_POST['category'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';
    
    if (empty($id) || empty($name) || empty($category)) {
        echo json_encode(['error' => 'Required fields missing']);
        exit;
    }
    
    // Handle image upload if provided
    $image_url = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = '../uploads/products/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = 'product_' . time() . '_' . rand(1000, 9999) . '.' . $file_extension;
        $upload_path = $upload_dir . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
            // Store leading slash to make path root-absolute
            $image_url = '/uploads/products/' . $filename;
        }
    }
    
    // Update product
    if ($image_url) {
        $stmt = $conn->prepare("UPDATE products SET name = ?, category = ?, price = ?, description = ?, image_url = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
        $stmt->execute([$name, $category, $price, $description, $image_url, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE products SET name = ?, category = ?, price = ?, description = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
        $stmt->execute([$name, $category, $price, $description, $id]);
    }
    
    echo json_encode(['success' => true, 'message' => 'Product updated successfully']);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
