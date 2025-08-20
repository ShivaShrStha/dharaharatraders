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
        <h4>Our Products</h4>
        <div style="font-size: 1.1rem; font-weight: 600; color: var(--gold-light); margin-bottom: 1rem;">
          Dharahara Traders Pvt. Ltd.
        </div>
        <ul style="list-style: none; padding: 0;">
          <li style="margin-bottom: 0.5rem; color: var(--cream-light); opacity: 0.9;">Medical Equipment</li>
          <li style="margin-bottom: 0.5rem; color: var(--cream-light); opacity: 0.9;">Cosmetics</li>
          <li style="margin-bottom: 0.5rem; color: var(--cream-light); opacity: 0.9;">Herbs</li>
          <li style="margin-bottom: 0.5rem; color: var(--cream-light); opacity: 0.9;">Surgical Instruments</li>
          <li style="margin-bottom: 0.5rem; color: var(--cream-light); opacity: 0.9;">Electronics</li>
        </ul>
      </div>
      <!-- Facebook Section -->
        <div class="facebook-section">
          <h2>Follow Us on Facebook</h2>
          <div class="facebook-embed">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdharahara.traders&tabs=timeline&width=350&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" 
                    width="350" 
                    height="500" 
                    style="border:none;overflow:hidden;border-radius:8px;box-shadow:0 4px 20px rgba(0,0,0,0.1);" 
                    scrolling="no" 
                    frameborder="0" 
                    allowfullscreen="true" 
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
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
