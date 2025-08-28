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
  <link rel="stylesheet" href="includes/header.css">
  <link rel="stylesheet" href="includes/footer.css">
  <style>
    :root {
      --cream-light: #fefcf7;
      --cream-medium: #faf7f0;
      --cream-dark: #f5f1e8;
      --brown-dark: #8b7355;
      --gold-light: #ecd9b0;
      --shadow-light: rgba(139, 115, 85, 0.1);
      --text-secondary: #6c5c3a;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; background: var(--cream-light); color: var(--text-primary); line-height: 1.6; overflow-x: hidden; padding-top: 120px; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }

    /* HERO SECTION */
    .hero {
      background: linear-gradient(135deg, var(--cream-medium) 0%, var(--cream-dark) 100%);
      padding: 80px 0 40px 0;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .hero-content {
      max-width: 700px;
      margin: 0 auto;
      padding: 2rem;
      background: rgba(255,255,255,0.85);
      border-radius: 18px;
      box-shadow: 0 8px 32px var(--shadow-light);
    }
    .hero-content h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      font-weight: 700;
      color: #8b7355;
      margin-bottom: 1.2rem;
      letter-spacing: 1px;
    }
    .hero-content p {
      font-size: 1.25rem;
      color: var(--text-secondary);
      margin-bottom: 0;
    }

    /* ABOUT CONTENT */
    .about-content {
      padding: 60px 0 30px 0;
      background: var(--cream-light);
    }
    .content-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3rem;
      align-items: center;
      margin-bottom: 3rem;
    }
    .content-text h2 {
      font-size: 2rem;
      font-family: 'Playfair Display', serif;
      color: #3661b7;
      margin-bottom: 1rem;
      font-weight: 700;
    }
    .content-text p {
      font-size: 1.1rem;
      color: var(--text-secondary);
      margin-bottom: 1.2rem;
      line-height: 1.7;
    }
    .content-image img {
      width: 100%;
      border-radius: 18px;
      box-shadow: 0 8px 32px var(--shadow-light);
      object-fit: cover;
      min-height: 220px;
      max-height: 340px;
    }

    /* STATS SECTION */
    .stats-section {
      background: var(--cream-medium);
      padding: 60px 0;
    }
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 2.5rem;
      text-align: center;
      max-width: 900px;
      margin: 0 auto;
    }
    .stat-item {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 16px var(--shadow-light);
      padding: 2.5rem 1.2rem;
      transition: box-shadow 0.3s;
    }
    .stat-item:hover {
      box-shadow: 0 8px 32px var(--shadow-light);
    }
    .stat-item h3 {
      font-size: 2.2rem;
      color: #b8860b;
      font-family: 'Playfair Display', serif;
      margin-bottom: 0.7rem;
      font-weight: 700;
    }
    .stat-item p {
      font-size: 1.08rem;
      color: #8b7355;
      font-weight: 600;
      margin-bottom: 0;
    }

    /* VALUES SECTION */
    .values-section {
      background: var(--cream-light);
      padding: 60px 0 40px 0;
    }
    .section-header {
      text-align: center;
      margin-bottom: 2.5rem;
    }
    .section-header h2 {
      font-size: 2.2rem;
      font-family: 'Playfair Display', serif;
      color: #3661b7;
      font-weight: 700;
      margin-bottom: 0.7rem;
    }
    .section-header p {
      font-size: 1.15rem;
      color: var(--text-secondary);
      margin-bottom: 0;
    }
    .values-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }
    .value-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 4px 16px var(--shadow-light);
      padding: 2.2rem 1.2rem 1.7rem 1.2rem;
      text-align: center;
      transition: box-shadow 0.3s, transform 0.3s;
      position: relative;
      overflow: hidden;
    }
    .value-card:hover {
      box-shadow: 0 8px 32px var(--shadow-light);
      transform: translateY(-6px) scale(1.03);
    }
    .value-icon {
      font-size: 2.7rem;
      margin-bottom: 1.1rem;
      color: #ecd9b0;
      filter: drop-shadow(0 2px 8px #ecd9b0);
    }
    .value-card h3 {
      font-size: 1.25rem;
      font-family: 'Playfair Display', serif;
      color: #8b7355;
      font-weight: 700;
      margin-bottom: 0.7rem;
    }
    .value-card p {
      font-size: 1.05rem;
      color: var(--text-secondary);
      margin-bottom: 0;
      line-height: 1.6;
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 900px) {
      .hero-content h1 { font-size: 2.1rem; }
      .content-grid { grid-template-columns: 1fr; gap: 2rem; }
      .content-image img { min-height: 160px; max-height: 220px; }
      .stats-grid { grid-template-columns: 1fr 1fr; gap: 1.2rem; }
      .values-grid { grid-template-columns: 1fr 1fr; gap: 1.2rem; }
    }
    @media (max-width: 600px) {
      .hero { padding: 40px 0 20px 0; }
      .hero-content { padding: 1rem; }
      .hero-content h1 { font-size: 1.3rem; }
      .content-grid { gap: 1rem; }
      .content-image img { min-height: 100px; max-height: 140px; }
      .stats-section { padding: 30px 0; }
      .stats-grid { grid-template-columns: 1fr; gap: 0.7rem; }
      .stat-item { padding: 1.2rem 0.7rem; }
      .values-section { padding: 30px 0 20px 0; }
      .values-grid { grid-template-columns: 1fr; gap: 0.7rem; }
      .value-card { padding: 1.2rem 0.7rem 1rem 0.7rem; }
      .value-icon { font-size: 2rem; }
    }
  </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
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
          <img src="img/Dharaharalogo.png" alt="Medical Equipment">
        </div>
      </div>

      <div class="content-grid">
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
    function toggleMenu() {
      const nav = document.getElementById('mainnav');
      nav.classList.toggle('active');
    }
  </script>
  <script>
document.addEventListener("DOMContentLoaded", function() {
  function animateCount(el, target, duration = 1500) {
    let start = 0;
    let startTime = null;
    function update(timestamp) {
      if (!startTime) startTime = timestamp;
      const progress = Math.min((timestamp - startTime) / duration, 1);
      el.textContent = Math.floor(progress * (target - start) + start);
      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        el.textContent = target + "+";
      }
    }
    requestAnimationFrame(update);
  }

  document.querySelectorAll('.stat-item h3').forEach(stat => {
    const target = parseInt(stat.textContent.replace(/\D/g, ''));
    animateCount(stat, target);
  });
});
</script>
</body>
</html>