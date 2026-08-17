# Municipality Portal

A comprehensive Laravel application for managing municipal content, citizen services, and administrative operations with multi-language support (French, English, Arabic).

## Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 5.7+ / MariaDB
- Node.js 16+

### Installation

```bash
# 1. Install dependencies
composer install
npm install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Configure database in .env
# DB_HOST=localhost
# DB_DATABASE=commune_db
# DB_USERNAME=root
# DB_PASSWORD=

# 4. Run migrations and seeders
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder

# 5. Link storage
php artisan storage:link

# 6. Build assets
npm run build

# 7. Start server
php artisan serve
```

Access at: `http://localhost:8000`

## Features

### Content Management
- ✅ Articles with categories
- ✅ News and announcements
- ✅ Event management with registration
- ✅ Image galleries
- ✅ Multi-language support (FR/EN/AR)

### Citizen Services
- ✅ Service request submission and tracking
- ✅ Complaint management
- ✅ Document uploads
- ✅ Messaging system
- ✅ Request status notifications

### Administrative
- ✅ Role-based access control (RBAC)
- ✅ User management
- ✅ Department directory
- ✅ Budget and financial tracking
- ✅ Audit logging
- ✅ Admin dashboard

### User Roles
- **Admin**: Full system access
- **Editor**: Content creation and publishing
- **Official**: Handle requests and complaints
- **Citizen**: Submit requests, view content, register for events

## Project Structure

```
├── app/                    # Application code
│   ├── Http/Controllers/  # Request handlers
│   ├── Models/            # Database models
│   ├── Services/          # Business logic
│   ├── Policies/          # Authorization
│   └── Middleware/        # Custom middleware
├── database/
│   ├── migrations/        # Database schema
│   └── seeders/          # Seed data
├── resources/
│   ├── views/            # Blade templates
│   ├── css/              # Stylesheets
│   └── js/               # JavaScript
├── routes/               # URL routes
└── storage/              # Uploads and logs
```

## Configuration

### Environment Variables
See `.env.example` for all available options:

```env
APP_NAME="Municipality Portal"
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=commune_db
MAIL_MAILER=smtp
```

### Multi-Language
Supported languages: `fr` (default), `en`, `ar`

Switch language: `?lang=en`

### Localization
Edit `config/app.php`:
```php
'locale' => 'fr',
'supported_locales' => ['fr', 'en', 'ar'],
```

## API Usage

### Public Endpoints
```bash
GET  /api/articles        # List articles
GET  /api/articles/{id}   # Get article
GET  /api/events          # List events
GET  /api/news            # List news
```

### Authenticated Endpoints
```bash
POST /api/requests        # Create request
GET  /api/requests        # List user requests
POST /api/complaints      # File complaint
GET  /api/complaints      # List user complaints
```

## Database Schema

**Key Tables:**
- `users` - User accounts and profiles
- `articles` - Multi-language articles
- `news` - News and announcements
- `events` - Event management with registrations
- `citizen_requests` - Service requests
- `complaints` - Complaint tracking
- `departments` - Municipal departments
- `budgets` - Financial budgets
- `audit_logs` - Action tracking

See `PROJECT_DOCUMENTATION.md` for complete schema reference.

## Deployment

### Production Checklist
```bash
# 1. Update .env
APP_ENV=production
APP_DEBUG=false

# 2. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Run migrations
php artisan migrate --force

# 4. Set permissions
chmod -R 775 storage/ bootstrap/cache/
chown -R www-data:www-data /path/to/app

# 5. Enable HTTPS
# Use Let's Encrypt or your SSL provider
```

### Deployment Platforms
- Laravel Forge
- Heroku
- DigitalOcean
- AWS
- Any PHP hosting with MySQL

## Development

### Running Tests
```bash
php artisan test
php artisan test --coverage
```

### Database Commands
```bash
php artisan migrate              # Run migrations
php artisan migrate:rollback     # Rollback
php artisan tinker              # Interactive shell
php artisan db:seed             # Seed database
```

### Code Quality
```bash
php artisan pint                # Format code
php artisan lint                # Check for errors
```

## Troubleshooting

### "SQLSTATE[HY000]: General error" 
- Run `php artisan migrate`
- Check database connection in `.env`

### File upload not working
- Run `php artisan storage:link`
- Ensure `storage/` has correct permissions

### 404 errors after deployment
- Run `php artisan route:cache`
- Verify `.htaccess` or Nginx config

### Blank page or 500 error
- Check `storage/logs/laravel.log`
- Set `APP_DEBUG=true` temporarily

## Technologies

- **Framework**: Laravel 11
- **Database**: MySQL / MariaDB
- **Authentication**: Laravel Breeze + Spatie Permissions
- **Frontend**: Blade Templating + Tailwind CSS (optional)
- **Assets**: NPM, Webpack
- **API**: RESTful with Sanctum

## Documentation

Full documentation available in:
- `PROJECT_DOCUMENTATION.md` - Complete guide
- `routes/web.php` - Web route definitions
- `routes/api.php` - API route definitions
- Laravel docs: https://laravel.com/docs

## Support

For issues, questions, or contributions:
1. Check `PROJECT_DOCUMENTATION.md`
2. Review Laravel documentation
3. Check application logs in `storage/logs/`

## License

This project is licensed under the MIT License.

## Credits

Built with:
- [Laravel](https://laravel.com)
- [Spatie Permissions](https://spatie.be)
- [Eloquent Sluggable](https://github.com/cviebrock/eloquent-sluggable)
- [Intervention Image](https://image.intervention.io)

---

**Version**: 1.0.0
**Last Updated**: 2024
