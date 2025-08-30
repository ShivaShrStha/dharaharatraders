# Dharahara Traders Website

Premium import-export company website built with PHP, featuring an ultra-modern creamy design and comprehensive admin system.

## 🌟 Features

- **Ultra-Premium Creamy Design** - Sophisticated color scheme with gold accents
- **Clean URL Structure** - SEO-friendly URLs without .php extensions
- **Comprehensive Admin System** - Complete product and content management
- **Responsive Design** - Optimized for all devices
- **Security First** - Built-in security measures and input validation
- **Newsletter Integration** - Email subscription system
- **Contact Management** - Inquiry tracking and response system
- **Product Catalog** - Full product management with categories and images

## 🚀 Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP 7.4+
- **Database**: SQLite 3
- **Server**: Apache/Nginx with .htaccess
- **Design**: Google Fonts (Inter, Playfair Display)

## 📁 Project Structure

# Dharahara Traders — Website

Professional import-export website built with plain PHP and SQLite. This repository contains the public site and a small admin dashboard for managing products, categories, inquiries and newsletters.

Built by Shiva Sharan Shrestha — released under the MIT License (see `LICENSE`).

Quick links
- Live pages: `/`, `/about`, `/products`, `/contact`, `/product?id=...`
- Admin: `/admin/dashboard.php`

Why this project
- Simple, self-hosted PHP site for small businesses.
- Clean URLs (no .php extensions) via `.htaccess` (Apache) and `router.php` for the PHP built-in server.
- Mobile-first responsive UI and lightweight admin panel.

Features
- Responsive frontend with modern typography and a warm cream/gold palette
- Admin dashboard: products, categories, inquiries, newsletter management
- SQLite-based data storage (zero external DB dependency)
- Clean URLs and friendly routing (works on Apache/nginx with rewrites and with `php -S` using `router.php`)
- Form processors for contact and newsletter

Repository layout
```
dharaharatraders/
├── index.php              # Homepage
├── about.php              # About page
├── products.php           # Products listing
├── product.php            # Product details (uses ?id=)
├── contact.php            # Contact page
├── shop.php               # Alternate shop listing
├── process_*.php          # Form handlers
├── router.php             # Dev server router for php -S
├── .htaccess              # Production rewrite rules
├── .env                   # Environment configuration (not committed)
├── admin/                 # Admin dashboard + API endpoints
├── includes/              # header.php, footer.php, CSS
├── img/                   # Static images
└── uploads/               # Uploaded product images
```

Quick start (local)
1. Clone the repo
   ```bash
   git clone <repo-url>
   cd dharaharatraders
   ```
2. Copy and edit environment config
   ```bash
   cp .env.example .env
   # Edit ADMIN_PASSWORD, DB_PATH, etc.
   ```
3. Run local dev server
   ```bash
   php -S localhost:8080 router.php
   # Visit http://localhost:8080/
   ```

Production notes
- Ensure the webserver document root is this project folder.
- Enable mod_rewrite (Apache) or equivalent for nginx and use the rules in `.htaccess`.
- Secure `.env` and `uploads/` directories with proper permissions.

License & attribution
- This project is released under the MIT License. See `LICENSE`.
- Please keep the author attribution in source files when redistributing.

Support
- Email: info@dharaharatraders.com

Thank you for using this project.

---

© 2025 Shiva Sharan Shrestha — Dharahara Traders Pvt. Ltd.
