<?php
// Unified Header Component for Dharahara Traders
?>
<header class="site-header">
    <div class="topbar">
        <div class="container">
            <div class="top-left">
                <a href="mailto:info@dharaharatraders.com">info@dharaharatraders.com</a>
                <span>&nbsp;|&nbsp;</span>
                <a href="tel:+977-9818852676">+977-9818852676</a>
            </div>
        </div>
    </div>
    <div class="navwrap">
        <div class="container navcontainer">
            <a class="logo" href="/">
                <img src="/img/Dharaharalogo.png" alt="Dharahara Traders Logo" class="logo-img">
                <span class="logo-text">Dharahara Traders</span>
            </a>
            <button class="hamburger" onclick="toggleMenu()">☰</button>
            <nav class="mainnav" id="mainnav">
                <ul>
                    <li><a href="/" class="<?php echo ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/home') ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="/about" class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/about') !== false) ? 'active' : ''; ?>">About</a></li>
                    <li><a href="/shop" class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/shop') !== false) ? 'active' : ''; ?>">Products</a></li>
                    <li><a href="/contact" class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/contact') !== false) ? 'active' : ''; ?>">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<script>
function toggleMenu() {
    const nav = document.getElementById('mainnav');
    nav.classList.toggle('active');
}
</script>
