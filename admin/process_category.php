<?php
require_once 'database.php';
require_once 'security.php';
header('Content-Type: application/json');

$db = new Database();
$conn = $db->getConnection();

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'list':
        $stmt = $conn->query("SELECT * FROM categories ORDER BY name ASC");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($categories);
        break;
    case 'add':
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        if ($name === '') {
            echo json_encode(['error' => 'Category name required']);
            exit;
        }
        $stmt = $conn->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
        try {
            $stmt->execute([$name, $description]);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Category already exists']);
        }
        break;
    case 'edit':
        $id = intval($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        if ($id < 1 || $name === '') {
            echo json_encode(['error' => 'Invalid data']);
            exit;
        }
        $stmt = $conn->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
        try {
            $stmt->execute([$name, $description, $id]);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Update failed']);
        }
        break;
    case 'delete':
        $id = intval($_POST['id'] ?? 0);
        if ($id < 1) {
            echo json_encode(['error' => 'Invalid category']);
            exit;
        }
        $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
        try {
            $stmt->execute([$id]);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Delete failed']);
        }
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
}
?>
