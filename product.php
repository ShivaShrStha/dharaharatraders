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
            padding-top: 120px; /* Space for fixed header */
        }

        /* Header Styles */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--cream-light);
            box-shadow: 0 2px 10px rgba(139, 115, 85, 0.1);
        }

        .topbar {
            background: var(--brown-dark);
            color: var(--cream-light);
            padding: 8px 0;
            font-size: 0.9rem;
        }

        .topbar a {
            color: var(--cream-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .topbar a:hover {
            color: var(--gold-light);
        }

        .navwrap {
            background: var(--cream-light);
            border-bottom: 1px solid var(--border-subtle);
            padding: 1rem 0;
        }

        .navcontainer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--brown-dark);
            cursor: pointer;
        }

        .mainnav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
            margin: 0;
            padding: 0;
        }

        .mainnav a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 25px;
        }

        .mainnav a:hover,
        .mainnav a.active {
            color: var(--brown-dark);
            background: var(--gold-light);
        }

        .logo-img {
            height: 50px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .logo:hover .logo-img {
            transform: scale(1.05);
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
            body {
                padding-top: 100px;
            }

            .hamburger {
                display: block;
            }
            
            .mainnav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--cream-light);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                padding: 1rem 0;
            }
            
            .mainnav.active {
                display: block;
            }
            
            .mainnav ul {
                flex-direction: column;
                gap: 0;
                padding: 0 1rem;
            }
            
            .mainnav a {
                display: block;
                padding: 1rem;
                border-bottom: 1px solid var(--border-subtle);
            }

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
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: var(--cream-light);
            margin: 5% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 2rem 2.5rem 1rem;
            border-bottom: 1px solid var(--cream-dark);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--brown-dark);
            margin: 0;
        }

        .close {
            color: var(--text-muted);
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: var(--brown-dark);
        }

        .inquiry-form {
            padding: 2rem 2.5rem 2.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--brown-dark);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--cream-dark);
            border-radius: 10px;
            font-size: 1rem;
            background: var(--cream-light);
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--gold-light);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }

        .form-message {
            margin-top: 1rem;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .form-message.success {
            background: #e8f5e8;
            color: #2d5a2d;
            border: 1px solid #90c695;
        }

        .form-message.error {
            background: #ffeaea;
            color: #d63031;
            border: 1px solid #ffcdcd;
        }

        @media (max-width: 768px) {
            .modal-content {
                margin: 10% auto;
                width: 95%;
            }

            .modal-header,
            .inquiry-form {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
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
            <div class="navcontainer">
                <a class="logo" href="/">
                    <img src="/img/Dharaharalogo.png" alt="Dharahara Traders Logo" class="logo-img">
                    <span class="logo-text">Dharahara Traders</span>
                </a>
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <nav class="mainnav" id="mainnav">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/shop" class="active">Products</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="breadcrumb-container">
            <a href="/">Home</a>
            <i class="bi bi-chevron-right"></i>
            <a href="/shop">Products</a>
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
                    <button class="btn-primary" onclick="openInquiryModal()">
                        <i class="bi bi-envelope"></i> Send Inquiry
                    </button>
                    <a href="https://wa.me/9779818852676?text=Hi! I'm interested in <?php echo urlencode($product['name']); ?>" 
                       target="_blank" class="btn-secondary">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Inquiry Modal -->
        <div id="inquiryModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Product Inquiry: <?php echo htmlspecialchars($product['name']); ?></h3>
                    <span class="close" onclick="closeInquiryModal()">&times;</span>
                </div>
                <form id="inquiryForm" class="inquiry-form">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
                    
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    
                    <div class="form-group">
                        <label for="company">Company/Organization</label>
                        <input type="text" id="company" name="company">
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Quantity Interested</label>
                        <input type="number" id="quantity" name="quantity" min="1">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message/Requirements *</label>
                        <textarea id="message" name="message" rows="4" required placeholder="Please describe your requirements, timeline, or any specific questions about this product..."></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="closeInquiryModal()">Cancel</button>
                        <button type="submit" class="btn-primary">
                            <i class="bi bi-send"></i> Send Inquiry
                        </button>
                    </div>
                    
                    <div id="inquiryMessage" class="form-message" style="display: none;"></div>
                </form>
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
                    <span class="spec-value">
                        <?php 
                        // Check if price is numeric before formatting
                        if (is_numeric($product['price'])) {
                            echo '$' . htmlspecialchars(number_format($product['price'], 2));
                        } else {
                            echo htmlspecialchars($product['price']);
                        }
                        ?>
                    </span>
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
        function toggleMenu() {
            const nav = document.getElementById('mainnav');
            nav.classList.toggle('active');
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

        // Inquiry Modal Functions
        function openInquiryModal() {
            document.getElementById('inquiryModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeInquiryModal() {
            document.getElementById('inquiryModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('inquiryModal');
            if (event.target === modal) {
                closeInquiryModal();
            }
        });

        // Handle inquiry form submission
        document.getElementById('inquiryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            // Show loading state
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            fetch('process_inquiry.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Thank you! Your inquiry has been sent successfully. We will contact you soon.');
                    this.reset();
                    closeInquiryModal();
                } else {
                    alert('Error: ' + (data.message || 'Failed to send inquiry. Please try again.'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to send inquiry. Please try again or contact us directly.');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    </script>
</body>
</html>
