# Municipality Portal - Laravel 12 Setup Guide

## Project Structure Created ✓

The following directories and core models have been created:

### Models Created (16 models)
- ✓ User (with role-based access)
- ✓ Role (permission system)
- ✓ Citoyen (Citizens/Users)
- ✓ Actualite (News)
- ✓ Evenement (Events)
- ✓ Reclamation (Complaints)
- ✓ DemandeAcces (Access Requests)
- ✓ DemandeDocs (Document Requests)
- ✓ Galerie (Photo/Video Galleries)
- ✓ Article (Static Pages)
- ✓ AppelOffre (Tender Calls)
- ✓ Conseil (Municipal Council)
- ✓ Statistique (Statistics/Budget Charts)
- ✓ Denonciation (Whistleblowing)
- ✓ Contact (Directory)
- ✓ Abonne (Subscribers)
- ✓ RaccourciRapide (Quick Links)
- ✓ AccueilComposant (Homepage Components)

### Directory Structure Created ✓
```
app/
  ├── Http/Controllers/
  │   ├── Frontend/
  │   ├── Backend/
  │   └── Api/
  ├── Http/Requests/
  ├── Policies/
  ├── Services/
  ├── Repositories/
  └── Models/ (18 models created)
  
resources/
  ├── views/
  │   ├── layouts/
  │   ├── frontend/
  │   └── backend/
  └── lang/
      ├── ar/
      ├── fr/
      └── en/

database/
  ├── migrations/
  └── seeders/
```

## Next Steps

### 1. Database Migrations
Create migrations for all 18+ database tables matching the existing dbcommune.sql structure.

**Tables to migrate:**
1. roles
2. users
3. citoyens
4. actualites
5. evenements
6. demandes_acces
7. reclamations
8. demande_docs
9. galleries
10. articles
11. appels_offres
12. conseil_municipales
13. statistiques
14. denonciations
15. contacts
16. abonnes
17. raccourci_rapides
18. accueil_composants
19. emailnonenvoyes (notifications)

### 2. Controllers
- **Frontend Controllers**: HomeController, NewsController, EventController, GalleryController, etc.
- **Backend Controllers**: DashboardController, ContentController, UserController, etc.
- **API Controllers**: NewsApiController, EventApiController, ComplaintApiController, etc.

### 3. Routes
- **Web routes** (frontend & admin)
- **API routes** (REST endpoints)
- **Admin routes** (admin panel)

### 4. Views
- Main layouts with navbar, sidebar, footer
- Frontend templates for all modules
- Admin dashboard templates
- RTL support for Arabic

### 5. Policies & Middleware
- Authorization policies for each role
- Authentication middleware
- Localization middleware

### 6. Services & Repositories
- Service classes for business logic
- Repository pattern for data access
- Notification services

## Key Features Implemented in Models

### Eloquent Relationships
- User → Role
- Actualite → Creator, Modifier, Approver
- Citoyen → Reclamations, DemandesAcces, DemandeDocs
- And more...

### Query Scopes
- Published/Featured scopes for content
- Status-based scopes (pending, delivered, etc.)
- Language-specific getters for multilingual content

### Helper Methods
- isActive(), isOpen(), isPast()
- getStatusName(), getPriorityName()
- getTitleIn($language), getContentIn($language)
- generateCode() for unique IDs

### Soft Deletes
- All content models use soft deletes
- Preserves historical data

## Multilingual Support

All content models include:
- titre_fr, titre_ar, titre_en (titles)
- description_fr, description_ar, description_en (descriptions)
- Helper methods: getTitleIn('ar'), getDescriptionIn('en')

Translation files created for:
- Arabic (/resources/lang/ar/)
- French (/resources/lang/fr/)
- English (/resources/lang/en/)

## User Roles & Permissions

Implemented in Role model with JSON permissions:
1. **Super Admin** - Full system access
2. **Municipality Administrator** - All municipal content
3. **Municipality Employee** - Assigned modules
4. **Council Member** - Council area access
5. **Citizen** - Public services
6. **Association Representative** - Association profile

## Status System

### Content Status
- PUBLISHED
- UNPUBLISHED
- ARCHIVE
- ATTENTE (Pending)

### Complaint Status
- 0: Open (Ouverte)
- 1: Closed (Fermée)

### Request Status
- 0: Pending (En attente)
- 1: Satisfied/Delivered (Satisfaite/Livrée)
- 2: Rejected (Rejetée)

## Code Generation Features

Unique Code Generation:
- Reclamation::generateCode() → REC-2024-00001
- DemandeAcces::generateCode() → ACC-2024-00001
- Conseil::generateCode() → CM-2024-0001
- Denonciation::generateCode() → DEN-2024-00001

## Installation Checklist

- [ ] Create all migrations (Task 3)
- [ ] Create all controllers (Task 5)
- [ ] Create form requests & validation (Task 6)
- [ ] Create policies & middleware (Task 7)
- [ ] Create blade views & layouts (Task 8)
- [ ] Create API routes & controllers (Task 9)
- [ ] Create services & repositories (Task 10)
- [ ] Seed demo data
- [ ] Test authentication system
- [ ] Configure email notifications
- [ ] Setup queue workers
- [ ] Configure multilingual routing

## Running the Application

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Create migrations and seed data
php artisan migrate
php artisan db:seed

# Build assets
npm run build

# Start development server
php artisan serve
```

## Documentation References
- Complete Project Documentation: [PROJECT_DOCUMENTATION.md](PROJECT_DOCUMENTATION.md)
- Database Schema: Use existing dbcommune.sql as reference
- API Documentation: Will be generated with Laravel Swagger

---

**Status**: Laravel 12 project structure initialized with 18+ Eloquent models
**Last Updated**: $(date)
**Next Task**: Create Database Migrations
