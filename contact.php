<?php
// Contact page for Dharahara Traders - Ultra Premium Design
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact Us | Dharahara Traders Pvt. Ltd.</title>
  <meta name="description" content="Get in touch with Dharahara Traders Pvt. Ltd. Contact us for premium import-export services, product inquiries, and business partnerships in Nepal.">
  <meta name="keywords" content="contact dharahara traders, import export nepal contact, business inquiries, product inquiries, partnerships">
  
  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="Contact Us | Dharahara Traders Pvt. Ltd.">
  <meta property="og:description" content="Get in touch with Dharahara Traders Pvt. Ltd. Contact us for premium import-export services and business partnerships.">
  <meta property="og:type" content="website">
  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/Dharaharalogo.png">
  <style>
    /* Ultra Premium Creamy Design - Contact Page */
    :root {
      --cream-light: #fefcf7;
      --cream-medium: #faf7f0;
      --cream-dark: #f5f1e8;
      --gold-light: #d4af37;
      --gold-medium: #b8860b;
      --gold-dark: #8b6914;
      --brown-light: #8b7355;
      --brown-medium: #6d5a3d;
      --brown-dark: #4a3728;
      --text-primary: #2c1810;
      --text-secondary: #5d4e37;
      --text-muted: #8b7355;
      --accent: #cd9456;
      --shadow-light: rgba(139, 115, 85, 0.1);
      --shadow-medium: rgba(139, 115, 85, 0.2);
      --shadow-heavy: rgba(139, 115, 85, 0.3);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      line-height: 1.6;
      color: var(--text-primary);
      background: var(--cream-light);
      overflow-x: hidden;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* Header Styles */
    .site-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background: rgba(254, 252, 247, 0.95);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--cream-dark);
      transition: all 0.3s ease;
    }

    .site-header.scrolled {
      background: var(--cream-light);
      box-shadow: 0 4px 20px var(--shadow-light);
    }

    .topbar {
      background: var(--brown-dark);
      color: var(--cream-light);
      padding: 8px 0;
      font-size: 0.85rem;
    }

    .top-left a {
      color: var(--cream-light);
      text-decoration: none;
      margin-right: 15px;
      opacity: 0.9;
      transition: opacity 0.3s ease;
    }

    .top-left a:hover {
      opacity: 1;
    }

    .navwrap {
      padding: 15px 0;
    }

    .navcontainer {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: var(--brown-dark);
    }

    .logo-img {
      height: 50px;
      margin-right: 10px;
      transition: transform 0.3s ease;
    }

    .logo-text {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--brown-dark);
    }

    .logo:hover .logo-img {
      transform: scale(1.05);
    }

    .mainnav ul {
      display: flex;
      list-style: none;
      gap: 40px;
      align-items: center;
    }

    .mainnav a {
      color: var(--text-primary);
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
      padding: 8px 16px;
      border-radius: 25px;
      transition: all 0.3s ease;
      position: relative;
    }

    .mainnav a:hover,
    .mainnav a.active {
      background: var(--gold-light);
      color: var(--brown-dark);
      transform: translateY(-2px);
    }

    .hamburger {
      display: none;
      background: none;
      border: none;
      font-size: 1.5rem;
      color: var(--text-primary);
      cursor: pointer;
    }

    /* Hero Section */
    .contact-hero {
      position: relative;
      min-height: 60vh;
      display: flex;
      align-items: center;
      background: linear-gradient(135deg, var(--cream-medium) 0%, var(--cream-dark) 100%);
      overflow: hidden;
      margin-top: 100px;
    }

    .contact-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="2" fill="%23d4af37" opacity="0.05"/><circle cx="80" cy="40" r="1" fill="%23b8860b" opacity="0.03"/><circle cx="40" cy="80" r="1.5" fill="%23cd9456" opacity="0.04"/></pattern></defs><rect width="1000" height="1000" fill="url(%23grain)"/></svg>');
      opacity: 0.6;
    }

    .contact-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      max-width: 600px;
      margin: 0 auto;
      padding: 4rem 2rem;
    }

    .contact-hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
      line-height: 1.1;
    }

    .contact-hero p {
      font-size: 1.2rem;
      color: var(--text-secondary);
      margin-bottom: 2rem;
    }

    /* Contact Section */
    .contact-main {
      background: var(--cream-light);
      padding: 100px 0;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: start;
    }

    .contact-info {
      background: var(--cream-medium);
      padding: 3rem;
      border-radius: 20px;
      border: 1px solid var(--cream-dark);
      box-shadow: 0 10px 30px var(--shadow-light);
    }

    .contact-info h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
    }

    .contact-info p {
      font-size: 1.1rem;
      color: var(--text-secondary);
      margin-bottom: 2rem;
      line-height: 1.7;
    }

    .contact-details {
      margin-bottom: 2rem;
    }

    .detail-item {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
      padding: 1rem;
      background: var(--cream-light);
      border-radius: 12px;
      border-left: 4px solid var(--gold-light);
      transition: all 0.3s ease;
    }

    .detail-item:hover {
      transform: translateX(5px);
      box-shadow: 0 5px 15px var(--shadow-light);
    }

    .detail-icon {
      font-size: 1.5rem;
      margin-right: 1rem;
      color: var(--gold-medium);
      min-width: 30px;
    }

    .detail-text {
      flex: 1;
    }

    .detail-text strong {
      color: var(--text-primary);
      font-weight: 600;
      display: block;
      margin-bottom: 0.2rem;
    }

    .detail-text a {
      color: var(--gold-medium);
      text-decoration: none;
      font-weight: 500;
    }

    .detail-text a:hover {
      color: var(--gold-dark);
    }

    /* Contact Form Section */
    .contact-form-section {
      background: var(--cream-medium);
      padding: 3rem;
      border-radius: 20px;
      border: 1px solid var(--cream-dark);
      box-shadow: 0 10px 30px var(--shadow-light);
    }

    .contact-form-section h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .contact-form {
      display: grid;
      gap: 1.5rem;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      font-weight: 500;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .contact-form input,
    .contact-form textarea {
      padding: 1rem 1.2rem;
      border: 2px solid var(--cream-dark);
      border-radius: 12px;
      font-size: 1rem;
      font-family: inherit;
      background: var(--cream-light);
      color: var(--text-primary);
      transition: all 0.3s ease;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
      outline: none;
      border-color: var(--gold-light);
      background: white;
      box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }

    .contact-form textarea {
      resize: vertical;
      min-height: 120px;
    }

    .contact-form button {
      width: 100%;
      padding: 1rem 2rem;
      background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-medium) 100%);
      color: var(--brown-dark);
      border: none;
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 1rem;
    }

    .contact-form button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px var(--shadow-medium);
      background: linear-gradient(135deg, var(--gold-medium) 0%, var(--gold-dark) 100%);
      color: var(--cream-light);
    }

    .contact-form button:disabled {
      opacity: 0.7;
      cursor: not-allowed;
      transform: none;
    }

    /* Newsletter Section */
    .newsletter {
      padding: 80px 0;
      background: linear-gradient(135deg, var(--brown-dark) 0%, var(--brown-medium) 100%);
      color: var(--cream-light);
      text-align: center;
    }

    .newsletter-inner {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 2rem;
    }

    .newsletter h3 {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .newsletter p {
      font-size: 1.1rem;
      opacity: 0.9;
      max-width: 500px;
    }

    .newsletter-form {
      display: flex;
      gap: 1rem;
      max-width: 400px;
      width: 100%;
    }

    .newsletter-form input {
      flex: 1;
      padding: 16px 20px;
      border: none;
      border-radius: 50px;
      font-size: 1rem;
      background: var(--cream-light);
      color: var(--text-primary);
    }

    .newsletter-form input:focus {
      outline: none;
      box-shadow: 0 0 0 3px var(--gold-light);
    }

    .newsletter-form button {
      padding: 16px 32px;
      background: var(--gold-light);
      color: var(--brown-dark);
      border: none;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .newsletter-form button:hover {
      background: var(--gold-medium);
      transform: translateY(-2px);
    }

    /* Footer */
    .site-footer {
      background: var(--text-primary);
      color: var(--cream-light);
      padding: 60px 0 30px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 3rem;
      margin-bottom: 3rem;
    }

    .footer-grid h4 {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      color: var(--gold-light);
    }

    .footer-grid ul {
      list-style: none;
    }

    .footer-grid li {
      margin-bottom: 0.8rem;
    }

    .footer-grid a {
      color: var(--cream-light);
      text-decoration: none;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }

    .footer-grid a:hover {
      opacity: 1;
      color: var(--gold-light);
    }

    .footer-facebook iframe {
      border-radius: 12px;
      border: 1px solid var(--brown-medium);
    }

    .copyright {
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid var(--brown-medium);
      color: var(--cream-light);
      opacity: 0.7;
    }

    .copyright a {
      color: var(--gold-light);
      text-decoration: none;
    }

    /* Message Styles */
    .form-message {
      padding: 1rem;
      border-radius: 10px;
      margin-top: 1rem;
      font-weight: 500;
      display: none;
    }

    .form-message.success {
      background: var(--cream-light);
      border: 1px solid var(--gold-light);
      color: var(--text-primary);
    }

    .form-message.error {
      background: #ffeaea;
      border: 1px solid #ffcdcd;
      color: #d63031;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .hamburger {
        display: block;
      }

      .mainnav {
        display: none;
        position: fixed;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--cream-light);
        padding: 2rem;
        box-shadow: 0 4px 20px var(--shadow-medium);
      }

      .mainnav.active {
        display: block;
        animation: slideDown 0.3s ease;
      }

      .mainnav ul {
        flex-direction: column;
        gap: 1rem;
      }

      .contact-hero {
        margin-top: 80px;
        min-height: 50vh;
      }

      .contact-hero-content {
        padding: 2rem 1rem;
      }

      .contact-main {
        padding: 60px 0;
      }

      .contact-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
      }

      .contact-info,
      .contact-form-section {
        padding: 2rem 1.5rem;
      }

      .newsletter-form {
        flex-direction: column;
        gap: 1rem;
      }

      .footer-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <style>
    /* Premium Contact Page Styling */
    .contact-hero {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 120px 0 80px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    
    .contact-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="white" opacity="0.1"/><circle cx="80" cy="40" r="0.5" fill="white" opacity="0.1"/><circle cx="40" cy="80" r="1.5" fill="white" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      opacity: 0.3;
    }
    
    .contact-hero-content {
      position: relative;
      z-index: 2;
    }
    
    .contact-hero h1 {
      font-size: 3.5rem;
      font-weight: 800;
      margin-bottom: 1rem;
      text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    
    .contact-hero p {
      font-size: 1.3rem;
      font-weight: 300;
      opacity: 0.95;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .contact-main {
      background: #f8fafc;
      padding: 80px 0;
    }
    
    .contact-flex {
      display: flex;
      gap: 40px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      flex-wrap: wrap;
      align-items: stretch;
    }
    
    .contact-left {
      flex: 1 1 500px;
      min-width: 320px;
      background: white;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      padding: 50px 40px;
      text-align: left;
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      border: 1px solid #e2e8f0;
    }
    
    .contact-right {
      flex: 1 1 500px;
      min-width: 320px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: stretch;
      margin-bottom: 20px;
    }
    
    .contact-title {
      font-size: 2.8rem;
      font-weight: 800;
      color: #2d3748;
      margin-bottom: 1.5rem;
      letter-spacing: -1px;
    }
    
    .contact-info {
      font-size: 1.2rem;
      color: #4a5568;
      margin-bottom: 2rem;
      line-height: 1.6;
    }
    
    .contact-details {
      margin-bottom: 2rem;
      font-size: 1.1rem;
    }
    
    .contact-details .detail-item {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      padding: 15px;
      background: #f7fafc;
      border-radius: 10px;
      border-left: 4px solid #667eea;
    }
    
    .contact-details .detail-icon {
      font-size: 1.2rem;
      margin-right: 15px;
      color: #667eea;
      width: 20px;
    }
    
    .contact-details a {
      color: #667eea;
      text-decoration: none;
      font-weight: 500;
    }
    
    .contact-details a:hover {
      color: #4c51bf;
    }
    
    .contact-form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 20px;
      background: white;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      border: 1px solid #e2e8f0;
    }
    
    .contact-form input,
    .contact-form textarea {
      font-size: 1.1rem;
      padding: 18px 16px;
      border-radius: 12px;
      border: 2px solid #e2e8f0;
      background: #f8fafc;
      transition: all 0.3s ease;
      font-family: inherit;
    }
    
    .contact-form input:focus,
    .contact-form textarea:focus {
      border-color: #667eea;
      outline: none;
      background: white;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .contact-form input[name="name"] {
      grid-column: 1;
    }
    
    .contact-form input[name="email"] {
      grid-column: 2;
    }
    
    .contact-form input[name="subject"] {
      grid-column: 1 / span 2;
    }
    
    .contact-form textarea {
      grid-column: 1 / span 2;
      resize: vertical;
      min-height: 120px;
    }
    
    .contact-form button {
      grid-column: 1 / span 2;
      width: 100%;
      margin-top: 10px;
      background: linear-gradient(45deg, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 18px 0;
      border-radius: 12px;
      font-size: 1.2rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-family: inherit;
    }
    
    .contact-form button:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    
    #contactMessage {
      grid-column: 1 / span 2;
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 10px;
      font-weight: 500;
    }
    
    @media (max-width: 768px) {
      .contact-hero h1 {
        font-size: 2.5rem;
      }
      
      .contact-hero p {
        font-size: 1.1rem;
      }
      
      .contact-main {
        padding: 60px 0;
      }
      
      .contact-flex {
        gap: 30px;
        padding: 0 15px;
      }
      
      .contact-left {
        padding: 30px 25px;
      }
      
      .contact-form {
        grid-template-columns: 1fr;
        padding: 30px 25px;
      }
      
      .contact-form input,
      .contact-form textarea,
      .contact-form button {
        grid-column: 1;
      }
      
      .contact-title {
        font-size: 2.2rem;
      }
    }
    
    .contact-form input:focus,
    .contact-form textarea:focus {
      border-color: #4d7cf3;
      outline: none;
    }
    .contact-form input[name="name"] {
      grid-column: 1;
      grid-row: 1;
    }
    .contact-form input[name="email"] {
      grid-column: 2;
      grid-row: 1;
    }
    .contact-form input[name="subject"] {
      grid-column: 1 / span 2;
      grid-row: 2;
    }
    .contact-form textarea {
      grid-column: 1 / span 2;
      grid-row: 3;
      resize: vertical;
      min-height: 110px;
    }
    .contact-form button {
      grid-column: 1 / span 2;
      grid-row: 4;
      width: 100%;
      margin-top: 10px;
      background: #4d7cf3;
      color: #fff;
      border: none;
      padding: 18px 0;
      border-radius: 8px;
      font-size: 1.18rem;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 2px 12px rgba(77,124,243,0.10);
      transition: all 0.18s;
    }
    .contact-form button:hover {
      background: #365dcf;
      transform: translateY(-2px);
      box-shadow: 0 4px 18px rgba(77,124,243,0.20);
    }
    @media (max-width: 700px) {
      .contact-form {
        grid-template-columns: 1fr;
        padding: 18px 6px 12px 6px;
        box-shadow: none;
      }
      .contact-form input,
      .contact-form textarea,
      .contact-form button {
        grid-column: 1;
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
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
          <img src="img/Dharaharalogo.png" alt="Dharahara Traders Logo" class="logo-img">
          <span class="logo-text">Dharahara Traders</span>
        </a>
        <button class="hamburger" onclick="toggleMenu()">☰</button>
        <nav class="mainnav" id="mainnav">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/shop">Products</a></li>
            <li><a href="/contact" class="active">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="contact-hero">
    <div class="container">
      <div class="contact-hero-content">
        <h1>Get in Touch</h1>
        <p>We're here to help you with all your import-export needs. Contact us for quality products and professional service.</p>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <main class="contact-main">
    <div class="container">
      <div class="contact-grid">
        <!-- Contact Information -->
        <div class="contact-info">
          <h2>Contact Information</h2>
          <p>Ready to start your next project with us? Get in touch and let's discuss how we can help you achieve your business goals.</p>
          
          <div class="contact-details">
            <div class="detail-item">
              <div class="detail-icon">📍</div>
              <div class="detail-text">
                <strong>Address</strong>
                Kathmandu, Nepal
              </div>
            </div>
            
            <div class="detail-item">
              <div class="detail-icon">📞</div>
              <div class="detail-text">
                <strong>Phone</strong>
                <a href="tel:+977-9818852676">+977-9818852676</a>
              </div>
            </div>
            
            <div class="detail-item">
              <div class="detail-icon">✉️</div>
              <div class="detail-text">
                <strong>Email</strong>
                <a href="mailto:info@dharaharatraders.com">info@dharaharatraders.com</a>
              </div>
            </div>
            
            <div class="detail-item">
              <div class="detail-icon">🌐</div>
              <div class="detail-text">
                <strong>Website</strong>
                <a href="http://dharaharatraders.com" target="_blank">dharaharatraders.com</a>
              </div>
            </div>
            
            <div class="detail-item">
              <div class="detail-icon">🕒</div>
              <div class="detail-text">
                <strong>Business Hours</strong>
                Monday - Friday: 9:00 AM - 6:00 PM
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-section">
          <h2>Send us a Message</h2>
          
          <div class="form-message" id="contactMessage"></div>
          
          <form class="contact-form" id="contactForm">
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" id="subject" name="subject" required>
            </div>
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" placeholder="Tell us about your requirements..." required></textarea>
            </div>
            
            <button type="submit" id="submitBtn">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Newsletter Section -->
  <section class="newsletter">
    <div class="container">
      <div class="newsletter-inner">
        <div>
          <h3>Stay Updated</h3>
          <p>Subscribe to our newsletter for the latest products, offers, and industry insights.</p>
        </div>
        <form class="newsletter-form" id="newsletterForm">
          <input name="email" placeholder="Enter your email" type="email" required>
          <button id="newsletterBtn" type="submit">Subscribe</button>
          <div class="form-message" id="newsletterMessage"></div>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  <script>
    // Mobile menu toggle
    function toggleMenu() {
      const nav = document.getElementById('mainnav');
      nav.classList.toggle('active');
    }

    // Header scroll effect
    window.addEventListener('scroll', function() {
      const header = document.querySelector('.site-header');
      if (window.scrollY > 100) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Contact form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      const messageDiv = document.getElementById('contactMessage');
      const submitBtn = document.getElementById('submitBtn');
      
      messageDiv.style.display = 'none';
      submitBtn.textContent = 'Sending...';
      submitBtn.disabled = true;
      
      fetch('process_contact.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        messageDiv.style.display = 'block';
        messageDiv.className = 'form-message ' + (data.success ? 'success' : 'error');
        messageDiv.textContent = data.success ? data.message : 'Error: ' + data.error;
        
        if (data.success) {
          this.reset();
        }
        
        submitBtn.textContent = 'Send Message';
        submitBtn.disabled = false;
        
        setTimeout(() => {
          messageDiv.style.display = 'none';
        }, 5000);
      })
      .catch(error => {
        messageDiv.style.display = 'block';
        messageDiv.className = 'form-message error';
        messageDiv.textContent = 'Error submitting form. Please try again.';
        
        submitBtn.textContent = 'Send Message';
        submitBtn.disabled = false;
      });
    });

    // Newsletter subscription
    document.getElementById('newsletterForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      const messageDiv = document.getElementById('newsletterMessage');
      const submitBtn = document.getElementById('newsletterBtn');
      
      submitBtn.textContent = 'Subscribing...';
      submitBtn.disabled = true;
      
      fetch('process_newsletter.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        messageDiv.style.display = 'block';
        messageDiv.className = 'form-message ' + (data.success ? 'success' : 'error');
        messageDiv.textContent = data.success ? data.message : 'Error: ' + data.error;
        
        if (data.success) {
          this.reset();
        }
        
        submitBtn.textContent = 'Subscribe';
        submitBtn.disabled = false;
        
        setTimeout(() => {
          messageDiv.style.display = 'none';
        }, 5000);
      })
      .catch(error => {
        messageDiv.style.display = 'block';
        messageDiv.className = 'form-message error';
        messageDiv.textContent = 'Error subscribing. Please try again.';
        
        submitBtn.textContent = 'Subscribe';
        submitBtn.disabled = false;
      });
    });
  </script>
</body>
</html>
