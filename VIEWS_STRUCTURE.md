# Laravel Views Structure - Municipality Portal

## Overview
This document describes the complete Blade template structure for the Municipality Portal application.

## Directory Structure

```
resources/views/
├── layouts/
│   ├── app.blade.php                 # Public website layout
│   └── admin.blade.php               # Admin dashboard layout
├── public/
│   ├── home.blade.php                # Homepage
│   ├── articles/
│   │   ├── index.blade.php           # Articles listing
│   │   └── show.blade.php            # Article detail page
│   └── events/
│       ├── index.blade.php           # Events listing
│       └── show.blade.php            # Event detail page
├── admin/
│   ├── dashboard.blade.php           # Admin dashboard
│   └── articles/
│       ├── index.blade.php           # Articles management
│       └── form.blade.php            # Article create/edit form
```

## Layout Templates

### `layouts/app.blade.php`
**Purpose**: Main layout for public website
- Navigation bar with language selection
- Hero sections support
- Footer with quick links
- Multi-language support (EN/FR/AR)
- Bootstrap 5 styling
- 259 lines

### `layouts/admin.blade.php`
**Purpose**: Admin dashboard layout
- Fixed sidebar navigation
- Top navbar with user menu
- Responsive design
- Alert/error display
- Dashboard-specific styling
- 322 lines

---

## Public Views

### Homepage (`public/home.blade.php`)
**Features**:
- Hero section with call-to-action
- Services cards (4 main features)
- Latest articles carousel
- Upcoming events section
- Quick statistics (articles, events, users, departments)
- Newsletter/contact CTA
- Fully responsive
- 192 lines

**Variables Required**:
- `$articles` - Latest articles collection
- `$events` - Upcoming events collection
- `$articlesCount` - Total published articles
- `$eventsCount` - Total events
- `$usersCount` - Active users count
- `$departmentsCount` - Departments count

### Articles Listing (`public/articles/index.blade.php`)
**Features**:
- Grid layout (3 cards per row)
- Search functionality
- Category filter dropdown
- Pagination
- Article preview cards
- 70 lines

**Variables Required**:
- `$articles` - Paginated articles collection
- `$categories` - All categories for filter

### Article Detail (`public/articles/show.blade.php`)
**Features**:
- Full article content with HTML support
- Author and publication date
- Category badge
- Featured image
- Related articles (sidebar)
- Recent articles sidebar
- Social sharing buttons (Facebook, Twitter, Email)
- Breadcrumb navigation
- 143 lines

**Variables Required**:
- `$article` - Single article model
- `$categories` - All categories
- `$relatedArticles` - Related articles
- `$recentArticles` - Recent articles for sidebar

### Events Listing (`public/events/index.blade.php`)
**Features**:
- Event cards with date/location
- Search functionality
- Sort options (upcoming, latest, oldest)
- Event registration button
- 74 lines

**Variables Required**:
- `$events` - Paginated events collection

### Event Detail (`public/events/show.blade.php`)
**Features**:
- Full event details
- Date, time, and location
- Event registration form
- Contact information
- Share buttons
- Event status indicator
- Registration count display
- 167 lines

**Variables Required**:
- `$event` - Single event model
- `$registrations` - Registered participants
- `$isRegistered` - Registration status

---

## Admin Views

### Admin Dashboard (`admin/dashboard.blade.php`)
**Features**:
- Key metrics cards (articles, events, requests, users)
- Recent articles table
- Pending requests table
- Quick action buttons
- Responsive grid layout
- 163 lines

**Variables Required**:
- `$articlesCount` - Total articles count
- `$eventsCount` - Total events count
- `$requestsCount` - Total requests count
- `$usersCount` - Total users count
- `$recentArticles` - Last 5 articles
- `$pendingRequests` - Requests pending action

### Articles Management (`admin/articles/index.blade.php`)
**Features**:
- Responsive table with article list
- Search, status, category filters
- Publish/draft status badges
- Edit/view/delete actions
- Pagination support
- New article button
- 122 lines

**Variables Required**:
- `$articles` - Paginated articles
- `$categories` - All categories for filter

### Article Form (`admin/articles/form.blade.php`)
**Features**:
- Complete form for create/edit
- Title, slug, excerpt, content fields
- Featured image upload
- SEO fields (meta title, description)
- Tags input
- Publishing options
- Category selection
- Client-side slug generation
- 173 lines

**Variables Required**:
- `$article` - Existing article (optional for edit)
- `$categories` - All categories

---

## Styling & Design System

### Colors
```css
--primary: #1e40af           /* Blue */
--secondary: #64748b         /* Gray */
--success: #16a34a           /* Green */
--danger: #dc2626            /* Red */
--warning: #f59e0b           /* Amber */
--sidebar-bg: #1e293b        /* Dark slate */
```

### Typography
- Font Family: System fonts (-apple-system, BlinkMacSystemFont, Segoe UI, Roboto)
- Headings: Bold weights (700)
- Body: Normal weight (400)

### Components
- Bootstrap 5.3.0
- Bootstrap Icons
- Custom card styling with hover effects
- Responsive grid system

---

## Multi-Language Support

All views support 3 languages:
- **EN** - English
- **FR** - French  
- **AR** - Arabic

Language strings are wrapped in `{{ __('text') }}` Laravel localization helper.

Navigation includes language selector in:
- Public footer
- Admin user menu (for future implementation)

---

## Forms & Validation

### Article Form Features
- HTML5 validation
- Bootstrap form classes
- Error display with invalid feedback
- File upload with constraints
- Dynamic slug generation via JavaScript
- Submit and cancel buttons

---

## Missing Views (To Be Created)

The following views should be created to complete the application:

### Public Views
- `public/news/index.blade.php` - News listing
- `public/news/show.blade.php` - News detail
- `public/galleries/index.blade.php` - Photo galleries
- `public/services/request.blade.php` - Submit citizen request
- `public/services/complaint.blade.php` - File complaint
- `public/directory/index.blade.php` - Department directory
- `public/directory/contact.blade.php` - Contact page

### Auth Views
- `auth/login.blade.php` - Login form
- `auth/register.blade.php` - Registration form
- `auth/forgot-password.blade.php` - Password reset

### Admin Views
- `admin/dashboard/requests.blade.php` - Manage requests
- `admin/dashboard/complaints.blade.php` - Manage complaints
- `admin/news/index.blade.php` - News management
- `admin/events/index.blade.php` - Events management
- `admin/galleries/index.blade.php` - Gallery management
- `admin/users/index.blade.php` - User management
- `admin/permissions/index.blade.php` - Permission management

---

## Blade Features Used

- **@extends()** - Template inheritance
- **@section()** - Named sections
- **@yield()** - Display section content
- **@forelse()** - Iteration with empty fallback
- **@if/@else** - Conditional rendering
- **@auth/@guest** - Authentication checks
- **{{ }}** - Variable interpolation
- **{{ __() }}** - Multi-language strings
- **{!! !!}** - HTML rendering (unescaped)

---

## Notes for Developers

1. All views use Bootstrap 5 for responsive design
2. Multi-language strings should use `__()` helper
3. Images should be stored in `storage/app/public/`
4. Forms use CSRF protection with `@csrf`
5. Action buttons use `method_field()` for non-GET requests
6. Responsive breakpoints: md (768px), lg (992px), xl (1200px)

---

## Integration with Controllers

Views are designed to work with the following controllers:
- `HomeController` - Homepage
- `ArticleController` (Public) - Article listing/detail
- `EventController` (Public) - Event listing/detail
- `ArticleController` (Admin) - Article management
- Plus 6 additional admin controllers for other content types

