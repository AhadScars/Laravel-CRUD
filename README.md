# Laravel Product CRUD Application

## Overview
This is a comprehensive Laravel CRUD (Create, Read, Update, Delete) application for managing products. It demonstrates a complete product management system with full functionality for adding, editing, viewing, and deleting products.

## Features
- ✅ **Create Products** - Add new products with name, description, price, and image upload
- ✅ **Read Products** - Display all products in a table view
- ✅ **Update Products** - Edit existing product details and images
- ✅ **Delete Products** - Remove products from the database with confirmation
- ✅ **Image Management** - Upload and store product images
- ✅ **Input Validation** - Server-side validation for all inputs
- ✅ **Success Messages** - User feedback for all operations
- ✅ **Responsive Design** - Bootstrap UI for clean and responsive interface

## Technology Stack
- **Framework**: Laravel
- **Database**: MySQL
- **Frontend**: Bootstrap 4.6.2
- **Backend**: PHP
- **Task Runner**: Vite

## Installation

### Prerequisites
- PHP 8.0+
- Composer
- MySQL

### Setup Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/AhadScars/Laravel-CRUD.git
   cd Laravel-CRUD
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy environment file:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Configure database in `.env`:
   ```
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. Run migrations:
   ```bash
   php artisan migrate
   ```

7. Seed the database with sample data:
   ```bash
   php artisan db:seed
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

9. Visit `http://localhost:8000` in your browser

## Project Structure
```
product/
├── app/
│   ├── Http/Controllers/ProductController.php
│   └── Models/product.php
├── database/
│   ├── migrations/create_products_table.php
│   └── seeders/ProductSeeder.php
├── resources/views/product/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── routes/web.php
└── public/productimg/
```

## Routes
| Method | Route | Action |
|--------|-------|--------|
| GET | `/` | Display all products |
| GET | `/product/create` | Show create form |
| POST | `/product/store` | Store new product |
| GET | `/product/{id}/edit` | Show edit form |
| PUT | `/product/{id}` | Update product |
| DELETE | `/product/{id}` | Delete product |

## Database Schema

### Products Table
- `id` - Primary key
- `name` - Product name
- `description` - Product description
- `price` - Product price (decimal)
- `image` - Product image filename
- `created_at` - Timestamp
- `updated_at` - Timestamp

## Usage

### Adding a Product
1. Click "Add New Product" button
2. Fill in product details (name, description, price)
3. Upload product image
4. Click "Submit"

### Editing a Product
1. Click "Edit" button on the product row
2. Modify product details
3. Optionally upload a new image
4. Click "Submit"

### Deleting a Product
1. Click "Delete" button on the product row
2. Confirm deletion
3. Product is removed from database

## Sample Data
The application comes with 20 sample products pre-loaded through the ProductSeeder for testing purposes.

## Validation Rules
- **Name**: Required, string
- **Description**: Required, string
- **Price**: Required, numeric
- **Image**: Accepted formats: JPG, PNG, JPEG | Max size: 5MB

## Future Features
The following features are planned for future releases:

### 🎯 Upcoming Features
- 📁 **Product Categories** - Organize products by categories
- 👤 **User Authentication** - User login, registration, and profile management
- 🔐 **Security Features** - Two-factor authentication, role-based access control
- 📦 **Inventory Management** - Stock tracking and notifications
- 🚀 **Performance Optimization** - Caching, pagination, and lazy loading
- 🎨 **UI/UX Improvements** - Modern design, dark mode, accessibility features

## Author
Abdul Ahad


## Repository
[GitHub Repository](https://github.com/AhadScars/Laravel-CRUD.git)
