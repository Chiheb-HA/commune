# Municipality Portal - Installation Guide

This guide will walk you through setting up the Municipality Portal on your server.

## Table of Contents
1. [Server Requirements](#requirements)
2. [Local Development](#local)
3. [Production Deployment](#production)
4. [Troubleshooting](#troubleshooting)

---

## Server Requirements {#requirements}

### Minimum Requirements
- **PHP**: 8.2 or higher
- **MySQL**: 5.7+ or MariaDB 10.3+
- **Composer**: Latest version
- **Node.js**: 16+ (for asset compilation)
- **RAM**: 2GB minimum
- **Disk Space**: 500MB minimum

### Required PHP Extensions
- php-mysql
- php-mbstring
- php-xml
- php-curl
- php-json
- php-tokenizer
- php-ctype
- php-zip

Check with:
```bash
php -m | grep -E 'mysql|mbstring|xml|curl|json|tokenizer|ctype|zip'
```

### Recommended for Production
- **SSL Certificate** (HTTPS)
- **Email Service** (for notifications)
- **CDN** (for static assets)
- **Backup Solution**

---

## Local Development {#local}

### Step 1: Download Project

Download the municipality-portal project files to your computer.

### Step 2: Install PHP Dependencies

```bash
cd municipality-portal
composer install
```

If you haven't installed Composer, download it from https://getcomposer.org

### Step 3: Install Node Dependencies

```bash
npm install
```

If you haven't installed Node.js, download it from https://nodejs.org

### Step 4: Configure Environment

```bash
# Copy example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

Open `.env` file and configure:

```env
APP_NAME="Municipality Portal"
APP_URL=http://localhost:8000
APP_ENV=local
APP_DEBUG=true

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=commune_db
DB_USERNAME=root
DB_PASSWORD=

# Default Language
DEFAULT_LANGUAGE=fr
SUPPORTED_LANGUAGES=fr,en,ar
```

### Step 5: Create Database

Using **MySQL Command Line**:
```bash
mysql -u root -p
CREATE DATABASE commune_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

Or using **PhpMyAdmin**:
1. Open PhpMyAdmin (`http://localhost/phpmyadmin`)
2. Click "New"
3. Database name: `commune_db`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"

### Step 6: Run Migrations

```bash
php artisan migrate
```

This creates all necessary database tables.

### Step 7: Seed Initial Data

```bash
php artisan db:seed --class=RolePermissionSeeder
```

This creates roles and permissions.

### Step 8: Create Admin User

```bash
php artisan tinker
```

In the tinker shell, run:
```php
$user = User::create([
    'name' => 'Admin User',
    'first_name' => 'Admin',
    'last_name' => 'User',
    'email' => 'admin@commune.local',
    'password' => Hash::make('password123'),
    'user_type' => 'admin',
    'status' => 'active',
]);

$user->assignRole('admin');

exit
```

### Step 9: Link Storage

```bash
php artisan storage:link
```

### Step 10: Compile Assets

```bash
npm run dev
```

### Step 11: Start Development Server

**Terminal 1** - PHP Server:
```bash
php artisan serve
```

**Terminal 2** - Asset Watcher (optional):
```bash
npm run dev
```

### Step 12: Access Application

Open your browser and go to: `http://localhost:8000`

**Login with:**
- Email: `admin@commune.local`
- Password: `password123`

---

## Production Deployment {#production}

### Step 1: Upload Files to Server

Use FTP, SFTP, or Git to upload project files to your server.

```bash
# Via Git
git clone https://github.com/yourrepo/municipality-portal.git
cd municipality-portal
```

### Step 2: Install Dependencies

```bash
# SSH into server
ssh user@your-server.com

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node dependencies
npm install

# Build production assets
npm run build

# Remove Node dependencies (optional, saves space)
rm -rf node_modules
```

### Step 3: Configure Environment

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Edit .env with production settings
nano .env
```

Update `.env` for production:

```env
APP_ENV=production
APP_DEBUG=false

# Database (use environment-specific credentials)
DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_DATABASE=commune_db
DB_USERNAME=db_user
DB_PASSWORD=secure_password_here

# Email Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com

# Application URL
APP_URL=https://yourdomain.com
```

### Step 4: Create Production Database

On your database server:

```bash
mysql -u root -p
CREATE DATABASE commune_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'db_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON commune_db.* TO 'db_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### Step 5: Run Migrations

```bash
php artisan migrate --force
php artisan db:seed --class=RolePermissionSeeder --force
```

### Step 6: Cache Configuration

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 7: Set Permissions

```bash
# Set web server user
chown -R www-data:www-data /path/to/municipality-portal
chmod -R 755 /path/to/municipality-portal

# Set writable directories
chmod -R 775 storage/ bootstrap/cache/ public/storage

# Create storage link
php artisan storage:link
```

### Step 8: Configure Web Server

#### Apache Configuration

Create `.htaccess` in `/public` directory (usually already there):

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

Create/update Virtual Host:

```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    ServerAlias www.yourdomain.com
    DocumentRoot /path/to/municipality-portal/public

    <Directory /path/to/municipality-portal/public>
        AllowOverride All
        Require all granted
    </Directory>

    # Redirect to HTTPS
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</VirtualHost>

<VirtualHost *:443>
    ServerName yourdomain.com
    ServerAlias www.yourdomain.com
    DocumentRoot /path/to/municipality-portal/public
    
    SSLEngine on
    SSLCertificateFile /etc/letsencrypt/live/yourdomain.com/fullchain.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/yourdomain.com/privkey.pem

    <Directory /path/to/municipality-portal/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Enable rewrite module:
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

#### Nginx Configuration

Create server block in `/etc/nginx/sites-available/`:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com www.yourdomain.com;
    
    # Redirect HTTP to HTTPS
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name yourdomain.com www.yourdomain.com;

    root /path/to/municipality-portal/public;
    index index.php index.html;

    # SSL Configuration
    ssl_certificate /etc/letsencrypt/live/yourdomain.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/yourdomain.com/privkey.pem;

    # Laravel Routing
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Deny access to .env
    location ~ /\.env {
        deny all;
    }
}
```

Enable and test:
```bash
sudo ln -s /etc/nginx/sites-available/municipality-portal /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

### Step 9: Install SSL Certificate

Using Let's Encrypt (free):

```bash
sudo apt-get install certbot python3-certbot-apache

# For Apache
sudo certbot --apache -d yourdomain.com -d www.yourdomain.com

# For Nginx
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```

### Step 10: Setup Cron Job

For scheduled tasks, add to crontab:

```bash
crontab -e

# Add this line:
* * * * * php /path/to/municipality-portal/artisan schedule:run >> /dev/null 2>&1
```

### Step 11: Setup Log Rotation

Create `/etc/logrotate.d/municipality-portal`:

```
/path/to/municipality-portal/storage/logs/*.log {
    daily
    missingok
    rotate 30
    compress
    delaycompress
    notifempty
    create 0640 www-data www-data
    sharedscripts
}
```

### Step 12: Monitor and Test

```bash
# Check application logs
tail -f storage/logs/laravel.log

# Check web server logs
tail -f /var/log/apache2/error.log
# or
tail -f /var/log/nginx/error.log

# Test application
curl https://yourdomain.com
```

---

## Troubleshooting {#troubleshooting}

### Database Errors

**Error**: "SQLSTATE[HY000]: General error"

**Solution**:
```bash
# Verify database connection
php artisan tinker
DB::connection()->getPdo();

# Re-run migrations
php artisan migrate:reset
php artisan migrate --seed
```

### File Permissions

**Error**: "The stream or file "storage/logs/laravel.log" could not be opened"

**Solution**:
```bash
chmod -R 775 storage/ bootstrap/cache/
chown -R www-data:www-data storage/
```

### Composer Memory

**Error**: "Fatal error: Allowed memory size exhausted"

**Solution**:
```bash
php -d memory_limit=-1 composer install
# or
export COMPOSER_MEMORY_LIMIT=-1
composer install
```

### Assets Not Loading

**Error**: CSS/JS files return 404

**Solution**:
```bash
php artisan storage:link
npm run build
php artisan view:clear
```

### White Page / 500 Error

**Solution**:
```bash
# Check logs
tail -f storage/logs/laravel.log

# Enable debug temporarily
APP_DEBUG=true php artisan serve

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Email Not Sending

**Check configuration**:
```bash
php artisan tinker
Mail::raw('Test', function ($mail) {
    $mail->to('test@example.com');
})->send();
```

---

## Maintenance

### Regular Tasks

```bash
# Clear application cache
php artisan cache:clear

# Clear compiled files
php artisan clear-compiled

# Refresh configuration
php artisan config:cache

# Run backups (scheduled)
php artisan backup:run
```

### Updating

```bash
# Pull latest code
git pull origin main

# Update dependencies
composer install --no-dev
npm install && npm run build

# Run migrations
php artisan migrate --force

# Cache configuration
php artisan config:cache
```

---

**For more help, see PROJECT_DOCUMENTATION.md**
