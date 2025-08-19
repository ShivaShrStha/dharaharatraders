<?php
require_once 'database.php';

header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Create products table if it doesn't exist
    $conn->exec("CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        category TEXT NOT NULL,
        description TEXT,
        price TEXT,
        image TEXT,
        status TEXT DEFAULT 'active',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Create inquiries table if it doesn't exist
    $conn->exec("CREATE TABLE IF NOT EXISTS product_inquiries (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        product_id INTEGER,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT,
        message TEXT,
        status TEXT DEFAULT 'new',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (product_id) REFERENCES products (id)
    )");
    
    // Create newsletter table if it doesn't exist
    $conn->exec("CREATE TABLE IF NOT EXISTS newsletter_subscribers (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE NOT NULL,
        status TEXT DEFAULT 'active',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Create contact messages table if it doesn't exist
    $conn->exec("CREATE TABLE IF NOT EXISTS contact_messages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        subject TEXT,
        message TEXT NOT NULL,
        status TEXT DEFAULT 'new',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Get stats
    $stats = [];
    
    $stmt = $conn->query("SELECT COUNT(*) as count FROM products WHERE status = 'active'");
    $stats['products'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $conn->query("SELECT COUNT(*) as count FROM product_inquiries");
    $stats['inquiries'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $conn->query("SELECT COUNT(*) as count FROM newsletter_subscribers WHERE status = 'active'");
    $stats['newsletter'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $conn->query("SELECT COUNT(*) as count FROM contact_messages");
    $stats['contacts'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    echo json_encode($stats);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
