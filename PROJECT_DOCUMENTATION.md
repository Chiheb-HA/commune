# Municipality Portal - Project Documentation

## Table of Contents
1. [Project Overview](#overview)
2. [Installation & Setup](#installation)
3. [Database Configuration](#database)
4. [Project Structure](#structure)
5. [Key Features](#features)
6. [API Documentation](#api)
7. [Authentication & Authorization](#auth)
8. [Deployment Guide](#deployment)
9. [Development Guide](#development)

---

## Project Overview {#overview}

The Municipality Portal is a comprehensive Laravel application designed to manage municipal content, citizen services, and administrative workflows. It supports multi-language interfaces (French, English, Arabic) and implements role-based access control for different user types.

### Key Components:
- **Content Management**: Articles, News, Events, Galleries
- **Citizen Services**: Service requests, Complaint management
- **Directory**: Officials, Departments, Contact information
- **Financial Management**: Budgets, Expenses, Revenues
- **Audit & Logging**: Activity tracking and audit logs

### Supported User Roles:
- **Admin**: Full system access
- **Editor**: Content creation and management
- **Official**: Request/Complaint handling, citizen responses
- **Citizen**: Submit requests, view content, register for events

---

## Installation & Setup {#installation}

### Requirements
- PHP 8.2 or higher
- Composer
- MySQL 5.7+ or MariaDB
- Node.js 16+ (for asset compilation)

### Step 1: Clone and Install Dependencies

```bash
# Navigate to project directory
cd municipality-portal

# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### Step 2: Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Generate security key for authentication
php artisan:tinker
# Run: Str::random(32)
# Copy the output and set it as BETTER_AUTH_SECRET in .env
```

### Step 3: Database Setup

```bash
# Edit .env file with your database credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=commune_db
DB_USERNAME=root
DB_PASSWORD=your_password

# Run migrations
php artisan migrate

# Seed roles and permissions
php artisan db:seed --class=RolePermissionSeeder

# Create admin user (optional)
php artisan tinker
# Run the following commands:
$user = User::create([
    'name' => 'Admin User',
    'email' => 'admin@commune.local',
    'password' => Hash::make('password'),
    'user_type' => 'admin',
    'status' => 'active'
]);
$user->assignRole('admin');
```

### Step 4: File Storage Setup

```bash
# Create storage symlink
php artisan storage:link

# Set proper permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### Step 5: Asset Compilation

```bash
# Development
npm run dev

# Production
npm run build
```

### Step 6: Start Development Server

```bash
# Terminal 1: PHP Server
php artisan serve

# Terminal 2: Node development server (if using hot module replacement)
npm run dev
```

Access the application at `http://localhost:8000`

---

## Database Configuration {#database}

### Database Schema Overview

#### Core Tables

**users**
- Stores user information and authentication
- Fields: name, email, password, profile_picture, user_type, status, etc.
- Relations: Has many requests, complaints, created content

**roles & permissions** (Spatie)
- Implements role-based access control
- Supports: admin, editor, official, citizen

#### Content Tables

**articles**
- Multi-language articles with categories
- Fields: title_fr/en/ar, content_fr/en/ar, featured_image, status, published_at
- Supports: draft, published, archived states

**news**
- Latest news for municipal communications
- Similar structure to articles with direct publication

**events**
- Event management with registration
- Fields: title, description, start_date, end_date, capacity
- Tracks: registrations, status

**galleries**
- Image galleries with multi-language captions
- Relations: gallery_images (one-to-many)

**categories**
- Organize articles by category
- Multi-language support

#### Citizen Services Tables

**municipal_services**
- Define available services citizens can request
- Fields: name, description, requirements, processing_time, cost

**citizen_requests**
- Track citizen service requests
- Fields: status (pending→in_progress→completed), priority, assigned_to
- Supports: documents, messages

**complaints**
- Citizen complaint management
- Fields: category, status, priority, response, resolved_at

**messages**
- Communication between citizens and officials
- Fields: from_user_id, to_user_id, content, status

#### Directory Tables

**departments**
- Municipal departments
- Fields: name, description, contact info, head_id

**officials**
- Directory of municipal officials
- Relations: users, departments

**telephone_directory**
- Quick reference phone numbers and extensions
- Fields: name, phone, extension, type (office, emergency, etc.)

#### Financial Tables

**budgets**
- Annual budget allocations
- Fields: fiscal_year, allocated_amount, spent_amount

**expenses**
- Track departmental spending
- Fields: amount, expense_date, status, reference_number, receipt_file

**revenues**
- Track municipal income
- Fields: amount, revenue_date, source (taxes, permits, fees, etc.)

**budget_allocations**
- Department-level budget tracking
- Relations: budgets

#### Audit Tables

**audit_logs**
- Track all administrative changes
- Fields: user_id, action, model_type, model_id, changes (JSON)

**activity_logs**
- User activity tracking
- Fields: user_id, activity_type, description

---

## Project Structure {#structure}

```
municipality-portal/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Admin panel controllers
│   │   │   ├── Public/          # Public-facing controllers
│   │   │   └── Api/             # API controllers
│   │   ├── Middleware/          # Custom middleware (SetLocale, etc.)
│   │   └── Requests/            # Form request validation
│   ├── Models/                  # Eloquent models
│   ├── Services/                # Business logic services
│   ├── Policies/                # Authorization policies
│   ├── Events/                  # Event classes
│   ├── Listeners/               # Event listeners
│   └── Jobs/                    # Queued jobs
├── database/
│   ├── migrations/              # Database migrations
│   ├── seeders/                 # Database seeders
│   └── factories/               # Model factories
├── resources/
│   ├── views/
│   │   ├── layouts/             # Base layouts
│   │   ├── admin/               # Admin templates
│   │   ├── public/              # Public templates
│   │   ├── auth/                # Authentication views
│   │   ├── components/          # Reusable components
│   │   └── emails/              # Email templates
│   ├── css/                     # Stylesheets
│   └── js/                      # JavaScript files
├── routes/
│   ├── web.php                  # Web routes
│   ├── api.php                  # API routes
│   └── auth.php                 # Authentication routes
├── storage/                     # User uploads, logs
├── bootstrap/                   # Application bootstrapping
├── config/                      # Configuration files
├── public/                      # Public assets
└── tests/                       # Test files
```

---

## Key Features {#features}

### 1. Multi-Language Support
- Supported languages: French (default), English, Arabic
- Database fields: `{field}_fr`, `{field}_en`, `{field}_ar`
- Language switching via query parameter: `?lang=en`

### 2. Role-Based Access Control (RBAC)
- Permissions defined in `RolePermissionSeeder`
- Middleware checks: `can`, `authorize()`
- Policies for resource authorization

### 3. Content Publishing Workflow
- Draft → Published → Archived states
- Automatic `published_at` timestamp
- View tracking for articles

### 4. Citizen Request Management
- Automatic request number generation
- Status progression workflow
- Document upload support
- Messaging system for citizen-official communication

### 5. Complaint Management
- Category-based classification
- Priority-based assignment
- Resolution tracking
- Response templates

### 6. File Management
- Upload to `storage/app/public`
- Image optimization support (via Intervention Image)
- Automatic linking with `storage:link`

### 7. Audit & Compliance
- All administrative actions logged
- User activity tracking
- Change history with JSON diff

---

## API Documentation {#api}

### Authentication
API requires Sanctum token authentication for protected routes:

```bash
# Get token
POST /api/login

# Use in requests
Authorization: Bearer {token}
```

### Public Endpoints

**Get Articles**
```
GET /api/articles
GET /api/articles/{id}
```

**Get Events**
```
GET /api/events
GET /api/events/{id}
```

**Get News**
```
GET /api/news
GET /api/news/{id}
```

### Protected Endpoints (Authenticated)

**User Requests**
```
POST /api/requests                    # Create request
GET /api/requests                     # List user's requests
GET /api/requests/{id}                # Get request details
```

**Complaints**
```
POST /api/complaints                  # File complaint
GET /api/complaints                   # List user's complaints
GET /api/complaints/{id}              # Get complaint details
```

### Response Format

**Success (200)**
```json
{
    "id": 1,
    "name": "Example",
    "created_at": "2024-01-01T10:00:00Z"
}
```

**Error (400/422/404)**
```json
{
    "error": "Error message",
    "status": 400
}
```

---

## Authentication & Authorization {#auth}

### Default Authentication Setup

The application comes with Laravel Breeze authentication. Users can register or be created by admins.

### Creating Users Programmatically

```php
use App\Models\User;

// Create user
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => Hash::make('password'),
    'user_type' => 'citizen', // citizen, official, editor, admin
    'status' => 'active',
]);

// Assign role
$user->assignRole('citizen');

// Assign specific permission
$user->givePermissionTo('create-citizen-requests');
```

### Checking Permissions

```php
// In controller
if (auth()->user()->hasPermissionTo('edit-articles')) {
    // User can edit articles
}

// In blade
@can('edit-articles')
    <!-- User can edit articles -->
@endcan

// In policy
public function update(User $user, Article $article): bool
{
    return $user->hasPermissionTo('edit-articles');
}
```

---

## Deployment Guide {#deployment}

### Preparing for Production

1. **Environment Configuration**
   ```bash
   # Update .env for production
   APP_ENV=production
   APP_DEBUG=false
   DB_HOST=your-db-host
   DB_USERNAME=prod-user
   DB_PASSWORD=secure-password
   ```

2. **Cache Configuration**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Security Keys**
   ```bash
   # Ensure BETTER_AUTH_SECRET is set
   php artisan key:generate
   ```

### Deployment to Server

1. **Upload Files**
   - Upload project to server
   - Copy `.env` file (don't commit to git)

2. **Install Dependencies**
   ```bash
   composer install --no-dev
   npm install
   npm run build
   ```

3. **Database Migrations**
   ```bash
   php artisan migrate --force
   php artisan db:seed --class=RolePermissionSeeder
   ```

4. **Configure Web Server**

   **Apache (.htaccess in public/)**
   ```apache
   RewriteEngine On
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteRule ^ index.php [L]
   ```

   **Nginx**
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

5. **File Permissions**
   ```bash
   chown -R www-data:www-data /path/to/app
   chmod -R 755 /path/to/app
   chmod -R 775 storage/ bootstrap/cache/
   ```

### SSL Certificate
Ensure HTTPS is enabled. For free certificates, use Let's Encrypt:
```bash
certbot certonly --webroot -w /path/to/public -d yourdomain.com
```

---

## Development Guide {#development}

### Running Migrations

```bash
# Run all pending migrations
php artisan migrate

# Rollback last batch
php artisan migrate:rollback

# Reset database (caution!)
php artisan migrate:reset

# Refresh and reseed
php artisan migrate:refresh --seed
```

### Creating New Features

1. **Create Model**
   ```bash
   php artisan make:model ModelName -m
   ```

2. **Add Migration** (in `database/migrations/`)

3. **Create Controller**
   ```bash
   php artisan make:controller ControllerName --model=ModelName
   ```

4. **Define Routes** (in `routes/web.php`)

5. **Create Views** (in `resources/views/`)

### Tinker Shell

```bash
php artisan tinker

# Examples
$user = User::first();
$user->assignRole('admin');
$articles = Article::published()->get();
$articles->each->delete();
```

### Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test tests/Feature/ArticleTest.php

# With coverage
php artisan test --coverage
```

### Debugging

```php
// Log debug info
\Log::debug('Debug message', ['data' => $variable]);

// Dump and die
dd($variable);

// Dump
dump($variable);
```

Check logs in `storage/logs/laravel.log`

---

## Support & Troubleshooting

### Common Issues

**"Column not found" Error**
- Run `php artisan migrate`
- Check that migrations have run successfully

**"Class not found" Error**
- Run `composer dump-autoload`
- Check namespace spelling in imports

**Permission Denied on Storage**
- Run `chmod -R 775 storage/ bootstrap/cache/`
- Ensure web server user owns the directory

**Blank Page or 500 Error**
- Check `storage/logs/laravel.log`
- Enable `APP_DEBUG=true` temporarily
- Verify `.env` file exists and is correct

---

## Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Spatie Laravel Permissions](https://spatie.be/docs/laravel-permission)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Blade Templating](https://laravel.com/docs/blade)

---

**Last Updated**: 2024
**Version**: 1.0.0
