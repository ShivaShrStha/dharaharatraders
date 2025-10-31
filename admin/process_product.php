<?php
require_once 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = new Database();
        $conn = $db->getConnection();
        
        $name = $_POST['name'] ?? '';
        $category = $_POST['category'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';
        $status = $_POST['status'] ?? 'active';
        
        // Handle image upload
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/products/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $fileExtension;
            $fullPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $fullPath)) {
                // Store site-root absolute path to avoid relative URL issues when rendering
                $imagePath = '/uploads/products/' . $fileName;
            } else {
                $imagePath = '';
            }
        }
        
        // Update both image columns for compatibility
        $stmt = $conn->prepare("INSERT INTO products (name, category, description, price, image, image_url, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $category, $description, $price, $imagePath, $imagePath, $status]);
        
        echo json_encode(['success' => true, 'message' => 'Product added successfully']);
        
    } catch(Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
