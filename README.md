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

```
dharaharatraders/
├── index.php              # Homepage
├── about.php              # About page
├── shop.php               # Products catalog
├── contact.php            # Contact page
├── product.php            # Product details
├── process_*.php          # Form processors
├── .htaccess              # URL rewriting & security
├── .env                   # Environment configuration
├── admin/                 # Admin dashboard
│   ├── dashboard.php      # Admin interface
│   ├── database.php       # Database connection
│   ├── config.php         # Configuration
│   └── *.php             # Admin functions
├── includes/              # Shared components
│   └── footer.php        # Unified footer
├── img/                   # Static images
└── uploads/               # User uploads
    └── products/          # Product images
```

## 🔧 Installation

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd dharaharatraders
   ```

2. **Configure environment**
   ```bash
   cp .env.example .env
   # Edit .env with your settings
   ```

3. **Set up web server**
   - Ensure Apache/Nginx is configured with PHP
   - Enable mod_rewrite for clean URLs
   - Set document root to project directory

4. **Initialize database**
   - Database will be created automatically on first admin access
   - Default admin credentials will be generated

5. **Set permissions**
   ```bash
   chmod 755 uploads/
   chmod 755 uploads/products/
   chmod 644 admin/nexa_data.db
   ```

## 🔐 Security Features

- Input validation and sanitization
- SQL injection prevention
- XSS protection
- CSRF protection
- File upload restrictions
- Environment variable protection
- HTTP security headers

## 📱 Responsive Design

- Mobile-first approach
- Tablet optimization
- Desktop enhancement
- Touch-friendly interface
- Fast loading times

## 🎨 Design System

### Color Palette
- **Cream Light**: #fefcf7
- **Cream Medium**: #faf7f0
- **Cream Dark**: #f5f1e8
- **Gold Light**: #d4af37
- **Gold Medium**: #b8860b
- **Brown Dark**: #4a3728

### Typography
- **Headings**: Playfair Display (Serif)
- **Body**: Inter (Sans-serif)
- **Clean, modern hierarchy**

## 🚀 Deployment

### Production Setup
1. Upload files to web server
2. Configure domain DNS
3. Set up SSL certificate
4. Update .env for production
5. Test all functionality

### Performance Optimization
- Image compression
- CSS/JS minification
- Gzip compression
- Browser caching
- CDN integration (optional)

## 🔄 Clean URLs

The website uses clean URLs without .php extensions:
- `/` → `index.php`
- `/about` → `about.php`
- `/shop` → `shop.php`
- `/contact` → `contact.php`
- `/product?id=1` → `product.php?id=1`

## 📊 Admin Features

- **Dashboard**: Overview of site statistics
- **Products**: Add, edit, delete products
- **Categories**: Manage product categories
- **Inquiries**: Handle customer inquiries
- **Newsletter**: Manage subscriptions
- **Settings**: Site configuration

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is proprietary software owned by Dharahara Traders Pvt. Ltd.

## 👨‍💻 Development

**Developed by**: [Shiva Sharan Shrestha](https://shivasharanshrestha.com.np)  
**Company**: Dharahara Traders Pvt. Ltd.  
**Version**: 1.0.0  
**Last Updated**: August 2025

## 📞 Support

For support and inquiries:
- **Email**: info@dharaharatraders.com
- **Phone**: +977-9818852676
- **Website**: http://dharaharatraders.com

---

**© 2024 Dharahara Traders Pvt. Ltd. All rights reserved.**
