<?php
/**
 * Dharahara Traders — Website
 * Built by: Shiva Sharan Shrestha
 * License: MIT (see LICENSE)
 */
// Homepage for Dharahara Traders - Ultra Reliable Design
require_once 'admin/database.php';

// Get featured products
$featured_products = [];
try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY created_at DESC LIMIT 6");
    $stmt->execute();
    $featured_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(Exception $e) {
    // Continue without products if database error
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Dharahara Traders Pvt. Ltd. | Reliable Import Export Company Nepal</title>
  <meta name="description" content="Leading import-export company in Nepal specializing in medical equipment, cosmetics, herbs, and electronics. Quality products, global sourcing, trusted partnerships.">
  <meta name="keywords" content="import export nepal, medical equipment, cosmetics, herbs, electronics, dharahara traders, reliable products, global sourcing">
  <meta name="author" content="Dharahara Traders Pvt. Ltd.">
  
  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="Dharahara Traders Pvt. Ltd. | Reliable Import Export Company Nepal">
  <meta property="og:description" content="Leading import-export company in Nepal specializing in medical equipment, cosmetics, herbs, and electronics.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://dharaharatraders.com">
  <meta property="og:image" content="https://dharaharatraders.com/img/Dharaharalogo.png">
  
  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Dharahara Traders Pvt. Ltd. | Reliable Import Export Company Nepal">
  <meta name="twitter:description" content="Leading import-export company in Nepal specializing in medical equipment, cosmetics, herbs, and electronics.">
  
  <!-- Preload critical resources -->
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" as="style">
  <link rel="preload" href="img/Dharaharalogo.png" as="image">
  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/img/Dharaharalogo.png">
  <?php
    $meta_title = 'Dharahara Traders Pvt. Ltd. | Reliable Import Export Company Nepal';
    $meta_description = 'Leading import-export company in Nepal specializing in medical equipment, cosmetics, herbs, and electronics.';
    $meta_image = 'https://dharaharatraders.com/img/Dharaharalogo.png';
    $meta_url = 'https://dharaharatraders.com/';
    include 'includes/meta.php';
  ?>
  <!-- header styles included by include -> includes/header.php -->
  <link rel="stylesheet" href="/includes/footer.css">
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
  /* header spacing handled in includes/header.css */
  body { font-family: 'Inter', sans-serif; background: var(--cream-light); color: var(--text-primary); line-height: 1.6; overflow-x: hidden; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }

  

    /* Hero Section */
    .hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      background: linear-gradient(135deg, var(--cream-medium) 0%, var(--cream-dark) 100%);
      overflow: hidden;
      margin-top: 0; /* No margin needed with new header */
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="2" fill="%23d4af37" opacity="0.05"/><circle cx="80" cy="40" r="1" fill="%23b8860b" opacity="0.03"/><circle cx="40" cy="80" r="1.5" fill="%23cd9456" opacity="0.04"/></pattern></defs><rect width="1000" height="1000" fill="url(%23grain)"/></svg>');
      opacity: 0.6;
    }

    .hero-inner {
      position: relative;
      z-index: 2;
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
      padding: 4rem 2rem;
    }

    .eyebrow {
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: var(--gold-medium);
      margin-bottom: 1rem;
      opacity: 0;
      animation: fadeInUp 1s ease 0.2s forwards;
    }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(3rem, 6vw, 5rem);
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
      line-height: 1.1;
      opacity: 0;
      animation: fadeInUp 1s ease 0.4s forwards;
    }

    .hero-subtitle {
      font-size: 1.3rem;
      color: var(--text-secondary);
      margin-bottom: 2rem;
      font-weight: 400;
      opacity: 0;
      animation: fadeInUp 1s ease 0.6s forwards;
    }

    .hero-cta {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      opacity: 0;
      animation: fadeInUp 1s ease 0.8s forwards;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      padding: 16px 32px;
      font-size: 1.05rem;
      font-weight: 600;
      text-decoration: none;
      border-radius: 50px;
      transition: all 0.4s ease;
      border: 2px solid transparent;
      cursor: pointer;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-medium) 100%);
      color: var(--brown-dark);
      box-shadow: 0 8px 25px var(--shadow-light);
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px var(--shadow-light);
      background: linear-gradient(135deg, var(--gold-medium) 0%, var(--gold-dark) 100%);
      color: var(--cream-light);
    }

    .btn-secondary {
      background: transparent;
      color: var(--text-primary);
      border-color: var(--brown-dark);
    }

    .btn-secondary:hover {
      background: var(--brown-dark);
      color: var(--cream-light);
      transform: translateY(-3px);
      box-shadow: 0 8px 25px var(--shadow-light);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Features Section */
    .features {
      padding: 120px 0;
      background: var(--cream-light);
    }

    .section-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .section-eyebrow {
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--gold-medium);
      margin-bottom: 1rem;
    }

    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.5rem, 5vw, 3.5rem);
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
      line-height: 1.2;
    }

    .section-subtitle {
      font-size: 1.2rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2.5rem;
      margin-top: 4rem;
    }

    .feature-card {
      background: var(--cream-medium);
      padding: 3rem 2.5rem;
      border-radius: 20px;
      text-align: center;
      border: 1px solid var(--cream-dark);
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-medium) 100%);
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .feature-card:hover::before {
      opacity: 0.1;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px var(--shadow-light);
    }

    /* Fix emoji visibility in feature icons */
    .feature-icon {
      position: relative;
      z-index: 2;
      font-size: 3.5rem;
      margin-bottom: 1.5rem;
      color: var(--gold-light);
      font-family: 'Playfair Display', serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'NotoColorEmoji', 'Noto Emoji', sans-serif;
    }

    .feature-card h3 {
      position: relative;
      z-index: 2;
      font-size: 1.4rem;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .feature-card p {
      position: relative;
      z-index: 2;
      color: var(--text-secondary);
      line-height: 1.6;
    }

    /* Products Section */
    .products-section {
      padding: 120px 0;
      background: var(--cream-medium);
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      margin-top: 4rem;
    }

    .product-card {
      background: var(--cream-light);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 30px var(--shadow-light);
      transition: all 0.4s ease;
      border: 1px solid var(--cream-dark);
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px var(--shadow-light);
    }

    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .product-card:hover .product-image {
      transform: scale(1.05);
    }

    .product-info {
      padding: 1.5rem;
    }

    .product-category {
      font-size: 0.85rem;
      font-weight: 500;
      color: var (--gold-medium);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 0.5rem;
    }

    .product-name {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .product-price {
      font-size: 1.2rem;
      font-weight: 700;
      color: var (--gold-medium);
      margin-bottom: 1rem;
    }

    .product-link {
      display: inline-flex;
      align-items: center;
      color: var(--brown-dark);
      text-decoration: none;
      font-weight: 500;
      font-size: 0.9rem;
      transition: color 0.3s ease;
    }

    .product-link:hover {
      color: var(--gold-medium);
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
    /* Remove conflicting styles and use shared footer.css */

    /* Responsive Design */
    @media (max-width: 768px) {
      body {
        padding-top: 100px;
      }

      .hero {
        min-height: 90vh;
      }

      .hero-inner {
        padding: 2rem 1rem;
      }

      .hero-cta {
        flex-direction: column;
        align-items: center;
      }

      .btn {
        width: 100%;
        max-width: 280px;
        justify-content: center;
      }

      .features,
      .products-section {
        padding: 80px 0;
      }

      .section-title {
        font-size: 2.5rem;
      }

      .features-grid,
      .products-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
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

    @media (max-width: 600px) {
      .product-image {
        height: auto;
        max-height: 180px;
        min-height: 120px;
      }
      .product-content {
        padding: 1rem;
      }
      .products-grid {
        gap: 1rem;
      }
      .product-btn, .filter-btn {
        padding: 1rem 1.5rem;
        font-size: 1rem;
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
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
      <div class="container">
        <div class="hero-inner">
          <div class="eyebrow">Reliable Import Export</div>
          <h1>Dharahara Traders</h1>
          <p class="hero-subtitle">Your trusted partner for reliable quality products from Nepal to the world. Specializing in medical equipment, cosmetics, herbs, and electronics.</p>
          <div class="hero-cta">
            <a href="products" class="btn btn-primary">Explore Products</a>
            <a href="contact" class="btn btn-secondary">Get in Touch</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features">
      <div class="container">
        <div class="section-header">
          <div class="section-eyebrow">Why Choose Us</div>
          <h2 class="section-title">Excellence in Every Trade</h2>
          <p class="section-subtitle">We deliver quality products with professional service, building lasting partnerships through trust and reliability.</p>
        </div>
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">🏆</div>
            <h3>Reliable Quality</h3>
            <p>We source only the finest products from certified manufacturers, ensuring the highest standards of quality and reliability.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🌍</div>
            <h3>Global Reach</h3>
            <p>Serving customers worldwide with efficient logistics and comprehensive import-export solutions across multiple markets.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🤝</div>
            <h3>Trusted Partnership</h3>
            <p>Building long-term relationships based on transparency, professional service, and commitment to customer satisfaction.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Fast Delivery</h3>
            <p>Streamlined processes and reliable logistics ensure timely delivery of your orders with full tracking and support.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">💼</div>
            <h3>Expert Support</h3>
            <p>Our experienced team provides professional guidance and support throughout your entire purchasing journey.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🎯</div>
            <h3>Custom Solutions</h3>
            <p>Tailored sourcing and supply chain solutions to meet your specific business needs and requirements.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
      <div class="container">
        <div class="section-header">
          <div class="section-eyebrow">Our Products</div>
          <h2 class="section-title">Featured Categories</h2>
          <p class="section-subtitle">Discover our reliable collection of carefully curated products across multiple categories.</p>
        </div>
        <div class="products-grid">
          <?php if (!empty($featured_products)): ?>
            <?php foreach ($featured_products as $product): ?>
              <div class="product-card">
                <?php
                  // Use actual uploaded product images with proper URL encoding
                  $img = '/img/placeholder.svg'; // Local fallback placeholder
                  
                  // Check for uploaded image (prefer image_url, fallback to image column)
                  $imagePath = !empty($product['image_url']) ? $product['image_url'] : (!empty($product['image']) ? $product['image'] : '');
                  
                  if (!empty($imagePath)) {
                    // Ensure path starts with slash and normalize
                    if (!str_starts_with($imagePath, '/')) {
                      $imagePath = '/' . $imagePath;
                    }
                    
                    // Extract directory and filename for proper URL encoding
                    $pathParts = pathinfo($imagePath);
                    $directory = $pathParts['dirname'];
                    $filename = $pathParts['basename'];
                    
                    // URL encode only the filename part to handle spaces
                    $encodedFilename = rawurlencode($filename);
                    $img = $directory . '/' . $encodedFilename;
                  }
                ?>
                <img src="<?php echo $img; ?>?v=<?php echo time(); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image" onerror="this.src='/img/placeholder.svg';">
                <div class="product-info">
                  <div class="product-category" style="color:#3661b7;font-weight:600;letter-spacing:1px;"><?php echo ucfirst($product['category']); ?></div>
                  <h3 class="product-name" style="color:#8b7355;font-weight:700;"><?php echo htmlspecialchars($product['name']); ?></h3>
                  <div class="product-price" style="color:#d63031;font-weight:700;">
                    <?php
                      // Show NRP price based on product type
                      $name = strtolower($product['name']);
                      if (strpos($name, 'thermometer') !== false) {
                        echo 'NRP 450';
                      } elseif (strpos($name, 'oximeter') !== false) {
                        echo 'NRP 1,500';
                      } elseif (strpos($name, 'smart watch') !== false) {
                        echo 'NRP 3,500';
                      } elseif (strpos($name, 'glucose') !== false) {
                        echo 'NRP 2,800';
                      } elseif (strpos($name, 'ecg') !== false) {
                        echo 'NRP 12,000';
                      } elseif (strpos($name, 'cream') !== false) {
                        echo 'NRP 800';
                      } elseif (strpos($name, 'medical') !== false) {
                        echo 'NRP 2,000+';
                      } elseif (strpos($name, 'electronics') !== false) {
                        echo 'NRP 2,500+';
                      } else {
                        if (!empty($product['price'])) {
                          echo 'NRP ' . htmlspecialchars($product['price']);
                        } else {
                          echo 'Contact for Price';
                        }
                      }
                    ?>
                  </div>
                  <a href="product?id=<?php echo $product['id']; ?>" class="product-link">View Details &rarr;</a>
                  <a href="https://wa.me/9779851040562?text=Hi! I'm interested in <?php echo urlencode($product['name']); ?>" class="product-link" target="_blank" style="color:#25D366;font-weight:600;">WhatsApp Inquiry</a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <!-- Default category cards when no products -->
            <div class="product-card">
              <img src="/img/medical-equipment.jpg" alt="Medical Equipment" class="product-image">
              <div class="product-info">
                <div class="product-category">Medical</div>
                <h3 class="product-name">Medical Equipment</h3>
                <div class="product-price">Contact for Price</div>
                <a href="products" class="product-link">View Products →</a>
              </div>
            </div>
            <div class="product-card">
              <img src="/img/placeholder.svg" alt="Cosmetics" class="product-image">
              <div class="product-info">
                <div class="product-category">Beauty</div>
                <h3 class="product-name">Cosmetics & Beauty</h3>
                <div class="product-price">Contact for Price</div>
                <a href="products" class="product-link">View Products →</a>
              </div>
            </div>
            <div class="product-card">
              <img src="/img/electronics.jpg" alt="Electronics" class="product-image">
              <div class="product-info">
                <div class="product-category">Electronics</div>
                <h3 class="product-name">Electronics</h3>
                <div class="product-price">Contact for Price</div>
                <a href="products" class="product-link">View Products →</a>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div style="text-align: center; margin-top: 3rem;">
          <a href="shop" class="btn btn-primary">View All Products</a>
        </div>
      </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
      <div class="container">
        <div class="newsletter-inner">
          <div>
            <h3 style="color:#3661b7;font-weight:700;">Stay Updated</h3>
            <p style="color:#8b7355;font-weight:500;">Subscribe to our newsletter for the latest products, offers, and industry insights.</p>
          </div>
          <form class="newsletter-form" id="newsletterForm">
            <input name="email" placeholder="Enter your email" type="email" required style="border:2px solid #3661b7;color:#8b7355;">
            <button id="newsletterBtn" type="submit" style="background:#25D366;color:white;font-weight:700;">Subscribe</button>
            <div class="form-message" id="newsletterMessage" style="display:none; margin-top:15px; padding:12px; border-radius:8px; font-size:0.9rem; width: 100%;"></div>
          </form>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script>
  // Mobile menu handled centrally in includes/header.php

        // Header scroll effect (keeping for potential future use)
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.site-header');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
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
                if (data.success) {
                    messageDiv.style.background = 'var(--cream-light)';
                    messageDiv.style.border = '1px solid var(--gold-light)';
                    messageDiv.style.color = 'var(--text-primary)';
                    messageDiv.textContent = data.message;
                    this.reset();
                } else {
                    messageDiv.style.background = '#ffeaea';
                    messageDiv.style.border = '1px solid #ffcdcd';
                    messageDiv.style.color = '#d63031';
                    messageDiv.textContent = 'Error: ' + data.error;
                }
                
                submitBtn.textContent = 'Subscribe';
                submitBtn.disabled = false;
                
                setTimeout(() => {
                    messageDiv.style.display = 'none';
                }, 5000);
            })
            .catch(error => {
                messageDiv.style.display = 'block';
                messageDiv.style.background = '#ffeaea';
                messageDiv.style.border = '1px solid #ffcdcd';
                messageDiv.style.color = '#d63031';
                messageDiv.textContent = 'Error subscribing. Please try again.';
                
                submitBtn.textContent = 'Subscribe';
                submitBtn.disabled = false;
            });
        });

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Loading animation
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    </script>
</body>
</html>
