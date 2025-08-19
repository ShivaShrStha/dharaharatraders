<?php
// Admin Security Check for Dharahara Traders
// Add this at the top of admin files for basic protection

session_start();

// Load configuration
$config = require_once 'config.php';
$admin_password = $config['admin_password'];

if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['admin_password']) && $_POST['admin_password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        // Show login form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = "Invalid password!";
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Admin Login - Dharahara Traders</title>
            <style>
                body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: #f5f7fa; }
                .login-container { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); min-width: 300px; text-align: center; }
                .login-container h2 { margin-bottom: 30px; color: #3661b7; }
                .login-container input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; }
                .login-container button { width: 100%; padding: 12px; background: #3661b7; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; }
                .login-container button:hover { background: #2952a3; }
                .error { color: red; margin-top: 10px; }
            </style>
        </head>
        <body>
            <div class="login-container">
                <h2>🏢 Dharahara Traders Admin</h2>
                <form method="POST">
                    <input type="password" name="admin_password" placeholder="Enter admin password" required>
                    <button type="submit">Login</button>
                    <?php if (isset($error)): ?>
                        <div class="error"><?php echo $error; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}
?>
