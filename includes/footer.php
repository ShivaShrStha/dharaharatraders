<?php
// Unified Footer Component for Dharahara Traders
?>
<!-- Footer -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <h4>Useful Links</h4>
        <ul>
          <li><a href="/about">About us</a></li>
          <li><a href="/shop">Products</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4>Contact Info</h4>
        <ul>
          <li>Kathmandu, Nepal</li>
          <li>Phone: +977-9818852676</li>
          <li>Email: <a href="mailto:info@dharaharatraders.com">info@dharaharatraders.com</a></li>
        </ul>
      </div>
      <div>
        <h4>Our Brand</h4>
        <div style="font-size: 1.3rem; font-weight: 600; color: var(--gold-light); margin-bottom: 0.5rem;">
          Dharahara Traders Pvt. Ltd.
        </div>
        <p style="font-size: 0.95rem; color: var(--cream-light); margin: 0; opacity: 0.8;">
          Quality • Trust • Excellence
        </p>
        <a href="http://dharaharatraders.com/" target="_blank" style="color: var(--gold-light); text-decoration: none; font-size: 0.9rem; display: block; margin-top: 0.5rem;">
          dharaharatraders.com
        </a>
      </div>
      <div class="footer-facebook">
        <h4>Find us on Facebook</h4>
        <div class="fb-page-embed">
          <div style="background: var(--cream-dark); border-radius: 8px; padding: 20px; text-align: center; border: 1px solid var(--brown-light);">
            <div style="font-size: 1.1rem; font-weight: 600; color: var(--gold-light); margin-bottom: 10px;">Follow Us</div>
            <p style="color: var(--text-secondary); margin-bottom: 15px; font-size: 0.9rem;">Connect with us on social media for updates</p>
            <a href="https://www.facebook.com/dharahara.traders" target="_blank" style="display: inline-block; background: #1877f2; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500; font-size: 0.9rem;">
              📘 Visit Facebook Page
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      © Copyright Dharahara Traders Pvt. Ltd. | Developed by <a href="https://shivasharanshrestha.com.np" target="_blank">Shiva Sharan Shrestha</a>
    </div>
  </div>
</footer>

<style>
/* Unified Footer Styles */
.site-footer {
  background: var(--text-primary, #2c1810);
  color: var(--cream-light, #fefcf7);
  padding: 60px 0 30px;
  margin-top: 50px;
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
  color: var(--gold-light, #d4af37);
}

.footer-grid ul {
  list-style: none;
  padding: 0;
}

.footer-grid li {
  margin-bottom: 0.8rem;
}

.footer-grid a {
  color: var(--cream-light, #fefcf7);
  text-decoration: none;
  opacity: 0.8;
  transition: opacity 0.3s ease;
}

.footer-grid a:hover {
  opacity: 1;
  color: var(--gold-light, #d4af37);
}

.footer-facebook iframe {
  border-radius: 12px;
  border: 1px solid var(--brown-medium, #6d5a3d);
}

.copyright {
  text-align: center;
  padding-top: 2rem;
  border-top: 1px solid var(--brown-medium, #6d5a3d);
  color: var(--cream-light, #fefcf7);
  opacity: 0.7;
}

.copyright a {
  color: var(--gold-light, #d4af37);
  text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
  .footer-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
}
</style>
