# Dharahara Traders

**Author:** Shiva Sharan Shrestha — [https://shivasharanshrestha.com.np](https://shivasharanshrestha.com.np)

A professional, lightweight e-commerce website for Dharahara Traders, built with plain PHP and SQLite. This project includes a responsive public storefront and an admin dashboard for managing products, inquiries, and newsletters.

## Features

- **Responsive Design**: Optimized for mobile, tablet, and desktop devices.
- **Clean URLs**: SEO-friendly URLs without `.php` extensions using `router.php` and server rewrites.
- **Admin Dashboard**: Secure panel for product management, category handling, inquiry tracking, and newsletter subscriptions.
- **Product Catalog**: Dynamic product listings with image uploads and detailed views.
- **Contact & Newsletter Forms**: Integrated forms for customer inquiries and email subscriptions.
- **Security**: Basic input validation, file protection, and environment-based configuration.
- **Lightweight**: No external frameworks; minimal dependencies for easy self-hosting.

## Technologies

- **Backend**: PHP 7.4+
- **Database**: SQLite 3
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Server**: Apache (with mod_rewrite) or Nginx
- **Design**: Google Fonts (Inter, Playfair Display)

## Quick Start (Local Development)

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd dharaharatraders
   ```

2. **Set Up Environment**:
   ```bash
   cp .env.example .env
   # Edit .env to set ADMIN_PASSWORD and other configuration values
   ```

3. **Run the Development Server**:
   ```bash
   php -S localhost:8080 router.php
   ```
   Visit [http://localhost:8080](http://localhost:8080) in your browser.

## Deployment

### Prerequisites
- PHP 7.4+ with SQLite support
- Apache or Nginx web server
- SSH access or cPanel for file management

### Steps

1. **Upload Files**:
   Upload the project files to your server's document root (e.g., `/var/www/dharaharatraders` or `~/public_html`).

2. **Configure Environment**:
   ```bash
   cd /var/www/dharaharatraders
   cp .env.example .env
   # Edit .env with production values (e.g., set a strong ADMIN_PASSWORD)
   ```

3. **Set Permissions**:
   ```bash
   # Adjust 'www-data' if your web server user is different (e.g., 'apache')
   sudo chown -R www-data:www-data /var/www/dharaharatraders
   sudo find /var/www/dharaharatraders -type d -exec chmod 755 {} \;
   sudo find /var/www/dharaharatraders -type f -exec chmod 644 {} \;
   sudo chown -R www-data:www-data /var/www/dharaharatraders/uploads
   sudo chown www-data:www-data /var/www/dharaharatraders/admin/dharahara_data.db
   sudo chmod 660 /var/www/dharaharatraders/admin/dharahara_data.db
   ```

4. **Enable Rewrites**:
   - **Apache**: Ensure `.htaccess` is in the document root and mod_rewrite is enabled:
     ```bash
     sudo a2enmod rewrite
     sudo systemctl reload apache2
     ```
     Confirm your VirtualHost has `AllowOverride All` for the document root.
   - **Nginx**: Add the following to your server block:
     ```nginx
     location / {
         try_files $uri $uri/ /router.php?$query_string;
     }
     ```
   - **cPanel/Shared Hosting**: Upload `.htaccess` to `public_html`. If clean URLs still fail, contact support to enable mod_rewrite.

5. **Test Deployment**:
   ```bash
   curl -I -L https://dharaharatraders.com/
   curl -I -L https://dharaharatraders.com/about
   curl -I -L https://dharaharatraders.com/products
   ```
   Expected: HTTP 200 responses.

## Project Structure

```
dharaharatraders/
├── index.php              # Homepage
├── about.php              # About page
├── products.php           # Product listing
├── product.php            # Product detail page
├── contact.php            # Contact form
├── shop.php               # Alternative shop listing
├── router.php             # URL router for clean URLs
├── .htaccess              # Apache rewrite rules
├── .env.example           # Environment configuration template
├── .gitignore             # Git ignore rules
├── includes/              # Shared includes (header, footer, CSS)
├── admin/                 # Admin dashboard and API
├── uploads/               # Uploaded product images
└── img/                   # Static images
```

## Troubleshooting

- **404 Errors on Clean URLs**: Ensure mod_rewrite is enabled and `.htaccess` is in the document root. For Nginx, add the `try_files` rule.
- **Admin Login Issues**: Verify `ADMIN_PASSWORD` is set in `.env` and the database file is writable.
- **File Upload Failures**: Check permissions on `uploads/` directory.
- **Database Errors**: Ensure SQLite is enabled in PHP and the database file is accessible.
- **Server Logs**: Check Apache/Nginx error logs for detailed error messages.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact

For support or inquiries: info@dharaharatraders.com

---

Built with care by Shiva Sharan Shrestha.
