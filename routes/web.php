<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ArticleController as PublicArticleController;
use App\Http\Controllers\Public\EventController as PublicEventController;
use App\Http\Controllers\Public\NewsController as PublicNewsController;
use App\Http\Controllers\Public\GalleryController as PublicGalleryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Frontend\ComplaintController as FrontendComplaintController;
use App\Http\Controllers\Frontend\RequestController as FrontendRequestController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ar'])) {
        session()->put('locale', $locale);
        app()->setLocale($locale);
        config(['app.locale' => $locale]);
    }

    return redirect()->back();
})->middleware('web')->name('setLocale');

// Public Content Routes
Route::prefix('articles')->group(function () {
    Route::get('/', [PublicArticleController::class, 'index'])->name('articles.index');
    Route::get('/category/{category}', [PublicArticleController::class, 'byCategory'])->name('articles.category');
    Route::get('/{slug}', [PublicArticleController::class, 'show'])->name('articles.show');
});

// Public Events Routes
Route::prefix('events')->group(function () {
    Route::get('/', [PublicEventController::class, 'index'])->name('events.index');
    Route::get('/{slug}', [PublicEventController::class, 'show'])->name('events.show');
});

// Public News Routes
Route::prefix('actualites')->group(function () {
    Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');
    Route::get('/{slug}', [PublicNewsController::class, 'show'])->name('news.show');
});

// Public Gallery Routes
Route::prefix('galeries')->group(function () {
    Route::get('/', [PublicGalleryController::class, 'index'])->name('galleries.index');
    Route::get('/{id}', [PublicGalleryController::class, 'show'])->name('galleries.show');
});

// Public Services Routes
Route::prefix('services')->group(function () {
    Route::get('/contact', [FrontendContactController::class, 'create'])->name('services.contact');
    Route::post('/contact', [FrontendContactController::class, 'store'])->name('services.contact.store');
});

// Authenticated Services Routes
Route::middleware(['auth'])->prefix('services')->group(function () {
    Route::get('/request', [FrontendRequestController::class, 'create'])->name('services.request');
    Route::post('/request', [FrontendRequestController::class, 'store'])->name('services.request.store');
    Route::get('/complaint', [FrontendComplaintController::class, 'create'])->name('services.complaint');
    Route::post('/complaint', [FrontendComplaintController::class, 'store'])->name('services.complaint.store');
});

// Admin Routes
Route::middleware(['auth', 'role:admin|editor|official'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('articles', ArticleController::class, ['as' => 'admin']);
    Route::post('articles/{article}/publish', [ArticleController::class, 'publish'])->name('admin.articles.publish');
    Route::post('articles/{article}/archive', [ArticleController::class, 'archive'])->name('admin.articles.archive');

    // News routes - mapped to actualites table
    Route::resource('news', NewsController::class, ['as' => 'admin']);

    // Events routes
    Route::resource('events', EventController::class, ['as' => 'admin']);
    Route::get('events/{event}/registrations', [EventController::class, 'registrations'])->name('admin.events.registrations');

    // Galleries routes
    Route::resource('galleries', GalleryController::class, ['as' => 'admin']);
    Route::post('galleries/{gallery}/images', [GalleryController::class, 'addImage'])->name('admin.galleries.addImage');
    Route::delete('gallery-images/{image}', [GalleryController::class, 'removeImage'])->name('admin.galleries.removeImage');

    // Requests routes
    Route::prefix('requests')->group(function () {
        Route::get('/', [RequestController::class, 'index'])->name('admin.requests.index');
        Route::get('/{request}', [RequestController::class, 'show'])->name('admin.requests.show');
        Route::post('/{request}/assign', [RequestController::class, 'assign'])->name('admin.requests.assign');
        Route::post('/{request}/status', [RequestController::class, 'updateStatus'])->name('admin.requests.updateStatus');
        Route::post('/{request}/complete', [RequestController::class, 'complete'])->name('admin.requests.complete');
        Route::get('/statistics', [RequestController::class, 'statistics'])->name('admin.requests.statistics');
    });

    // Complaints routes
    Route::prefix('complaints')->group(function () {
        Route::get('/', [ComplaintController::class, 'index'])->name('admin.complaints.index');
        Route::get('/{complaint}', [ComplaintController::class, 'show'])->name('admin.complaints.show');
        Route::post('/{complaint}/assign', [ComplaintController::class, 'assign'])->name('admin.complaints.assign');
        Route::post('/{complaint}/respond', [ComplaintController::class, 'respond'])->name('admin.complaints.respond');
        Route::post('/{complaint}/close', [ComplaintController::class, 'close'])->name('admin.complaints.close');
        Route::get('/statistics', [ComplaintController::class, 'statistics'])->name('admin.complaints.statistics');
    });

    // Settings routes
    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
    Route::patch('/settings/commune-info', [App\Http\Controllers\Admin\SettingsController::class, 'updateCommuneInfo'])->name('admin.settings.update-commune-info');
    Route::patch('/settings/working-hours', [App\Http\Controllers\Admin\SettingsController::class, 'updateWorkingHours'])->name('admin.settings.update-working-hours');
    Route::patch('/settings/service-toggles', [App\Http\Controllers\Admin\SettingsController::class, 'updateServiceToggles'])->name('admin.settings.update-service-toggles');
    Route::post('/settings/run-backup', [App\Http\Controllers\Admin\SettingsController::class, 'runBackup'])->name('admin.settings.run-backup');
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::post('events/{event}/register', [PublicEventController::class, 'register'])->name('events.register');
    Route::delete('event-registrations/{registration}', [PublicEventController::class, 'cancelRegistration'])->name('events.cancelRegistration');
});

// Citizen Routes
Route::middleware(['web', 'auth', 'role:citizen'])->prefix('espace-citoyen')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Citizen\DashboardController::class, 'index'])->name('citizen.dashboard');
    Route::get('/requests', [App\Http\Controllers\Citizen\RequestController::class, 'index'])->name('citizen.requests.index');
    Route::get('/requests/{request}', [App\Http\Controllers\Citizen\RequestController::class, 'show'])->name('citizen.requests.show');
    Route::get('/complaints', [App\Http\Controllers\Citizen\ComplaintController::class, 'index'])->name('citizen.complaints.index');
    Route::get('/complaints/{complaint}', [App\Http\Controllers\Citizen\ComplaintController::class, 'show'])->name('citizen.complaints.show');
});

require __DIR__.'/auth.php';
