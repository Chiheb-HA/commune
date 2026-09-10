<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ArticleController as PublicArticleController;
use App\Http\Controllers\Public\EventController as PublicEventController;
use App\Http\Controllers\Public\NewsController as PublicNewsController;
use App\Http\Controllers\Public\GalleryController as PublicGalleryController;
use App\Http\Controllers\Public\ServicesController as PublicServicesController;
use App\Http\Controllers\Public\DepartmentsController as PublicDepartmentsController;
use App\Http\Controllers\Public\OfficialsController as PublicOfficialsController;
use App\Http\Controllers\Public\TaxController;
use App\Http\Controllers\Public\RequestTrackingController;
use App\Http\Controllers\Public\LegalController;
use App\Http\Controllers\Public\EmergencyContactController;
use App\Http\Controllers\Public\SitemapController;
use App\Http\Controllers\Public\BudgetController;
use App\Http\Controllers\Public\AssociationController;
use App\Http\Controllers\Public\CouncilSessionController;
use App\Http\Controllers\Public\FaqController as PublicFaqController;
use App\Http\Controllers\Public\PartnershipController as PublicPartnershipController;
use App\Http\Controllers\Public\StaffResourceController as PublicStaffResourceController;
use App\Http\Controllers\Public\NewsletterController as PublicNewsletterController;
use App\Http\Controllers\Public\FundingSourceController as PublicFundingSourceController;
use App\Http\Controllers\Public\CompetitionController as PublicCompetitionController;
use App\Http\Controllers\Public\ProcurementNoticeController as PublicProcurementNoticeController;
use App\Http\Controllers\Public\GovernancePublicationController as PublicGovernancePublicationController;

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\MunicipalServiceController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\OfficialController;
use App\Http\Controllers\Admin\PropertyTaxController;
use App\Http\Controllers\Admin\AssociationController as AdminAssociationController;
use App\Http\Controllers\Admin\CouncilSessionController as AdminCouncilSessionController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PartnershipController;
use App\Http\Controllers\Admin\StaffResourceController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\FundingSourceController;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\ProcurementNoticeController;
use App\Http\Controllers\Admin\GovernancePublicationController;

use App\Http\Controllers\Frontend\ComplaintController as FrontendComplaintController;
use App\Http\Controllers\Frontend\RequestController as FrontendRequestController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Search
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Locale
Route::get('/locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ar'])) {
        session()->put('locale', $locale);
        app()->setLocale($locale);
        config(['app.locale' => $locale]);
    }

    return redirect()->back();
})->middleware('web')->name('setLocale');


// Articles
Route::prefix('articles')->group(function () {
    Route::get('/', [PublicArticleController::class, 'index'])
        ->name('articles.index');

    Route::get('/category/{category}', [PublicArticleController::class, 'byCategory'])
        ->name('articles.category');

    Route::get('/{slug}/share/{network}', [PublicArticleController::class, 'share'])
        ->where('network', 'facebook|x|email')
        ->name('articles.share');

    Route::get('/{slug}', [PublicArticleController::class, 'show'])
        ->name('articles.show');
});


// Events
Route::prefix('events')->group(function () {
    Route::get('/', [PublicEventController::class, 'index'])
        ->name('events.index');

    Route::get('/{slug}', [PublicEventController::class, 'show'])
        ->name('events.show');
});


// News
Route::prefix('actualites')->group(function () {
    Route::get('/', [PublicNewsController::class, 'index'])
        ->name('news.index');

    Route::get('/{slug}/share/{network}', [PublicNewsController::class, 'share'])
        ->where('network', 'facebook|x|email')
        ->name('news.share');

    Route::get('/{slug}', [PublicNewsController::class, 'show'])
        ->name('news.show');
});


// Gallery
Route::prefix('galeries')->group(function () {
    Route::get('/', [PublicGalleryController::class, 'index'])
        ->name('galleries.index');

    Route::get('/{id}', [PublicGalleryController::class, 'show'])
        ->name('galleries.show');
});


// Departments
Route::prefix('departments')->group(function () {
    Route::get('/', [PublicDepartmentsController::class, 'index'])
        ->name('departments.index');

    Route::get('/{slug}', [PublicDepartmentsController::class, 'show'])
        ->name('departments.show');
});


// Officials
Route::prefix('officials')->group(function () {
    Route::get('/', [PublicOfficialsController::class, 'index'])
        ->name('officials.index');
});


// Emergency Contacts
Route::get('/contacts-urgence', [EmergencyContactController::class, 'index'])
    ->name('emergency-contacts.index');


// Sitemap
Route::get('/plan-du-site', [SitemapController::class, 'index'])
    ->name('sitemap.index');


// Taxes
Route::get('/sessions-conseil', [CouncilSessionController::class, 'index'])
    ->name('council-sessions.index');

