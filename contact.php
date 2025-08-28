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
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/Dharaharalogo.png">
  <link rel="stylesheet" href="includes/header.css">
  <link rel="stylesheet" href="includes/footer.css">
  <style>
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background: #fefcf7;
      color: #2c1810;
      padding-top: 120px;
      margin: 0;
    }
    .contact-flex {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      align-items: stretch;
    }
    .contact-left {
      flex: 1 1 400px;
      min-width: 320px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(44,24,16,0.08);
      padding: 40px 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      border: 1px solid #f5f1e8;
    }
    .contact-left h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #2c1810;
      text-align: left;
    }
    .contact-form {
      display: grid;
      gap: 1.2rem;
    }
    .form-group {
      display: flex;
      flex-direction: column;
    }
    .form-group label {
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: #2c1810;
    }
    .contact-form input,
    .contact-form textarea {
      padding: 1rem 1.2rem;
      border: 2px solid #faf7f0;
      border-radius: 12px;
      font-size: 1rem;
      background: #fefcf7;
      color: #2c1810;
      transition: all 0.3s;
    }
    .contact-form input:focus,
    .contact-form textarea:focus {
      outline: none;
      border-color: #d4af37;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(212,175,55,0.08);
    }
    .contact-form textarea {
      resize: vertical;
      min-height: 110px;
    }
    .contact-form button {
      width: 100%;
      padding: 1rem 2rem;
      background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%);
      color: #fff;
      border: none;
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 1rem;
    }
    .contact-form button:hover {
      background: linear-gradient(135deg, #b8860b 0%, #8b6914 100%);
      color: #fff;
      box-shadow: 0 8px 25px rgba(139,115,85,0.15);
    }
    .form-message {
      padding: 1rem;
      border-radius: 10px;
      margin-top: 1rem;
      font-weight: 500;
      display: none;
    }
    .form-message.success {
      background: #fefcf7;
      border: 1px solid #d4af37;
      color: #2c1810;
    }
    .form-message.error {
      background: #ffeaea;
      border: 1px solid #ffcdcd;
      color: #d63031;
    }
    .contact-right {
      flex: 1 1 400px;
      min-width: 320px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(44,24,16,0.08);
      background: #faf7f0;
      border: 1px solid #f5f1e8;
      min-height: 400px;
    }
    .contact-map {
      width: 100%;
      height: 400px;
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 16px rgba(44,24,16,0.07);
    }
    @media (max-width: 900px) {
      .contact-flex {
        flex-direction: column;
        gap: 30px;
        padding: 0 10px;
      }
      .contact-left, .contact-right {
        min-width: 0;
        padding: 30px 10px;
      }
      .contact-map {
        height: 300px;
      }
    }
    @media (max-width: 600px) {
      .contact-left, .contact-right {
        padding: 18px 2px;
      }
      .contact-map {
        height: 220px;
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
        <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.484234533395!2d85.31232931506144!3d27.70619498279309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1909b6e6e6e1%3A0x7e6e6e6e6e6e6e6e!2sKathmandu%2C%20Nepal!5e0!3m2!1sen!2snp!4v1680000000000!5m2!1sen!2snp" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
  </script>
</body>
</html>
