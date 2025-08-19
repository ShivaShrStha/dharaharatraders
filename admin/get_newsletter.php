<?php
require_once 'database.php';

header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->query("SELECT * FROM newsletter_subscriptions ORDER BY created_at DESC");
    $subscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($subscriptions);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
