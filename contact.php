<?php // Contact page for Dharahara Traders - Ultra Reliable Design ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact Us | Dharahara Traders Pvt. Ltd.</title>
  <meta name="description" content="Get in touch with Dharahara Traders Pvt. Ltd. Contact us for reliable import-export services, product inquiries, and business partnerships in Nepal.">
  <meta name="keywords" content="contact dharahara traders, import export nepal contact, business inquiries, product inquiries, partnerships">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/Dharaharalogo.png">
  <?php
    $meta_title = 'Contact — Dharahara Traders';
    $meta_description = 'Contact Dharahara Traders for inquiries, partnerships, and product information.';
    $meta_url = 'https://dharaharatraders.com/contact';
    include 'includes/meta.php';
  ?>
  <link rel="stylesheet" href="/includes/header.css">
  <link rel="stylesheet" href="/includes/footer.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
    body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; background: #fefcf7; color: #2c1810; margin: 0; padding-top: 120px; }
    .contact-main { min-height: 100vh; }
    .contact-main .contact-flex { display: flex; flex-wrap: wrap; gap: 40px; max-width: 1200px; margin: 0 auto; padding: 0 20px; align-items: stretch; }
    .contact-main .contact-left { flex: 1 1 400px; min-width: 320px; background: #fff; border-radius: 20px; box-shadow: 0 8px 24px rgba(44,24,16,0.08); padding: 40px 30px; display: flex; flex-direction: column; justify-content: center; border: 1px solid #f5f1e8; }
    .contact-main .contact-left h2 { 
      font-family: 'Playfair Display', serif; 
      font-size: 2.2rem; 
      font-weight: 700; 
      margin-bottom: 1.5rem; 
      color: #2c1810; 
      text-align: left; 
      margin-top: 2.5rem; /* Add extra top margin for desktop */ 
      overflow: visible; 
      word-break: break-word; 
      white-space: normal; 
      display: block; 
    }
    .contact-main .contact-form { display: grid; gap: 1.2rem; }
    .contact-main .form-group { display: flex; flex-direction: column; }
    .contact-main .form-group label { font-weight: 500; margin-bottom: 0.5rem; color: #2c1810; }
    .contact-main .contact-form input, .contact-main .contact-form textarea { padding: 1rem 1.2rem; border: 2px solid #faf7f0; border-radius: 12px; font-size: 1rem; background: #fefcf7; color: #2c1810; transition: all 0.3s; }
    .contact-main .contact-form input:focus, .contact-main .contact-form textarea:focus { outline: none; border-color: #d4af37; background: #fff; box-shadow: 0 0 0 3px rgba(212,175,55,0.08); }
    .contact-main .contact-form textarea { resize: vertical; min-height: 110px; }
    .contact-main .contact-form button { width: 100%; padding: 1rem 2rem; background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%); color: #fff; border: none; border-radius: 50px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: all 0.3s; margin-top: 1rem; }
    .contact-main .contact-form button:hover { background: linear-gradient(135deg, #b8860b 0%, #8b6914 100%); color: #fff; box-shadow: 0 8px 25px rgba(139,115,85,0.15); }
    .contact-main .form-message { padding: 1rem; border-radius: 10px; margin-top: 1rem; font-weight: 500; display: none; }
    .contact-main .form-message.success { background: #fefcf7; border: 1px solid #d4af37; color: #2c1810; }
    .contact-main .form-message.error { background: #ffeaea; border: 1px solid #ffcdcd; color: #d63031; }
    .contact-main .contact-right { flex: 1 1 400px; min-width: 320px; display: flex; align-items: center; justify-content: center; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 24px rgba(44,24,16,0.08); background: #faf7f0; border: 1px solid #f5f1e8; min-height: 400px; }
    .contact-main .contact-map { width: 100%; height: 400px; border: none; border-radius: 20px; box-shadow: 0 4px 16px rgba(44,24,16,0.07); }
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
      color: #2c1810;
      text-decoration: none;
      font-weight: 500;
      font-size: 1rem;
      transition: color 0.3s;
      padding: 8px 16px;
      border-radius: 8px;
    }
    .nav-list li a:hover {
      background: #ecd9b0;
      color: #8b7355;
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
      .contact-main .contact-flex { flex-direction: column; gap: 30px; padding: 0 10px; } 
      .contact-main .contact-left, .contact-main .contact-right { min-width: 0; padding: 30px 10px; } 
      .contact-main .contact-map { height: 300px; } 
      .contact-main .contact-left h2 {
        font-size: 1.6rem;
        margin-bottom: 1rem;
        text-align: center;
        word-break: break-word;
        white-space: normal;
        display: block;
      }
      .nav-list {
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 0;
        background: #fefcf7;
        box-shadow: 0 8px 24px rgba(139, 115, 85, 0.1);
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
    @media (max-width: 600px) { 
      .contact-main .contact-left, .contact-main .contact-right { padding: 18px 2px; } 
      .contact-main .contact-map { height: 220px; } 
      .contact-main .contact-left h2 {
        font-size: 1.2rem;
        margin-bottom: 0.7rem;
        text-align: center;
        word-break: break-word;
        white-space: normal;
        display: block;
      }
    }
    @media (min-width: 901px) {
      .contact-main .contact-left h2 {
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        text-align: left;
        word-break: break-word;
        white-space: normal;
        display: block;
      }
    }
  </style>
</head>
<body>
  <?php include 'includes/header.php'; ?>
  <main class="contact-main">
    <div class="contact-flex">
      <!-- Left: Contact Form -->
      <div class="contact-left">
        <h2>Contact Us</h2>
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
      <!-- Right: Map -->
      <div class="contact-right">
        <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.484234533395!2d85.3145!3d27.6959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1909b6e6e6e1%3A0x7e6e6e6e6e6e6e6e!2sTripureshwor%2C%20Kathmandu%2C%20Nepal!5e0!3m2!1sen!2snp!4v1680000000000!5m2!1sen!2snp" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </main>
  <?php include 'includes/footer.php'; ?>
  <script>
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
        setTimeout(() => { messageDiv.style.display = 'none'; }, 5000);
      })
      .catch(error => {
        messageDiv.style.display = 'block';
        messageDiv.className = 'form-message error';
        messageDiv.textContent = 'Error submitting form. Please try again.';
        submitBtn.textContent = 'Send Message';
        submitBtn.disabled = false;
      });
    });

    function toggleMenu() {
      const nav = document.getElementById('mainnav');
      nav.classList.toggle('active');
    }

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
  </script>
  <?php
  if (!empty($product['price'])): ?>
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
</body>
</html>
