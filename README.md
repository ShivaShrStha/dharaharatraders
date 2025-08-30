# Dharahara Traders Website

Author: Shiva Sharan Shrestha — https://shivasharanshrestha.com.np

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
# Dharahara Traders

Lightweight, self-hosted e-commerce website and admin panel built with plain PHP and SQLite.

This repository contains the public storefront and a minimal admin dashboard used to manage products, categories, inquiries and newsletters.

Goals
- Easy to read, maintainable PHP (no framework)
- Clean, SEO-friendly URLs
- Responsive, lightweight frontend that works across phones, tablets and desktops
- Small operational footprint (SQLite, simple PHP entrypoints)

Key features
- Responsive storefront and product pages
- Clean URLs (via `router.php` + server rewrites)
- Admin dashboard for product and inquiry management (`/admin`)
- Newsletter and contact form handlers
- SQLite database (zero external DB dependency)

Tech stack
- PHP 7.4+
- SQLite 3
- Vanilla JS, HTML, CSS

Quick start (local)
1. Clone and enter the project:

```bash
git clone <repo-url>
cd dharaharatraders
```

2. Prepare environment (create a production `.env` locally):

```bash
cp .env.example .env
# Edit DB_PATH, ADMIN_PASSWORD, and other values
```

3. Run the builtin dev server (works with the included router):

```bash
php -S localhost:8080 router.php
# Visit http://localhost:8080/
```

Routing and clean URLs
- `router.php` maps friendly routes to PHP pages (for example `/about` → `about.php`, `/product/123` → `product.php?id=123`).
- On Apache enable mod_rewrite and ensure `.htaccess` is allowed (AllowOverride All) so requests like `/about` are forwarded to `router.php`.
- On nginx use a `try_files` rule to forward non-file requests to `router.php` (snippet below).

Apache notes
- `.htaccess` is included in the project root and will forward non-file requests to `router.php`.
- Enable rewrite and restart: `sudo a2enmod rewrite && sudo systemctl restart apache2`.
- Make sure your VirtualHost permits overrides (AllowOverride All) or add the rewrite rules into the vhost directly.

Nginx snippet
```nginx
server {
   listen 80;
   server_name yourdomain.com www.yourdomain.com;
   root /var/www/dharaharatraders; # change to your path
   index index.php router.php;

   location / {
      try_files $uri $uri/ /router.php?$query_string;
   }

   location ~ \.php$ {
      include fastcgi_params;
      fastcgi_pass unix:/run/php/php8.1-fpm.sock; # adapt for your PHP-FPM
      fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
   }

   location ~* \.(css|js|jpg|jpeg|png|gif|svg|ico)$ {
      try_files $uri =404;
      access_log off;
      expires 7d;
   }
}
```

Deployment checklist
- Upload project files to the server document root
- Ensure PHP 7.4+ and PHP-FPM (if using nginx) are installed
- Enable rewrite rules (Apache) or add `try_files` (nginx)
- Create a production `.env` (do not commit `.env` to repo)
- Set correct ownership and permissions for `uploads/` and the SQLite DB (webserver user must be able to read/write)

What you need to do now (deploy steps)
1. Upload the project to your server document root (example `/var/www/dharaharatraders` or `~/public_html`).

2. Create a production `.env` from the example and set a strong admin password:

```bash
cd /var/www/dharaharatraders
cp .env.example .env
# edit .env and set ADMIN_PASSWORD and other values
nano .env
```

3. Ensure Apache will allow rewrites (so clean URLs like `/about` work):

If you have SSH and sudo on Debian/Ubuntu:
```bash
sudo a2enmod rewrite headers deflate expires
# ensure vhost has AllowOverride All for the DocumentRoot (see README Apache snippet)
sudo systemctl reload apache2
```

If you are on cPanel/shared hosting: upload the `.htaccess` from the repo into your `public_html` and ask support to enable mod_rewrite if clean URLs still 404.

4. Set file ownership and permissions so the webserver can read files and write uploads/DB:

```bash
# adjust web user if your server uses `apache` instead of `www-data`
sudo chown -R www-data:www-data /var/www/dharaharatraders
sudo find /var/www/dharaharatraders -type d -exec chmod 755 {} \;
sudo find /var/www/dharaharatraders -type f -exec chmod 644 {} \;
sudo chown -R www-data:www-data /var/www/dharaharatraders/uploads
sudo chown www-data:www-data /var/www/dharaharatraders/admin/dharahara_data.db
sudo chmod 660 /var/www/dharaharatraders/admin/dharahara_data.db
```

5. Reload Apache and verify rewrite module is enabled:

```bash
apachectl -M | grep rewrite
sudo systemctl reload apache2
```

6. Quick smoke tests (run locally or on server):

```bash
curl -I -L https://dharaharatraders.com/
curl -I -L https://dharaharatraders.com/about
curl -I -L https://dharaharatraders.com/products
curl -I -L https://dharaharatraders.com/contact
curl -I -L https://dharaharatraders.com/includes/header.css
```

If the clean URLs still return a 404 while `.php` files are reachable, confirm `AllowOverride All` is set or ask your host to add the rewrite rules into the vhost.

Project layout (high level)
```
dharaharatraders/
├─ index.php            # Homepage
├─ about.php            # About page
├─ products.php         # Product listing
├─ product.php          # Product detail (accepts ?id= or /product/123)
├─ contact.php          # Contact form
├─ router.php           # Router used by php -S and rewrite entrypoint
├─ .htaccess            # Apache rewrite rules (production)
├─ includes/            # header.php, footer.php, header.css, footer.css
├─ admin/               # Admin dashboard and endpoints
├─ uploads/             # Uploaded product images (writable)
└─ admin/dharahara_data.db  # SQLite (example path)
```

Troubleshooting
- If clean URLs (e.g. `/about`) return 404 while `/about.php` works, the webserver rewrite is not configured. See Apache/NGINX notes above.
- If uploads or admin actions fail, check filesystem permissions for the webserver user and SQLite write access.

License
- MIT — see `LICENSE` in the repo.

Contact
- For issues or support: info@dharaharatraders.com

Thank you — this project intentionally keeps dependencies minimal so it can be self-hosted and easily maintained.
