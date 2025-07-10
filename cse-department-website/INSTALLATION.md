Installation Guide
Prerequisites

PHP 8.0+
MySQL 8.0+
Apache/Nginx server
Composer (optional for dependencies)

Steps

Clone Repository
git clone <repository_url>
cd cse-department-website


Set Up Database

Create a MySQL database named cse_department.
Import database.sql:mysql -u root -p cse_department < database.sql




Configure Database

Edit includes/config.php with your database credentials:define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'cse_department');




Set Up File Permissions

Ensure assets/uploads/ is writable:chmod -R 775 assets/uploads




Configure Web Server

Point document root to the project directory.
For Apache, ensure .htaccess is enabled and mod_rewrite is active.


Install Dependencies

Bootstrap and jQuery are included via CDN.
Optionally, install additional PHP dependencies using Composer:composer install




Access Website

Open http://your-domain.com in a browser.
Admin panel: http://your-domain.com/admin/login.php
Default admin credentials: username admin, password (set in database.sql).


Verify Setup

Ensure all pages load correctly.
Test admin panel CRUD operations.
Check contact form submission.


 
