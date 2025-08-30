<?php
/*
 * Dharahara Traders — Header include
 * Built by: Shiva Sharan Shrestha
 * License: MIT (see LICENSE)
 */
?>
<!-- Header Include -->
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

      <!-- Single accessible hamburger button -->
      <button class="hamburger" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mainnav">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>

      <nav id="mainnav" class="mainnav">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.querySelector('.hamburger');
  const siteHeader = document.querySelector('.site-header');
  const mainnav = document.getElementById('mainnav');
  if (!hamburger || !siteHeader || !mainnav) return;

  function closeMenu() {
    siteHeader.classList.remove('menu-open');
    hamburger.classList.remove('is-active');
    hamburger.setAttribute('aria-expanded', 'false');
  }

  function openMenu() {
    siteHeader.classList.add('menu-open');
    hamburger.classList.add('is-active');
    hamburger.setAttribute('aria-expanded', 'true');
  }

  function toggleMenu(e) {
    e.stopPropagation();
    if (siteHeader.classList.contains('menu-open')) {
      closeMenu();
    } else {
      openMenu();
    }
  }

  hamburger.addEventListener('click', toggleMenu);
  hamburger.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      toggleMenu(e);
    }
  });

  // Close when clicking outside
  document.addEventListener('click', function(event) {
    if (siteHeader.classList.contains('menu-open') && !siteHeader.contains(event.target)) {
      closeMenu();
    }
  });

  // Ensure hamburger visibility on resize (CSS handles visibility but keep aria state clean)
  window.addEventListener('resize', function() {
    if (window.innerWidth > 1024) {
      closeMenu();
    }
  });
});
</script>

<link rel="icon" type="image/png" href="/img/Dharaharalogo.png">
<!-- Header Include End -->
