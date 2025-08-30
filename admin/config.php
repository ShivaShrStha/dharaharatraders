<?php
/**
 * Dharahara Traders — Admin configuration
 * Built by: Shiva Sharan Shrestha
 * License: MIT (see ../LICENSE)
 */
// Configuration file for Dharahara Traders
// Load environment variables

function loadEnv($path) {
    if (!file_exists($path)) {
        return [];
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $env = [];
    
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        $line = trim($line);
        if (empty($line)) {
            continue;
        }
        
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $env[trim($name)] = trim($value);
        }
    }
    
    return $env;
}

$env = loadEnv(__DIR__ . '/../.env');

$config = [
    'admin_password' => $env['ADMIN_PASSWORD'] ?? 'dharahara2025admin',
    'database_path' => __DIR__ . '/' . ($env['DB_PATH'] ?? 'dharahara_data.db'),
    'site_name' => $env['SITE_NAME'] ?? 'Dharahara Traders Admin',
    'max_login_attempts' => (int)($env['MAX_LOGIN_ATTEMPTS'] ?? 5),
    'session_timeout' => (int)($env['SESSION_TIMEOUT'] ?? 3600),
    'whatsapp_number' => $env['WHATSAPP_NUMBER'] ?? '9779818852676',
];

return $config;
?>
