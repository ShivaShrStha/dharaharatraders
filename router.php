<?php
// Serve static files directly if they exist
$static_file = __DIR__ . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
if (is_file($static_file)) {
    $mime = mime_content_type($static_file);
    header("Content-Type: $mime");
    readfile($static_file);
    exit;
}

// Simple router for clean URLs
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = trim($path, '/');

// Remove query string for routing
$route = explode('?', $path)[0];

// Define routes
$routes = [
    '' => 'index.php',
    'home' => 'index.php',
    'about' => 'about.php',
    'shop' => 'shop.php',
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

// Handle product with ID
if (strpos($route, 'product') === 0) {
    $_GET['id'] = substr($route, 8); // Extract ID from product/123
    include 'product.php';
    exit;
}

// Handle product.php specifically
if (isset($_GET['id']) && $route === 'product.php') {
    include 'product.php';
    exit;
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
