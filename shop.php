<?php
// Products page for Dharahara Traders - Ultra Reliable Design
require_once 'admin/database.php';

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Get all active products
    $stmt = $conn->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY created_at DESC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Group products by category
    $productsByCategory = [];
    foreach ($products as $product) {
        $productsByCategory[$product['category']][] = $product;
    }
    
} catch(Exception $e) {
    $products = [];
    $productsByCategory = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reliable Products | Dharahara Traders Pvt. Ltd.</title>
    <meta name="description" content="Explore our reliable collection of medical equipment, cosmetics, herbs, and electronics. Quality products sourced globally for Nepal and beyond.">
    <meta name="keywords" content="reliable products nepal, medical equipment, cosmetics, herbs, electronics, quality imports, dharahara traders products">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Reliable Products | Dharahara Traders Pvt. Ltd.">
    <meta property="og:description" content="Explore our reliable collection of medical equipment, cosmetics, herbs, and electronics sourced globally.">
    <meta property="og:type" content="website">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Favicon -->
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

        .site-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            position: relative;
        }
        .nav-list {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-list li a {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s;
            padding: 8px 16px;
            border-radius: 8px;
        }
        .nav-list li a:hover {
            background: var(--gold-light);
            color: var(--brown-dark);
        }
        .nav-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            margin-left: 1rem;
            padding: 8px;
        }
        .hamburger, .hamburger::before, .hamburger::after {
            background: var(--brown-dark);
            height: 3px;
            width: 28px;
            border-radius: 2px;
            transition: all 0.3s;
        }
        .hamburger {
            display: block;
            position: relative;
        }
        .hamburger::before,
        .hamburger::after {
            content: '';
            position: absolute;
            left: 0;
        }
        .hamburger::before {
            top: -8px;
        }
        .hamburger::after {
            top: 8px;
        }
        @media (max-width: 900px) {
            .nav-list {
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 0;
                background: var(--cream-light);
                box-shadow: 0 8px 24px var(--shadow-light);
                border-radius: 12px;
                padding: 1.5rem 2rem;
                gap: 1.5rem;
                min-width: 180px;
                z-index: 100;
                display: none;
            }
            .site-nav.active .nav-list,
            #mainnav.active .nav-list {
                display: flex;
            }
            .nav-toggle {
                display: block;
            }
        }

        /* Hero Section */
        .products-hero {
            background: linear-gradient(135deg, var(--cream-medium) 0%, var(--gold-light) 100%);
            padding: 8rem 2rem 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .products-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4c085' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .products-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .products-hero p {
            font-size: clamp(1rem, 2vw, 1.2rem);
            color: var(--text-secondary);
            margin-bottom: 2rem;
        }

        /* Filter Section */
        .filter-section {
            background: var(--cream-medium);
            padding: 3rem 2rem;
            border-bottom: 1px solid var(--shadow-light);
        }

        .filter-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .filter-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--brown-dark);
            margin-bottom: 2rem;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .filter-btn {
            background: white;
            border: 2px solid var(--gold-light);
            color: var(--text-secondary);
            padding: 0.875rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 192, 133, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .filter-btn:hover::before {
            left: 100%;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--gold-light);
            border-color: var(--gold-light);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(201, 169, 110, 0.3);
        }

        /* Products Section */
        .products-section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            border: 1px solid var(--shadow-light);
            position: relative;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--gold-light), var(--cream-medium));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
            pointer-events: none;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .product-card:hover::before {
            opacity: 0.05;
        }

        .product-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            position: relative;
            z-index: 2;
        }

        .product-content {
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .product-category {
            background: linear-gradient(135deg, var(--gold-light), var(--brown-dark));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--brown-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .product-description {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gold-light);
            margin-bottom: 1.5rem;
        }

        .product-btn {
            background: linear-gradient(135deg, var(--gold-light), var(--brown-dark));
            color: white;
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .product-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(201, 169, 110, 0.4);
            color: white;
            text-decoration: none;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--gold-light);
            margin-bottom: 2rem;
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--brown-dark);
            margin-bottom: 1rem;
        }

        /* Footer */
        .footer {
            background: var(--brown-dark);
            color: var(--cream-light);
            padding: 4rem 2rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--gold-light);
        }

        .footer-section p,
        .footer-section li {
            margin-bottom: 0.75rem;
            color: rgba(254, 252, 247, 0.8);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section a {
            color: rgba(254, 252, 247, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--gold-light);
        }

        .footer-bottom {
            border-top: 1px solid rgba(254, 252, 247, 0.2);
            margin-top: 3rem;
            padding-top: 2rem;
            text-align: center;
            color: rgba(254, 252, 247, 0.6);
        }

        .facebook-embed {
            text-align: center;
        }

        .facebook-embed iframe {
            border-radius: 12px;
            border: 1px solid var(--brown-dark);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding-top: 100px;
            }

            .products-hero {
                padding: 6rem 1rem 3rem;
            }

            .filter-section {
                padding: 2rem 1rem;
            }

            .filter-buttons {
                flex-direction: column;
                align-items: center;
                gap: 0.75rem;
            }

            .filter-btn {
                width: 100%;
                max-width: 300px;
            }

            .products-section {
                padding: 3rem 1rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 480px) {
            .products-hero h1 {
                font-size: 2rem;
            }

            .filter-title {
                font-size: 1.5rem;
            }

            .product-content {
                padding: 1.5rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 3rem;
        }

        .loading .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--gold-light);
            border-top: 4px solid var(--gold-light);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

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
    </style>
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="products-hero">
        <div class="hero-content">
            <h1>Reliable Products</h1>
            <p>Discover our carefully curated collection of reliable products, sourced from trusted partners worldwide to ensure the highest quality for our valued customers.</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="filter-container">
            <h2 class="filter-title">Browse by Category</h2>
            <div class="filter-buttons">
                <button class="filter-btn active" data-category="all">All Products</button>
                <?php
                $categories = array_keys($productsByCategory);
                foreach ($categories as $category) {
                    if (!empty($category)) {
                        echo '<button class="filter-btn" data-category="' . htmlspecialchars($category) . '">' . 
                             htmlspecialchars(ucfirst($category)) . '</button>';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Loading products...</p>
        </div>

        <?php if (empty($products)): ?>
        <div class="empty-state">
            <i class="bi bi-box-seam"></i>
            <h3>No Products Available</h3>
            <p>We're currently updating our product catalog. Please check back soon!</p>
        </div>
        <?php else: ?>
        <div class="products-grid" id="products-grid">
            <?php
            foreach ($products as $product):
                // Use same image logic as index.php
                $img = 'img/placeholder-product.jpg';
                if (!empty($product['image'])) {
                    $img = htmlspecialchars($product['image']);
                } else {
                    $name = strtolower($product['name']);
                    $cat = strtolower($product['category']);
                    if (strpos($name, 'thermometer') !== false) {
                        $img = 'img/digital-thermometer.jpg';
                    } elseif (strpos($name, 'oximeter') !== false) {
                        $img = 'img/pulse-oximeter.jpg';
                    } elseif (strpos($name, 'smart watch') !== false) {
                        $img = 'img/bluetooth-smart-watch.jpg';
                    } elseif (strpos($name, 'glucose') !== false) {
                        $img = 'img/blood-glucose-monitor.jpg';
                    } elseif (strpos($name, 'ecg') !== false) {
                        $img = 'img/ecg-monitor.jpg';
                    } elseif ($cat === 'medical') {
                        $img = 'img/medical-equipment.jpg';
                    } elseif ($cat === 'electronics') {
                        $img = 'img/electronics.jpg';
                    } elseif ($cat === 'cosmetic' || $cat === 'cosmetics' || strpos($name, 'cream') !== false) {
                        $img = 'img/himalayan-face-cream.jpg';
                    }
                }
            ?>
            <div class="product-card" data-category="<?= htmlspecialchars($product['category']) ?>">
                <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image">
                <div class="product-content">
                    <div class="product-category">
                        <?= htmlspecialchars(ucfirst($product['category'])) ?>
                    </div>
                    <h3 class="product-title">
                        <?= htmlspecialchars($product['name']) ?>
                    </h3>
                    <p class="product-description">
                        <?= htmlspecialchars(substr($product['description'], 0, 120)) ?>...
                    </p>
                    <?php if (!empty($product['price'])): ?>
                    <div class="product-price">
                        <?php 
                        if (is_numeric($product['price'])) {
                            echo 'NRP ' . htmlspecialchars(number_format($product['price'], 2));
                        } else {
                            echo htmlspecialchars($product['price']);
                        }
                        ?>
                    </div>
                    <?php endif; ?>
                    <a href="product.php?id=<?= $product['id'] ?>" class="product-btn">
                        View Details
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        // Mobile menu toggle
        function toggleMenu() {
            const nav = document.getElementById('mainnav');
            nav.classList.toggle('active');
        }

        // Close menu on outside click or link click
        document.addEventListener('click', function(e) {
            const nav = document.getElementById('mainnav');
            const toggle = document.querySelector('.nav-toggle');
            if (nav.classList.contains('active') && !nav.contains(e.target) && !toggle.contains(e.target)) {
                nav.classList.remove('active');
            }
            if (e.target.closest('.nav-list li a')) {
                nav.classList.remove('active');
            }
        });

        // Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const productCards = document.querySelectorAll('.product-card');
            const loading = document.getElementById('loading');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');

                    const category = this.getAttribute('data-category');
                    
                    // Show loading
                    loading.style.display = 'block';
                    
                    setTimeout(() => {
                        // Filter products
                        productCards.forEach(card => {
                            if (category === 'all' || card.getAttribute('data-category') === category) {
                                card.style.display = 'block';
                                card.style.animation = 'fadeInUp 0.5s ease';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                        
                        // Hide loading
                        loading.style.display = 'none';
                    }, 300);
                });
            });
        });

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
