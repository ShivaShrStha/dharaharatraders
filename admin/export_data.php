<?php
require_once 'security.php';
require_once 'database.php';

$type = $_GET['type'] ?? '';

if (empty($type)) {
    die('Export type required');
}

$db = new Database();
$conn = $db->getConnection();

// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="dharahara_traders_' . $type . '_' . date('Y-m-d') . '.csv"');

$output = fopen('php://output', 'w');

try {
    switch ($type) {
        case 'products':
            fputcsv($output, ['ID', 'Name', 'Category', 'Price', 'Description', 'Status', 'Created At']);
            $stmt = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, [
                    $row['id'],
                    $row['name'],
                    $row['category'],
                    $row['price'],
                    $row['description'],
                    $row['status'],
                    $row['created_at']
                ]);
            }
            break;
            
        case 'inquiries':
            fputcsv($output, ['ID', 'Product Name', 'Customer Name', 'Email', 'Phone', 'Message', 'Status', 'Created At']);
            $stmt = $conn->query("
                SELECT pi.*, p.name as product_name 
                FROM product_inquiries pi 
                LEFT JOIN products p ON pi.product_id = p.id 
                ORDER BY pi.created_at DESC
            ");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, [
                    $row['id'],
                    $row['product_name'],
                    $row['customer_name'],
                    $row['customer_email'],
                    $row['customer_phone'],
                    $row['message'],
                    $row['status'],
                    $row['created_at']
                ]);
            }
            break;
            
        case 'newsletter':
            fputcsv($output, ['ID', 'Email', 'Subscribed At']);
            $stmt = $conn->query("SELECT * FROM newsletter_subscriptions ORDER BY created_at DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, [
                    $row['id'],
                    $row['email'],
                    $row['created_at']
                ]);
            }
            break;
            
        case 'contacts':
            fputcsv($output, ['ID', 'Name', 'Email', 'Subject', 'Message', 'Status', 'Created At']);
            $stmt = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, [
                    $row['id'],
                    $row['name'],
                    $row['email'],
                    $row['subject'],
                    $row['message'],
                    $row['status'],
                    $row['created_at']
                ]);
            }
            break;
            
        default:
            die('Invalid export type');
    }
} catch(Exception $e) {
    die('Export error: ' . $e->getMessage());
}

fclose($output);
?>
