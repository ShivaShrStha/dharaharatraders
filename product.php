<?php
// Product detail page for Dharahara Traders - Ultra Premium Design
$product_id = $_GET['id'] ?? null;

if (!$product_id) {
    header('Location: shop');
    exit;
}

require_once 'admin/database.php';

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ? AND status = 'active'");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$product) {
        header('Location: shop');
        exit;
    }
} catch(Exception $e) {
    header('Location: shop');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> | Dharahara Traders Pvt. Ltd.</title>
    <meta name="description" content="<?php echo htmlspecialchars(substr($product['description'], 0, 160)); ?>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/Dharaharalogo.png">
    
    <style>
        :root {
            --cream-light: #fefcf7;
            --cream-medium: #faf6ef;
            --cream-dark: #f5f0e6;
            --gold-light: #f4e5c1;
            --gold-medium: #e6d7a3;
            --gold-dark: #d4c085;
            --brown-light: #8b7355;
            --brown-medium: #6d5a3f;
            --brown-dark: #4a3d2a;
            --accent-gold: #c9a96e;
            --text-primary: #2c2416;
            --text-secondary: #5a4e3a;
            --border-subtle: #e8dcc6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--cream-light);
        }

        /* Navigation */
        .navbar {
            background: rgba(254, 252, 247, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-subtle);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--brown-dark);
            font-weight: 700;
        }

        .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--accent-gold);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--brown-dark);
            cursor: pointer;
        }

        /* Breadcrumb */
        .breadcrumb {
            background: var(--cream-medium);
            padding: 6rem 2rem 2rem;
            border-bottom: 1px solid var(--border-subtle);
        }

        .breadcrumb-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
        }

        .breadcrumb a {
            color: var(--accent-gold);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: var(--brown-dark);
        }

        /* Product Detail */
        .product-detail {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin-bottom: 4rem;
        }

        .product-images {
            position: relative;
        }

        .main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-subtle);
        }

        .product-info {
            padding: 2rem 0;
        }

        .product-category {
            background: linear-gradient(135deg, var(--accent-gold), var(--gold-dark));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 1.5rem;
            line-height: 1.3;
        }

        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent-gold);
            margin-bottom: 2rem;
        }

        .product-description {
            color: var(--text-secondary);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .product-features {
            background: var(--cream-medium);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .features-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--brown-dark);
            margin-bottom: 1rem;
        }

        .features-list {
            list-style: none;
        }

        .features-list li {
            margin-bottom: 0.75rem;
            color: var(--text-secondary);
            position: relative;
            padding-left: 2rem;
        }

        .features-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--accent-gold);
            font-weight: bold;
        }

        .product-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-gold), var(--gold-dark));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-size: 1rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(201, 169, 110, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-secondary {
            background: transparent;
            color: var(--accent-gold);
            border: 2px solid var(--accent-gold);
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-size: 1rem;
        }

        .btn-secondary:hover {
            background: var(--accent-gold);
            color: white;
            text-decoration: none;
        }

        /* Product Specifications */
        .specifications {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 3rem;
            border: 1px solid var(--border-subtle);
        }

        .spec-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--brown-dark);
            margin-bottom: 2rem;
            text-align: center;
        }

        .spec-grid {
            display: grid;
            gap: 1rem;
        }

        .spec-item {
            display: grid;
            grid-template-columns: 1fr 2fr;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-subtle);
        }

        .spec-item:last-child {
            border-bottom: none;
        }

        .spec-label {
            font-weight: 600;
            color: var(--brown-dark);
        }

        .spec-value {
            color: var(--text-secondary);
        }

        /* Related Products */
        .related-products {
            margin-top: 4rem;
        }

        .related-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--brown-dark);
            margin-bottom: 2rem;
            text-align: center;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .related-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            border: 1px solid var(--border-subtle);
        }

        .related-card:hover {
            transform: translateY(-5px);
        }

        .related-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .related-content {
            padding: 1.5rem;
        }

        .related-name {
            font-weight: 600;
            color: var(--brown-dark);
            margin-bottom: 0.5rem;
        }

        .related-category {
            color: var(--accent-gold);
            font-size: 0.9rem;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--cream-light);
                flex-direction: column;
                padding: 2rem;
                border-top: 1px solid var(--border-subtle);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex;
            }

            .mobile-menu-btn {
                display: block;
            }

            .breadcrumb {
                padding: 5rem 1rem 1rem;
            }

            .product-detail {
                padding: 3rem 1rem;
            }

            .product-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .product-title {
                font-size: 2rem;
            }

            .product-price {
                font-size: 1.5rem;
            }

            .product-actions {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                text-align: center;
            }

            .specifications {
                padding: 2rem 1rem;
            }

            .spec-item {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="logo">
                <img src="img/Dharaharalogo.png" alt="Dharahara Traders Logo">
                <span class="logo-text">Dharahara Traders</span>
            </a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/shop" class="active">Shop</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                ☰
            </button>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="breadcrumb-container">
            <a href="/">Home</a>
            <i class="bi bi-chevron-right"></i>
            <a href="shop.php">Products</a>
            <i class="bi bi-chevron-right"></i>
            <span><?php echo htmlspecialchars($product['name']); ?></span>
        </div>
    </section>

    <!-- Product Detail -->
    <main class="product-detail">
        <div class="product-grid">
            <div class="product-images">
                <?php if (!empty($product['image'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         class="main-image"
                         onerror="this.src='img/placeholder-product.jpg'">
                <?php else: ?>
                    <img src="img/placeholder-product.jpg" 
                         alt="Product placeholder" 
                         class="main-image">
                <?php endif; ?>
            </div>

            <div class="product-info">
                <div class="product-category">
                    <?php echo htmlspecialchars(ucfirst($product['category'])); ?>
                </div>

                <h1 class="product-title">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h1>

                <?php if (!empty($product['price'])): ?>
                <div class="product-price">
                    <?php 
                    // Check if price is numeric
                    if (is_numeric($product['price'])) {
                        echo '$' . htmlspecialchars(number_format($product['price'], 2));
                    } else {
                        echo htmlspecialchars($product['price']);
                    }
                    ?>
                </div>
                <?php endif; ?>

                <div class="product-description">
                    <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                </div>

                <div class="product-features">
                    <h3 class="features-title">Key Features</h3>
                    <ul class="features-list">
                        <li>Premium quality materials</li>
                        <li>International standards compliance</li>
                        <li>Trusted manufacturer source</li>
                        <li>Quality assurance guarantee</li>
                        <li>Professional customer support</li>
                    </ul>
                </div>

                <div class="product-actions">
                    <a href="contact.php" class="btn-primary">
                        <i class="bi bi-envelope"></i> Request Quote
                    </a>
                    <a href="https://wa.me/9779818852676?text=Hi! I'm interested in <?php echo urlencode($product['name']); ?>" 
                       target="_blank" class="btn-secondary">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Specifications -->
        <section class="specifications">
            <h2 class="spec-title">Product Specifications</h2>
            <div class="spec-grid">
                <div class="spec-item">
                    <span class="spec-label">Product Name:</span>
                    <span class="spec-value"><?php echo htmlspecialchars($product['name']); ?></span>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Category:</span>
                    <span class="spec-value"><?php echo htmlspecialchars(ucfirst($product['category'])); ?></span>
                </div>
                <?php if (!empty($product['price'])): ?>
                <div class="spec-item">
                    <span class="spec-label">Price:</span>
                    <span class="spec-value">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></span>
                </div>
                <?php endif; ?>
                <div class="spec-item">
                    <span class="spec-label">Availability:</span>
                    <span class="spec-value">In Stock</span>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Origin:</span>
                    <span class="spec-value">Imported</span>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Quality Assurance:</span>
                    <span class="spec-value">International Standards</span>
                </div>
            </div>
        </section>

        <!-- Related Products -->
        <?php
        try {
            $stmt = $conn->prepare("SELECT * FROM products WHERE category = ? AND id != ? AND status = 'active' LIMIT 3");
            $stmt->execute([$product['category'], $product['id']]);
            $related_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (!empty($related_products)):
        ?>
        <section class="related-products">
            <h2 class="related-title">Related Products</h2>
            <div class="related-grid">
                <?php foreach ($related_products as $related): ?>
                <a href="product?id=<?php echo $related['id']; ?>" class="related-card">
                    <?php if (!empty($related['image'])): ?>
                        <img src="<?php echo htmlspecialchars($related['image']); ?>" 
                             alt="<?php echo htmlspecialchars($related['name']); ?>" 
                             class="related-image"
                             onerror="this.src='img/placeholder-product.jpg'">
                    <?php else: ?>
                        <img src="img/placeholder-product.jpg" 
                             alt="Product placeholder" 
                             class="related-image">
                    <?php endif; ?>
                    
                    <div class="related-content">
                        <div class="related-name">
                            <?php echo htmlspecialchars($related['name']); ?>
                        </div>
                        <div class="related-category">
                            <?php echo htmlspecialchars(ucfirst($related['category'])); ?>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php 
            endif;
        } catch(Exception $e) {
            // Ignore related products if error
        }
        ?>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }

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
