<?php
require_once 'database.php';

header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->query("
        SELECT 
            pi.*,
            p.name as product_name 
        FROM product_inquiries pi 
        LEFT JOIN products p ON pi.product_id = p.id 
        ORDER BY pi.created_at DESC
    ");
    $inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($inquiries);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
