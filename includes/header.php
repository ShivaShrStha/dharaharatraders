<!-- Header I      <a class="logo" href="/">
        <img src="img/Dharaharalogo.png" alt="Dharahara Traders Logo" class="logo-img">
        <span class="logo-text">Dharahara Traders</span>
      </a>
      <!-- Hamburger menu button for mobile only -->
      <button class="hamburger" aria-label="Toggle navigation" style="display:none;"></button>
      <nav class="mainnav">
        <ul>
          <li><a href="/" class="nav-link">Home</a></li>
          <li><a href="about" class="nav-link">About</a></li>
          <li><a href="products" class="nav-link">Products</a></li>
          <li><a href="contact" class="nav-link">Contact</a></li>
        </ul>
      </nav>->
<div class="topbar">
  <div class="container">
    <div class="top-left">
      <a href="mailto:info@dharaharatraders.com">info@dharaharatraders.com</a>
      <span> | </span>
      <a href="tel:+977-9818852676">+977-9818852676</a>
    </div>
  </div>
</div>
<header class="site-header">
  <div class="navwrap">
    <div class="navcontainer">
      <a class="logo" href="/">
        <img src="/img/Dharaharalogo.png" alt="Dharahara Traders Logo" class="logo-img">
        <span class="logo-text">Dharahara Traders</span>
      </a>
      <!-- Hamburger menu button for mobile only -->
      <button class="hamburger" aria-label="Toggle navigation" style="display:none;"></button>
      <nav class="mainnav">
        <ul>
          <li><a href="/" class="nav-link">Home</a></li>
          <li><a href="/about" class="nav-link">About</a></li>
          <li><a href="/products" class="nav-link">Products</a></li>
          <li><a href="/contact" class="nav-link">Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>
<link rel="stylesheet" href="/includes/header.css">
<script>
document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.querySelector('.hamburger');
  const siteHeader = document.querySelector('.site-header');
  if (hamburger && siteHeader) {
    // Show hamburger only on mobile
    function updateHamburgerVisibility() {
      if (window.innerWidth <= 1024) {
        hamburger.style.display = 'block';
      } else {
        hamburger.style.display = 'none';
        siteHeader.classList.remove('menu-open');
      }
    }
    updateHamburgerVisibility();
    window.addEventListener('resize', updateHamburgerVisibility);
    hamburger.addEventListener('click', function(e) {
      e.stopPropagation();
      siteHeader.classList.toggle('menu-open');
    });
    document.addEventListener('click', function(event) {
      if (siteHeader.classList.contains('menu-open')) {
        const nav = document.querySelector('.mainnav');
        if (nav && !nav.contains(event.target) && !hamburger.contains(event.target)) {
          siteHeader.classList.remove('menu-open');
        }
      }
    });
  }
});
</script>
<link rel="icon" type="image/png" href="/img/Dharaharalogo.png">
<!-- Header Include End -->
