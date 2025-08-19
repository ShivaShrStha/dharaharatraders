<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>About Us | Dharahara Traders Pvt. Ltd. | Premium Import Export Company Nepal</title>
  <meta name="description" content="Learn about Dharahara Traders Pvt. Ltd., Nepal's leading import-export company specializing in medical equipment, cosmetics, herbs, and electronics since our founding.">
  <meta name="keywords" content="about dharahara traders, import export nepal, company history, medical equipment supplier, premium products nepal">
  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/Dharaharalogo.png">
  
  <style>
    /* Ultra Premium Creamy Design */
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
      font-family: 'Inter', sans-serif;
      background: var(--cream-light);
      color: var(--text-primary);
      line-height: 1.6;
      overflow-x: hidden;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    /* Header */
    .header {
      background: var(--cream-light);
      border-bottom: 1px solid var(--cream-dark);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }

    .nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 0;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      text-decoration: none;
      color: var(--text-primary);
    }

    .logo img {
      width: 40px;
      height: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 15px var(--shadow-light);
    }

    .logo-text {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--gold-medium);
    }

    .nav-links {
      display: flex;
      list-style: none;
      gap: 2.5rem;
      align-items: center;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--text-secondary);
      font-weight: 500;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      position: relative;
    }

    .nav-links a:hover {
      color: var(--gold-medium);
    }

    .nav-links a.active {
      color: var(--gold-medium);
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--gold-medium);
      transition: width 0.3s ease;
    }

    .nav-links a:hover::after,
    .nav-links a.active::after {
      width: 100%;
    }

    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      font-size: 1.5rem;
      color: var(--text-primary);
      cursor: pointer;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg, var(--cream-medium) 0%, var(--cream-light) 100%);
      padding: 150px 0 100px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 30% 20%, var(--gold-light) 0%, transparent 50%),
                  radial-gradient(circle at 80% 80%, var(--accent) 0%, transparent 50%);
      opacity: 0.05;
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: 4rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
      line-height: 1.2;
    }

    .hero p {
      font-size: 1.25rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* About Content */
    .about-content {
      padding: 100px 0;
    }

    .content-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 5rem;
      align-items: center;
      margin-bottom: 6rem;
    }

    .content-text h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      color: var(--text-primary);
      margin-bottom: 2rem;
      line-height: 1.3;
    }

    .content-text p {
      font-size: 1.1rem;
      color: var(--text-secondary);
      margin-bottom: 1.5rem;
      line-height: 1.7;
    }

    .content-image {
      position: relative;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 50px var(--shadow-medium);
    }

    .content-image img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .content-image:hover img {
      transform: scale(1.05);
    }

    /* Stats Section */
    .stats-section {
      background: var(--cream-medium);
      padding: 80px 0;
      border-radius: 30px;
      margin: 50px 0;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 3rem;
      text-align: center;
    }

    .stat-item h3 {
      font-family: 'Playfair Display', serif;
      font-size: 3rem;
      color: var(--gold-medium);
      margin-bottom: 0.5rem;
      font-weight: 700;
    }

    .stat-item p {
      font-size: 1.1rem;
      color: var(--text-secondary);
      font-weight: 500;
    }

    /* Values Section */
    .values-section {
      padding: 100px 0;
    }

    .section-header {
      text-align: center;
      margin-bottom: 5rem;
    }

    .section-header h2 {
      font-family: 'Playfair Display', serif;
      font-size: 3rem;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
    }

    .section-header p {
      font-size: 1.2rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
    }

    .values-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 3rem;
    }

    .value-card {
      background: var(--cream-light);
      padding: 3rem 2.5rem;
      border-radius: 20px;
      text-align: center;
      border: 1px solid var(--cream-dark);
      box-shadow: 0 10px 30px var(--shadow-light);
      transition: all 0.4s ease;
    }

    .value-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px var(--shadow-medium);
    }

    .value-icon {
      width: 80px;
      height: 80px;
      background: var(--gold-light);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 2rem;
      font-size: 2rem;
      color: white;
    }

    .value-card h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .value-card p {
      color: var(--text-secondary);
      line-height: 1.6;
    }

    /* Footer */
    .footer {
      background: var(--brown-dark);
      color: var(--cream-light);
      padding: 80px 0 30px;
      margin-top: 100px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 3rem;
      margin-bottom: 3rem;
    }

    .footer-brand h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      color: var(--gold-light);
      margin-bottom: 1rem;
    }

    .footer-brand p {
      color: var(--cream-medium);
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .footer-section h4 {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      color: var(--gold-light);
    }

    .footer-section ul {
      list-style: none;
    }

    .footer-section li {
      margin-bottom: 0.8rem;
    }

    .footer-section a {
      color: var(--cream-medium);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-section a:hover {
      color: var(--gold-light);
    }

    .footer-bottom {
      border-top: 1px solid var(--brown-medium);
      padding-top: 2rem;
      text-align: center;
      color: var(--cream-medium);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
      }

      .mobile-menu-btn {
        display: block;
      }

      .hero h1 {
        font-size: 2.5rem;
      }

      .hero p {
        font-size: 1.1rem;
      }

      .content-grid {
        grid-template-columns: 1fr;
        gap: 3rem;
      }

      .content-text h2 {
        font-size: 2rem;
      }

      .section-header h2 {
        font-size: 2.5rem;
      }

      .values-grid {
        grid-template-columns: 1fr;
      }

      .footer-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="header">
    <div class="container">
      <nav class="nav">
        <a href="/" class="logo">
          <img src="img/Dharaharalogo.png" alt="Dharahara Traders Logo">
          <span class="logo-text">Dharahara Traders</span>
        </a>
        <ul class="nav-links">
          <li><a href="/">Home</a></li>
          <li><a href="/about" class="active">About</a></li>
          <li><a href="/shop">Shop</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
        <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
          ☰
        </button>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="hero-content">
        <h1>About Dharahara Traders</h1>
        <p>Pioneering excellence in import-export business across Nepal with premium quality products and unmatched service standards.</p>
      </div>
    </div>
  </section>

  <!-- About Content -->
  <section class="about-content">
    <div class="container">
      <div class="content-grid">
        <div class="content-text">
          <h2>Our Story</h2>
          <p>Founded with a vision to bridge global markets with Nepal's growing economy, Dharahara Traders Pvt. Ltd. has emerged as a trusted name in the import-export industry. We specialize in bringing premium quality medical equipment, cosmetics, herbs, and electronics to the Nepalese market.</p>
          <p>Our commitment to excellence and customer satisfaction has helped us build lasting relationships with suppliers worldwide and customers across Nepal. We believe in quality, integrity, and innovation as the cornerstones of our business philosophy.</p>
        </div>
        <div class="content-image">
          <img src="img/medical-equipment.jpg" alt="Medical Equipment">
        </div>
      </div>

      <div class="content-grid">
        <div class="content-image">
          <img src="img/Dharaharalogo.png" alt="Dharahara Traders Office">
        </div>
        <div class="content-text">
          <h2>Our Mission</h2>
          <p>To provide Nepal with access to premium international products while maintaining the highest standards of quality, service, and ethical business practices. We strive to be the gateway for global innovation entering the Nepalese market.</p>
          <p>Through strategic partnerships and careful selection of products, we ensure that every item we import meets international quality standards and addresses the specific needs of our customers in Nepal.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="stats-section">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <h3>500+</h3>
          <p>Products Imported</p>
        </div>
        <div class="stat-item">
          <h3>50+</h3>
          <p>Global Partners</p>
        </div>
        <div class="stat-item">
          <h3>1000+</h3>
          <p>Satisfied Customers</p>
        </div>
        <div class="stat-item">
          <h3>5+</h3>
          <p>Years Experience</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="values-section">
    <div class="container">
      <div class="section-header">
        <h2>Our Values</h2>
        <p>The principles that guide our business and define our commitment to excellence.</p>
      </div>
      <div class="values-grid">
        <div class="value-card">
          <div class="value-icon">🎯</div>
          <h3>Quality First</h3>
          <p>We never compromise on quality. Every product undergoes rigorous quality checks to ensure it meets international standards.</p>
        </div>
        <div class="value-card">
          <div class="value-icon">🤝</div>
          <h3>Trust & Integrity</h3>
          <p>Building lasting relationships through honest business practices and transparent communication with all our stakeholders.</p>
        </div>
        <div class="value-card">
          <div class="value-icon">🚀</div>
          <h3>Innovation</h3>
          <p>Constantly seeking new opportunities and innovative products that can benefit the Nepalese market and economy.</p>
        </div>
        <div class="value-card">
          <div class="value-icon">🌍</div>
          <h3>Global Reach</h3>
          <p>Leveraging our international network to bring the best products from around the world to Nepal.</p>
        </div>
        <div class="value-card">
          <div class="value-icon">⚡</div>
          <h3>Customer Focus</h3>
          <p>Our customers are at the heart of everything we do. We strive to exceed expectations in service and support.</p>
        </div>
        <div class="value-card">
          <div class="value-icon">🛡️</div>
          <h3>Reliability</h3>
          <p>Consistent delivery, dependable service, and unwavering commitment to our promises and partnerships.</p>
        </div>
      </div>
    </div>
  </section>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

  <script>
    function toggleMobileMenu() {
      const navLinks = document.querySelector('.nav-links');
      navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
    }
  </script>
</body>
</html>