Route::get('/associations', [AssociationController::class, 'index'])
    ->name('associations.index');

Route::get('/associations/{association}', [AssociationController::class, 'show'])
    ->name('associations.show');

// Keep the export route before any future budget slug/catch-all route.
Route::get('/budget/export', [BudgetController::class, 'exportCsv'])
    ->name('budget.export');

Route::get('/budget', [BudgetController::class, 'index'])
    ->name('budget.index');

Route::get('/taxes', [TaxController::class, 'index'])
    ->name('taxes.index');

Route::post('/taxes', [TaxController::class, 'index'])
    ->name('taxes.search');


// Request Tracking
Route::get('/suivi-demande', [RequestTrackingController::class, 'index'])
    ->name('request-tracking.index');

Route::post('/suivi-demande', [RequestTrackingController::class, 'index'])
    ->name('request-tracking.search');

Route::get('/consultation-permis', [RequestTrackingController::class, 'permit'])
    ->name('permit-consultation.index');

Route::post('/consultation-permis', [RequestTrackingController::class, 'permit'])
    ->name('permit-consultation.search');


// Legal
Route::get('/confidentialite', [LegalController::class, 'privacy'])
    ->name('legal.privacy');

Route::get('/conditions-utilisation', [LegalController::class, 'terms'])
    ->name('legal.terms');

Route::get('/mentions-legales', [LegalController::class, 'notice'])
    ->name('legal.notice');

Route::get('/reglementation', [LegalController::class, 'pau'])
    ->name('legal.pau');


// FAQ
Route::get('/faq', [PublicFaqController::class, 'index'])
    ->name('faqs.index');


// Partnerships
Route::get('/partenariats', [PublicPartnershipController::class, 'index'])
    ->name('partnerships.index');


// Staff Resources
Route::get('/espace-fonctionnaire', [PublicStaffResourceController::class, 'index'])
    ->name('staff-resources.index');


// Newsletter
Route::get('/newsletter', fn () => redirect('/#newsletter'))
    ->name('newsletter.index');

Route::post('/newsletter', [PublicNewsletterController::class, 'store'])
    ->name('newsletter.store');


// Funding Sources
Route::get('/financement', [PublicFundingSourceController::class, 'index'])
    ->name('funding-sources.index');


// Competitions
Route::prefix('concours')->group(function () {
    Route::get('/', [PublicCompetitionController::class, 'index'])
        ->name('competitions.index');

    Route::get('/{slug}', [PublicCompetitionController::class, 'show'])
        ->name('competitions.show');
});


// Procurement Notices
Route::get('/avis-appel-concurrence', [PublicProcurementNoticeController::class, 'index'])
    ->name('procurement-notices.index');


// Governance Publications
Route::get('/gouvernance-locale', [PublicGovernancePublicationController::class, 'index'])
    ->name('governance-publications.index');


