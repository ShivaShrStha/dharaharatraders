<?php
require_once 'database.php';

header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Helper to slugify names (normalize for matching)
    $slugify = function(string $text): string {
        $text = strtolower($text);
        // Replace accented characters
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        // Remove anything not alphanumeric
        $text = preg_replace('/[^a-z0-9]+/i', '', $text);
        return $text ?? '';
    };

    // Build an index of available product images once per request
    $imageIndex = [];
    $uploadsDir = realpath(__DIR__ . '/../uploads/products');
    if ($uploadsDir && is_dir($uploadsDir)) {
        $patterns = ['/*.jpg','/*.jpeg','/*.png','/*.webp','/*.gif','/*.JPG','/*.JPEG','/*.PNG','/*.WEBP','/*.GIF'];
        foreach ($patterns as $pattern) {
            foreach (glob($uploadsDir . $pattern) as $file) {
                $base = pathinfo($file, PATHINFO_FILENAME);
                $key = $slugify($base);
                if ($key !== '') {
                    $imageIndex[$key] = '/uploads/products/' . basename($file);
                }
            }
        }
    }

    // Fix image paths for compatibility and try to auto-match by name when missing
    foreach ($products as &$product) {
        // Handle both image and image_url columns
        $imageField = '';
        if (isset($product['image']) && !empty($product['image'])) {
            $imageField = $product['image'];
        } elseif (isset($product['image_url']) && !empty($product['image_url'])) {
            $imageField = $product['image_url'];
        }

        // If no image stored in DB, try to find a file by product name
        if (empty($imageField) && !empty($product['name'])) {
            $nameKey = $slugify($product['name']);
            if ($nameKey && isset($imageIndex[$nameKey])) {
                $imageField = $imageIndex[$nameKey];
            }
        }

        if (!empty($imageField)) {
            // Ensure the path starts with / for proper web serving
            if (strpos($imageField, '/') !== 0 && !preg_match('#^https?://#i', $imageField)) {
                $imageField = '/' . ltrim($imageField, '/');
            }
            // If it's a local uploads path but the file doesn't exist, try to find by name
            if (preg_match('#^/uploads/products/[^/]+\.[a-zA-Z0-9]+$#', $imageField)) {
                $serverPath = realpath(__DIR__ . '/..' . dirname($imageField));
                $basename = basename($imageField);
                if (!$serverPath || !file_exists($serverPath . DIRECTORY_SEPARATOR . $basename)) {
                    if (!empty($product['name'])) {
                        $nameKey = $slugify($product['name']);
                        if ($nameKey && isset($imageIndex[$nameKey])) {
                            $imageField = $imageIndex[$nameKey];
                        } else {
                            $imageField = '';
                        }
                    } else {
                        $imageField = '';
                    }
                }
            }
            $product['image'] = $imageField;
            $product['image_url'] = $imageField;
        } else {
            $product['image'] = '';
            $product['image_url'] = '';
        }
    }
    
    echo json_encode($products);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
