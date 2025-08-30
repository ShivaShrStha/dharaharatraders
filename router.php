<?php
// Simple router for clean URLs
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = trim($path, '/');

// Remove query string for routing
$route = explode('?', $path)[0];
$route = rtrim($route, '/'); // Ensure no trailing slash

// Add support for product details with query string (e.g., /product?id=123)
if ($route === 'product' && isset($_GET['id'])) {
    include 'product.php';
    exit;
}

// Check if it's a PHP file that exists and should be executed
$static_file = __DIR__ . '/' . $path;
if (is_file($static_file)) {
    $extension = pathinfo($static_file, PATHINFO_EXTENSION);
    
    // If it's a PHP file, include it to execute the PHP code
    if ($extension === 'php') {
        include $static_file;
        exit;
    }
    
    // For non-PHP files (images, CSS, JS, etc.), serve them directly
    $ext = strtolower(pathinfo($static_file, PATHINFO_EXTENSION));
    $mime_map = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        'json' => 'application/json',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf'
    ];
    if (isset($mime_map[$ext])) {
        header("Content-Type: " . $mime_map[$ext]);
    } else {
        $mime = mime_content_type($static_file);
        header("Content-Type: $mime");
    }
    readfile($static_file);
    exit;
}

// Define routes
$routes = [
    '' => 'index.php',
    'home' => 'index.php',
    'about' => 'about.php',
    'products' => 'products.php',
    'contact' => 'contact.php',
    'product' => 'product.php'
];

// Handle specific routes
if (empty($route) || $route === 'index') {
    include 'index.php';
    exit;
}

if (array_key_exists($route, $routes)) {
    include $routes[$route];
    exit;
}

// Handle product.php with query parameters
if ($route === 'product.php' && isset($_GET['id'])) {
    include 'product.php';
    exit;
}

// Handle product with ID (clean URL format like /product?id=123)
if ($route === 'product' && isset($_GET['id'])) {
    include 'product.php';
    exit;
}

// Handle product with ID in path format (like /product/123)
if (strpos($route, 'product/') === 0) {
    $id = substr($route, 8); // Extract ID from product/123
    if (is_numeric($id)) {
        $_GET['id'] = $id;
        include 'product.php';
        exit;
    }
}

// Check if file exists with .php extension
if (file_exists($route . '.php')) {
    include $route . '.php';
    exit;
}

// 404 - Page not found
http_response_code(404);
echo "<!DOCTYPE html>
<html><head><title>404 - Page Not Found</title></head>
<body><h1>404 - Page Not Found</h1><p>The requested page could not be found.</p></body></html>";
?>
