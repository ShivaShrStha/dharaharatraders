<?php
// Include security check
require_once 'security.php';

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Dharahara Traders</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
        }
        
        .admin-header {
            background: linear-gradient(135deg, #3661b7 0%, #667eea 100%);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .admin-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
        }
        
        .admin-nav {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .nav-tabs {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .nav-tab {
            padding: 0.75rem 1.5rem;
            background: #f8f9fa;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-tab.active {
            background: #3661b7;
            color: white;
        }
        
        .nav-tab:hover {
            background: #2952a3;
            color: white;
        }
        
        .admin-content {
            padding: 0 2rem;
        }
        
        .content-section {
            display: none;
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .content-section.active {
            display: block;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #333;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #3661b7 0%, #667eea 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        .data-table th,
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        
        .data-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #495057;
        }
        
        .data-table tr:hover {
            background: #f8f9fa;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin: 0.25rem;
        }
        
        .btn-primary {
            background: #3661b7;
            color: white;
        }
        
        .btn-success {
            background: #28a745;
            color: white;
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        
        .btn-warning {
            background: #ffc107;
            color: #212529;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3661b7;
            box-shadow: 0 0 0 3px rgba(54, 97, 183, 0.1);
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.6);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        @media (max-width: 768px) {
            .admin-header, .admin-nav, .admin-content {
                padding: 1rem;
            }
            
            .nav-tabs {
                flex-direction: column;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 600px) {
            .admin-header h1 {
                font-size: 1.5rem;
            }
            
            .nav-tab {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
            
            .data-table th,
            .data-table td {
                padding: 8px 4px;
                font-size: 0.85rem;
            }
            
            .btn {
                padding: 0.4rem 0.8rem;
                font-size: 0.85rem;
            }
            
            .form-group input,
            .form-group textarea,
            .form-group select {
                padding: 10px;
                font-size: 14px;
            }
            
            .modal-content {
                width: 95%;
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .admin-header {
                padding: 0.5rem 1rem;
            }
            
            .admin-nav {
                padding: 0.5rem 1rem;
            }
            
            .admin-content {
                padding: 0.5rem 1rem;
            }
            
            .content-section {
                padding: 1rem;
            }
            
            .stats-grid {
                gap: 1rem;
            }
            
            .stat-card {
                padding: 1rem;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
            
            .stat-label {
                font-size: 0.8rem;
            }
        }
        
        .status-pending {
            background: #ffc107;
            color: #212529;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.85rem;
        }
        
        .status-processed {
            background: #28a745;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.85rem;
        }
        
        .status-unread {
            background: #dc3545;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.85rem;
        }
        
        .status-read {
            background: #6c757d;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.85rem;
        }
    </style>
    <link rel="icon" type="image/png" href="../img/Dharaharalogo.png">
</head>
<body>
    <div class="admin-header">
        <h1>🏢 Dharahara Traders Admin Dashboard</h1>
        <div style="float: right;">
            <a href="?logout=1" style="color: white; text-decoration: none; background: rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 5px; font-size: 14px;">🚪 Logout</a>
        </div>
        <div style="clear: both;"></div>
    </div>
    
    <div class="admin-nav">
        <div class="nav-tabs">
            <button class="nav-tab active" onclick="showSection('dashboard')">Dashboard</button>
            <button class="nav-tab" onclick="showSection('products')">Products</button>
            <button class="nav-tab" onclick="showSection('add-product')">Add Product</button>
            <button class="nav-tab" onclick="showSection('inquiries')">Inquiries</button>
            <button class="nav-tab" onclick="showSection('newsletter')">Newsletter</button>
            <button class="nav-tab" onclick="showSection('contact-messages')">Contact Messages</button>
            <button class="nav-tab" onclick="showSection('categories')">Categories</button>
        </div>
    </div>
    
    <div class="admin-content">
        <!-- Dashboard Section -->
        <div id="dashboard" class="content-section active">
            <h2 class="section-title">📈 Dashboard Overview</h2>
            <div class="stats-grid" id="statsGrid">
                <!-- Stats will be loaded here -->
            </div>
        </div>
        
        <!-- Products Section -->
        <div id="products" class="content-section">
            <h2 class="section-title">📦 Products Management</h2>
            <div style="margin-bottom: 1rem;">
                <button class="btn btn-success" onclick="loadProducts()">🔄 Refresh</button>
                <button class="btn btn-success" onclick="exportData('products')" style="margin-left: 0.5rem;">📥 Export Excel</button>
            </div>
            <div id="productsTable">
                <!-- Table will be loaded here -->
            </div>
        </div>
        
        <!-- Add Product Section -->
        <div id="add-product" class="content-section">
            <h2 class="section-title">➕ Add New Product</h2>
            <form id="productForm" class="product-form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="productName">Product Name *</label>
                    <input type="text" id="productName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="productCategory">Category *</label>
                    <select id="productCategory" name="category" required>
                        <option value="">Select Category</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="productDescription">Description</label>
                    <textarea id="productDescription" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Price (Optional)</label>
                    <input type="text" id="productPrice" name="price" placeholder="Contact for price">
                </div>
                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="file" id="productImage" name="image" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="productStatus">Status</label>
                    <select id="productStatus" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
        
        <!-- Inquiries Section -->
        <div id="inquiries" class="content-section">
            <h2 class="section-title">💬 Product Inquiries</h2>
            <div style="margin-bottom: 1rem;">
                <button class="btn btn-success" onclick="loadInquiries()">🔄 Refresh</button>
                <button class="btn btn-success" onclick="exportData('inquiries')" style="margin-left: 0.5rem;">📥 Export Excel</button>
            </div>
            <div id="inquiriesTable">
                <!-- Table will be loaded here -->
            </div>
        </div>
        
        <!-- Newsletter Section -->
        <div id="newsletter" class="content-section">
            <h2 class="section-title">📧 Newsletter Subscribers</h2>
            <div style="margin-bottom: 1rem;">
                <button class="btn btn-success" onclick="loadNewsletter()">🔄 Refresh</button>
                <button class="btn btn-success" onclick="exportData('newsletter')" style="margin-left: 0.5rem;">📥 Export Excel</button>
            </div>
            <div id="newsletterTable">
                <!-- Table will be loaded here -->
            </div>
        </div>
        
        <!-- Contact Messages Section -->
        <div id="contact-messages" class="content-section">
            <h2 class="section-title">💬 Contact Messages</h2>
            <div style="margin-bottom: 1rem;">
                <button class="btn btn-success" onclick="loadContactMessages()">🔄 Refresh</button>
                <button class="btn btn-success" onclick="exportData('contacts')" style="margin-left: 0.5rem;">📥 Export Excel</button>
            </div>
            <div id="contactMessagesTable">
                <!-- Table will be loaded here -->
            </div>
        </div>

        <!-- Categories Section -->
        <div id="categories" class="content-section">
            <h2 class="section-title">🗂️ Category Management</h2>
            <div style="margin-bottom: 1rem;">
                <button class="btn btn-success" onclick="loadCategories()">🔄 Refresh</button>
            </div>
            <form id="addCategoryForm" style="margin-bottom:2rem;max-width:400px;">
                <div class="form-group">
                    <label for="categoryName">Category Name *</label>
                    <input type="text" id="categoryName" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
            <div id="categoriesTable"></div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="modal">
        <div class="modal-content">
            <h3>Edit Product</h3>
            <form id="editProductForm" enctype="multipart/form-data">
                <input type="hidden" id="editProductId" name="id">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" id="editProductName" name="name" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select id="editProductCategory" name="category" required>
                        <option value="">Select Category</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="editProductDescription" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" id="editProductPrice" name="price">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select id="editProductStatus" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Current Image</label>
                    <div id="editProductImagePreview" style="margin-bottom:10px;"></div>
                    <input type="file" id="editProductImage" name="image" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-danger" onclick="closeEditProductModal()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        // Navigation functionality
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.nav-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Add active class to clicked tab
            event.target.classList.add('active');
            
            // Load data for the section
            switch(sectionId) {
                case 'dashboard':
                    loadStats();
                    break;
                case 'products':
                    loadProducts();
                    break;
                case 'add-product':
                    populateProductCategories();
                    break;
                case 'inquiries':
                    loadInquiries();
                    break;
                case 'newsletter':
                    loadNewsletter();
                    break;
                case 'contact-messages':
                    loadContactMessages();
                    break;
                case 'categories':
                    loadCategories();
                    break;
            }
        }

        // Load dashboard stats
        function loadStats() {
            fetch('get_stats.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('statsGrid').innerHTML = `
                        <div class="stat-card">
                            <div class="stat-number">${data.products || 0}</div>
                            <div class="stat-label">Total Products</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">${data.inquiries || 0}</div>
                            <div class="stat-label">Product Inquiries</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">${data.newsletter || 0}</div>
                            <div class="stat-label">Newsletter Subscribers</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">${data.contacts || 0}</div>
                            <div class="stat-label">Contact Messages</div>
                        </div>
                    `;
                })
                .catch(error => console.error('Error loading stats:', error));
        }

        // Load products
        function loadProducts() {
            fetch('get_products.php')
                .then(response => response.json())
                .then(data => {
                    let html = '<table class="data-table"><thead><tr><th>ID</th><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th>Status</th><th>Actions</th></tr></thead><tbody>';
                    data.forEach(product => {
                        // Handle image path properly 
                        let img = product.image || product.image_url || '/img/placeholder.svg';
                        
                        // Ensure uploaded images have root-absolute paths
                        if (img && img !== '/img/placeholder.svg' && !img.startsWith('http')) {
                            if (!img.startsWith('/')) {
                                img = '/' + img;
                            }
                            // Properly encode URL for images with spaces
                            img = encodeURI(img);
                        }
                        
                        html += `<tr>
                            <td>${product.id}</td>
                            <td><img src="${img}" alt="${product.name}" style="width:60px;height:60px;object-fit:cover;border-radius:8px;max-width:100%;height:auto;" onerror="this.src='/img/placeholder.svg'"></td>
                            <td>${product.name}</td>
                            <td>${product.category}</td>
                            <td>${product.price || 'Contact for price'}</td>
                            <td><span style="color: ${product.status === 'active' ? 'green' : 'red'}">${product.status}</span></td>
                            <td>
                                <button class="btn btn-warning" onclick="editProduct(${product.id})">Edit</button>
                                <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Delete</button>
                            </td>
                        </tr>`;
                    });
                    html += '</tbody></table>';
                    document.getElementById('productsTable').innerHTML = html;
                });
        }

        // Product form submission
        document.getElementById('productForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('process_product.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product added successfully!');
                    this.reset();
                    loadProducts();
                } else {
                    alert('Error: ' + data.message);
                }
            });
        });

        // Export data to Excel
        function exportData(type) {
            window.open(`export_data.php?type=${type}`, '_blank');
        }

        // Populate categories in Edit Product modal
        function populateEditProductCategories(selected) {
            fetch('process_category.php?action=list')
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('editProductCategory');
                    select.innerHTML = '<option value="">Select Category</option>';
                    data.forEach(cat => {
                        select.innerHTML += `<option value="${cat.name}"${cat.name === selected ? ' selected' : ''}>${cat.name}</option>`;
                    });
                });
        }

        // Update editProduct to call this
        function editProduct(id) {
            fetch(`get_product.php?id=${id}`)
                .then(response => response.json())
                .then(product => {
                    document.getElementById('editProductId').value = product.id;
                    document.getElementById('editProductName').value = product.name;
                    populateEditProductCategories(product.category);
                    document.getElementById('editProductDescription').value = product.description;
                    document.getElementById('editProductPrice').value = product.price;
                    document.getElementById('editProductStatus').value = product.status;
                    
                    // Handle image preview
                    let img = product.image || product.image_url || '/img/placeholder.svg';
                    if (img && img !== '/img/placeholder.svg' && !img.startsWith('http')) {
                        if (!img.startsWith('/')) {
                            img = '/' + img;
                        }
                        // Properly encode URL for images with spaces
                        img = encodeURI(img);
                    }
                    
                    document.getElementById('editProductImagePreview').innerHTML = `<img src='${img}' alt='${product.name}' style='width:100px;height:100px;object-fit:cover;border-radius:8px;' onerror="this.src='/img/placeholder.svg'">`;
                    document.getElementById('editProductModal').style.display = 'flex';
                });
        }

        function closeEditProductModal() {
            document.getElementById('editProductModal').style.display = 'none';
        }

        // Delete product
        function deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                fetch('delete_product.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Product deleted successfully!');
                        loadProducts();
                    } else {
                        alert('Error deleting product');
                    }
                });
            }
        }

        // Edit product form submission
        document.getElementById('editProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('edit_product.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product updated successfully!');
                    closeEditProductModal();
                    loadProducts();
                } else {
                    alert('Error: ' + (data.message || data.error));
                }
            });
        });

        // Load inquiries
        function loadInquiries() {
            fetch('get_inquiries.php')
                .then(response => response.json())
                .then(data => {
                    let html = '<table class="data-table"><thead><tr>';
                    html += '<th>ID</th><th>Product</th><th>Customer</th><th>Email</th><th>Phone</th><th>Message</th><th>Status</th><th>Date</th><th>Actions</th>';
                    html += '</tr></thead><tbody>';
                    
                    data.forEach(inquiry => {
                        html += `<tr>
                            <td>${inquiry.id}</td>
                            <td>${inquiry.product_name || 'N/A'}</td>
                            <td>${inquiry.customer_name}</td>
                            <td>${inquiry.customer_email}</td>
                            <td>${inquiry.customer_phone}</td>
                            <td>${inquiry.message ? inquiry.message.substring(0, 50) + '...' : 'N/A'}</td>
                            <td><span class="status-${inquiry.status}">${inquiry.status}</span></td>
                            <td>${new Date(inquiry.created_at).toLocaleDateString()}</td>
                            <td>
                                <button class="btn btn-warning" onclick="updateInquiryStatus(${inquiry.id}, 'processed')">Mark Processed</button>
                            </td>
                        </tr>`;
                    });
                    
                    html += '</tbody></table>';
                    document.getElementById('inquiriesTable').innerHTML = html;
                });
        }

        // Update inquiry status
        function updateInquiryStatus(id, status) {
            fetch('update_inquiry.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${id}&status=${status}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Inquiry status updated!');
                    loadInquiries();
                } else {
                    alert('Error updating status');
                }
            });
        }

        // Load newsletter subscribers
        function loadNewsletter() {
            fetch('get_newsletter.php')
                .then(response => response.json())
                .then(data => {
                    let html = '<table class="data-table"><thead><tr>';
                    html += '<th>ID</th><th>Email</th><th>Subscribed Date</th>';
                    html += '</tr></thead><tbody>';
                    
                    data.forEach(subscriber => {
                        html += `<tr>
                            <td>${subscriber.id}</td>
                            <td>${subscriber.email}</td>
                            <td>${new Date(subscriber.created_at).toLocaleDateString()}</td>
                        </tr>`;
                    });
                    
                    html += '</tbody></table>';
                    document.getElementById('newsletterTable').innerHTML = html;
                });
        }

        // Load contact messages
        function loadContactMessages() {
            fetch('get_contact_messages.php')
                .then(response => response.json())
                .then(data => {
                    let html = '<table class="data-table"><thead><tr>';
                    html += '<th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Status</th><th>Date</th>';
                    html += '</tr></thead><tbody>';
                    
                    data.forEach(message => {
                        html += `<tr>
                            <td>${message.id}</td>
                            <td>${message.name}</td>
                            <td>${message.email}</td>
                            <td>${message.subject}</td>
                            <td>${message.message.substring(0, 50)}...</td>
                            <td><span class="status-${message.status}">${message.status}</span></td>
                            <td>${new Date(message.created_at).toLocaleDateString()}</td>
                        </tr>`;
                    });
                    
                    html += '</tbody></table>';
                    document.getElementById('contactMessagesTable').innerHTML = html;
                });
        }

        // Load categories
        function loadCategories() {
            fetch('process_category.php?action=list')
                .then(response => response.json())
                .then(data => {
                    let html = '<table class="data-table"><thead><tr><th>ID</th><th>Name</th><th>Actions</th></tr></thead><tbody>';
                    data.forEach(cat => {
                        html += `<tr>
                            <td>${cat.id}</td>
                            <td><input type="text" value="${cat.name}" data-id="${cat.id}" class="edit-cat-name" style="width:120px;" /></td>
                            <td>
                                <button class="btn btn-warning" onclick="editCategory(${cat.id})">Edit</button>
                                <button class="btn btn-danger" onclick="deleteCategory(${cat.id})">Delete</button>
                            </td>
                        </tr>`;
                    });
                    html += '</tbody></table>';
                    document.getElementById('categoriesTable').innerHTML = html;
                });
        }

        // Add category
        document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('process_category.php?action=add', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Category added!');
                    this.reset();
                    loadCategories();
                } else {
                    alert('Error: ' + (data.error || 'Unknown error'));
                }
            });
        });

        // Edit category
        function editCategory(id) {
            const name = document.querySelector(`.edit-cat-name[data-id='${id}']`).value;
            const formData = new FormData();
            formData.append('id', id);
            formData.append('name', name);
            fetch('process_category.php?action=edit', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Category updated!');
                    loadCategories();
                } else {
                    alert('Error: ' + (data.error || 'Unknown error'));
                }
            });
        }

        // Delete category
        function deleteCategory(id) {
            if (!confirm('Delete this category?')) return;
            const formData = new FormData();
            formData.append('id', id);
            fetch('process_category.php?action=delete', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Category deleted!');
                    loadCategories();
                } else {
                    alert('Error: ' + (data.error || 'Unknown error'));
                }
            });
        }

        // Populate categories in Add Product form
        function populateProductCategories() {
            fetch('process_category.php?action=list')
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('productCategory');
                    select.innerHTML = '<option value="">Select Category</option>';
                    data.forEach(cat => {
                        select.innerHTML += `<option value="${cat.name}">${cat.name}</option>`;
                    });
                });
        }

        // Initialize dashboard
        loadStats();
    </script>
</body>
</html>
