# Dharahara Traders

**Author:** Shiva Sharan Shrestha — [https://shivasharanshrestha.com.np](https://shivasharanshrestha.com.np)

**Live Demo:** The site is live at [https://dharaharatraders.com/](https://dharaharatraders.com/)

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

2. **Run the Development Server**:
   ```bash
   php -S localhost:8080 router.php
   ```
   Visit [http://localhost:8080](http://localhost:8080) in your browser.

## Deployment

### Prerequisites
- PHP 7.4+ with SQLite support
- Apache or Nginx web server
- SSH access or cPanel for file management

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact

For support or inquiries: info@dharaharatraders.com

---

Built with care by Shiva Sharan Shrestha.