// Services
Route::prefix('services')->group(function () {

    Route::get('/', [PublicServicesController::class, 'index'])
        ->name('services.index');

    Route::get('/contact', [FrontendContactController::class, 'create'])
        ->name('services.contact');

    Route::post('/contact', [FrontendContactController::class, 'store'])
        ->name('services.contact.store');

    Route::get('/request', [FrontendRequestController::class, 'create'])
        ->name('services.request');

    Route::post('/request', [FrontendRequestController::class, 'store'])
        ->name('services.request.store');

    Route::get('/complaint', [FrontendComplaintController::class, 'create'])
        ->name('services.complaint');

    Route::post('/complaint', [FrontendComplaintController::class, 'store'])
        ->name('services.complaint.store');

    Route::get('/{slug}', [PublicServicesController::class, 'show'])
        ->name('services.show');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin|editor|official'])
    ->prefix('admin')
    ->group(function () {

        // Dashboard
        Route::get(
            '/dashboard',
            [App\Http\Controllers\Admin\DashboardController::class, 'index']
        )->name('admin.dashboard');


        // Articles
        Route::resource('articles', ArticleController::class, [
            'as' => 'admin'
        ]);

        Route::post(
            'articles/{article}/publish',
            [ArticleController::class, 'publish']
        )->name('admin.articles.publish');

        Route::post(
            'articles/{article}/archive',
            [ArticleController::class, 'archive']
        )->name('admin.articles.archive');


        // News
        Route::resource('news', NewsController::class, [
            'as' => 'admin'
        ]);


        // Events
        Route::resource('events', EventController::class, [
            'as' => 'admin'
        ]);

        Route::get(
            'events/{event}/registrations',
            [EventController::class, 'registrations']
        )->name('admin.events.registrations');


        // Galleries
        Route::resource('galleries', GalleryController::class, [
            'as' => 'admin'
        ]);

        Route::post(
            'galleries/{gallery}/images',
            [GalleryController::class, 'addImage']
        )->name('admin.galleries.addImage');

        Route::delete(
            'gallery-images/{image}',
            [GalleryController::class, 'removeImage']
        )->name('admin.galleries.removeImage');


        // FAQs
        Route::resource('faqs', FaqController::class, [
            'as' => 'admin'
        ]);


        // Partnerships
        Route::resource('partnerships', PartnershipController::class, [
            'as' => 'admin'
        ]);


        // Staff Resources
        Route::resource('staff-resources', StaffResourceController::class, [
            'as' => 'admin'
        ]);


        // Newsletter
        Route::prefix('newsletter')->group(function () {
            Route::get(
                '/',
                [NewsletterController::class, 'index']
            )->name('admin.newsletter.index');
            Route::get(
                '/export',
                [NewsletterController::class, 'export']
            )->name('admin.newsletter.export');
        });


        // Funding Sources
        Route::resource('funding-sources', FundingSourceController::class, [
            'as' => 'admin'
        ]);


        // Competitions
        Route::resource('competitions', CompetitionController::class, [
            'as' => 'admin'
        ]);


        // Procurement Notices
        Route::resource('procurement-notices', ProcurementNoticeController::class, [
            'as' => 'admin'
        ]);


        // Governance Publications
        Route::resource('governance-publications', GovernancePublicationController::class, [
            'as' => 'admin'
        ]);


        // Municipal Services
        Route::prefix('municipal-services')->group(function () {

            Route::get(
                '/',
                [MunicipalServiceController::class, 'index']
            )->name('admin.municipal-services.index');

            Route::get(
                '/create',
                [MunicipalServiceController::class, 'create']
            )->name('admin.municipal-services.create');

            Route::post(
                '/',
                [MunicipalServiceController::class, 'store']
            )->name('admin.municipal-services.store');

            Route::get(
                '/{municipalService}/edit',
                [MunicipalServiceController::class, 'edit']
            )->name('admin.municipal-services.edit');

            Route::put(
                '/{municipalService}',
                [MunicipalServiceController::class, 'update']
            )->name('admin.municipal-services.update');

            Route::delete(
                '/{municipalService}',
                [MunicipalServiceController::class, 'destroy']
            )->name('admin.municipal-services.destroy');

            Route::post(
                '/{municipalService}/toggle-status',
                [MunicipalServiceController::class, 'toggleStatus']
            )->name('admin.municipal-services.toggle-status');
        });


        // Departments
        Route::resource('associations', AdminAssociationController::class, [
            'as' => 'admin'
        ])->except(['show']);


        // Departments
        Route::resource('council-sessions', AdminCouncilSessionController::class, [
            'as' => 'admin'
        ])->parameters(['council-sessions' => 'councilSession'])->except(['show']);

        Route::post(
            'council-sessions/{councilSession}/notify',
            [AdminCouncilSessionController::class, 'notifyMembers']
        )->name('admin.council-sessions.notify');


        // Departments
        Route::prefix('departments')->group(function () {

            Route::get(
                '/',
                [DepartmentController::class, 'index']
            )->name('admin.departments.index');

            Route::get(
                '/create',
                [DepartmentController::class, 'create']
            )->name('admin.departments.create');

            Route::post(
                '/',
                [DepartmentController::class, 'store']
            )->name('admin.departments.store');

            Route::get(
                '/{department}/edit',
                [DepartmentController::class, 'edit']
            )->name('admin.departments.edit');

            Route::put(
                '/{department}',
                [DepartmentController::class, 'update']
            )->name('admin.departments.update');

            Route::delete(
                '/{department}',
                [DepartmentController::class, 'destroy']
            )->name('admin.departments.destroy');

            Route::post(
                '/{department}/toggle-status',
                [DepartmentController::class, 'toggleStatus']
            )->name('admin.departments.toggle-status');
        });


        // Officials
        Route::prefix('officials')->group(function () {

            Route::get(
                '/',
                [OfficialController::class, 'index']
            )->name('admin.officials.index');

            Route::get(
                '/create',
                [OfficialController::class, 'create']
            )->name('admin.officials.create');

            Route::post(
                '/',
                [OfficialController::class, 'store']
            )->name('admin.officials.store');

            Route::get(
                '/{official}/edit',
                [OfficialController::class, 'edit']
            )->name('admin.officials.edit');

            Route::put(
                '/{official}',
                [OfficialController::class, 'update']
            )->name('admin.officials.update');

            Route::delete(
                '/{official}',
                [OfficialController::class, 'destroy']
            )->name('admin.officials.destroy');

            Route::post(
                '/{official}/toggle-status',
                [OfficialController::class, 'toggleStatus']
            )->name('admin.officials.toggle-status');
        });


        // Property Taxes
        Route::prefix('property-taxes')->group(function () {

            Route::get(
                '/',
                [PropertyTaxController::class, 'index']
            )->name('admin.property-taxes.index');

            Route::get(
                '/create',
                [PropertyTaxController::class, 'create']
            )->name('admin.property-taxes.create');

            Route::post(
                '/',
                [PropertyTaxController::class, 'store']
            )->name('admin.property-taxes.store');

            Route::get(
                '/{propertyTax}/edit',
                [PropertyTaxController::class, 'edit']
            )->name('admin.property-taxes.edit');

            Route::put(
                '/{propertyTax}',
                [PropertyTaxController::class, 'update']
            )->name('admin.property-taxes.update');

            Route::delete(
                '/{propertyTax}',
                [PropertyTaxController::class, 'destroy']
            )->name('admin.property-taxes.destroy');
        });


        // Requests
        Route::prefix('requests')->group(function () {

            Route::get(
                '/',
                [RequestController::class, 'index']
            )->name('admin.requests.index');

            Route::get(
                '/{citizenRequest}',
                [RequestController::class, 'show']
            )->name('admin.requests.show');

            Route::post(
                '/{citizenRequest}/assign',
                [RequestController::class, 'assign']
            )->name('admin.requests.assign');

            Route::post(
                '/{citizenRequest}/status',
                [RequestController::class, 'updateStatus']
            )->name('admin.requests.updateStatus');

            Route::post(
                '/{citizenRequest}/complete',
                [RequestController::class, 'complete']
            )->name('admin.requests.complete');

            Route::get(
                '/statistics',
                [RequestController::class, 'statistics']
            )->name('admin.requests.statistics');
        });


        // Complaints
        Route::prefix('complaints')->group(function () {

            Route::get(
                '/',
                [ComplaintController::class, 'index']
            )->name('admin.complaints.index');

            Route::get(
                '/{complaint}',
                [ComplaintController::class, 'show']
            )->name('admin.complaints.show');

            Route::post(
                '/{complaint}/assign',
                [ComplaintController::class, 'assign']
            )->name('admin.complaints.assign');

            Route::post(
                '/{complaint}/respond',
                [ComplaintController::class, 'respond']
            )->name('admin.complaints.respond');

            Route::post(
                '/{complaint}/close',
                [ComplaintController::class, 'close']
            )->name('admin.complaints.close');

            Route::get(
                '/statistics',
                [ComplaintController::class, 'statistics']
            )->name('admin.complaints.statistics');
        });


        // Settings
        Route::get(
            '/settings',
            [App\Http\Controllers\Admin\SettingsController::class, 'index']
        )->name('admin.settings');

        Route::patch(
            '/settings/commune-info',
            [App\Http\Controllers\Admin\SettingsController::class, 'updateCommuneInfo']
        )->name('admin.settings.update-commune-info');

        Route::patch(
            '/settings/working-hours',
            [App\Http\Controllers\Admin\SettingsController::class, 'updateWorkingHours']
        )->name('admin.settings.update-working-hours');

        Route::patch(
            '/settings/service-toggles',
            [App\Http\Controllers\Admin\SettingsController::class, 'updateServiceToggles']
        )->name('admin.settings.update-service-toggles');

        Route::patch(
            '/settings/legal-content',
            [App\Http\Controllers\Admin\SettingsController::class, 'updateLegalContent']
        )->name('admin.settings.update-legal-content');

        Route::post(
            '/settings/run-backup',
            [App\Http\Controllers\Admin\SettingsController::class, 'runBackup']
        )->name('admin.settings.run-backup');
    });


/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post(
        'events/{event}/register',
        [PublicEventController::class, 'register']
    )->name('events.register');

    Route::delete(
        'event-registrations/{registration}',
        [PublicEventController::class, 'cancelRegistration']
    )->name('events.cancelRegistration');
});


/*
|--------------------------------------------------------------------------
| Citizen Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth', 'role:citizen'])
    ->prefix('espace-citoyen')
    ->group(function () {

        Route::get(
            '/dashboard',
            [App\Http\Controllers\Citizen\DashboardController::class, 'index']
        )->name('citizen.dashboard');

        Route::get(
            '/requests',
            [App\Http\Controllers\Citizen\RequestController::class, 'index']
        )->name('citizen.requests.index');

        Route::get(
            '/requests/{request}',
            [App\Http\Controllers\Citizen\RequestController::class, 'show']
        )->name('citizen.requests.show');

        Route::get(
            '/complaints',
            [App\Http\Controllers\Citizen\ComplaintController::class, 'index']
        )->name('citizen.complaints.index');

        Route::get(
            '/complaints/{complaint}',
            [App\Http\Controllers\Citizen\ComplaintController::class, 'show']
        )->name('citizen.complaints.show');
    });


require __DIR__.'/auth.php';