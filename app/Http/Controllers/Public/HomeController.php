<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\MunicipalService;
use App\Models\Department;
use App\Models\Official;
use App\Models\CouncilSession;
use App\Models\Association;
use App\Models\CitizenRequest;
use App\Models\Complaint;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentArticles = Article::whereIn('status', ['PUBLISHED', 'published'])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        $recentNews = News::where('status', 'published')
            ->latest()
            ->limit(6)
            ->get();
        
        $upcomingEvents = Event::where('status', 'published')
            ->where('start_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->limit(4)
            ->get();

        $espaceCitoyenStats = [
            'total_services' => MunicipalService::where('is_active', true)->count(),
            'total_requests_month' => CitizenRequest::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count(),
            'total_complaints_month' => Complaint::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count(),
        ];

        return view('public.home', compact(
            'recentArticles',
            'recentNews',
            'upcomingEvents',
            'espaceCitoyenStats'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $articles = Article::whereIn('status', ['PUBLISHED', 'published'])
            ->where(function ($q) use ($query) {
                $locale = app()->getLocale();
                $titleField = $locale === 'en' ? 'title_en' : ($locale === 'ar' ? 'title_ar' : "titre_{$locale}");
                $contentField = $locale === 'en' ? 'content_en' : ($locale === 'ar' ? 'content_ar' : "contenu_{$locale}");
                $q->where($titleField, 'like', "%{$query}%")
                  ->orWhere($contentField, 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $news = News::where('status', 'published')
            ->where(function ($q) use ($query) {
                $locale = app()->getLocale();
                $titleField = "title_{$locale}";
                $contentField = "content_{$locale}";
                
                $q->where($titleField, 'like', "%{$query}%")
                  ->orWhere($contentField, 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(12);

        // Search Municipal Services
        $services = MunicipalService::where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name_ar', 'like', "%{$query}%")
                  ->orWhere('name_fr', 'like', "%{$query}%")
                  ->orWhere('name_en', 'like', "%{$query}%")
                  ->orWhere('description_ar', 'like', "%{$query}%")
                  ->orWhere('description_fr', 'like', "%{$query}%")
                  ->orWhere('description_en', 'like', "%{$query}%");
            })
            ->orderBy('order', 'asc')
            ->get();

        // Search Departments
        $departments = Department::active()
            ->where(function ($q) use ($query) {
                $q->where('name_ar', 'like', "%{$query}%")
                  ->orWhere('name_fr', 'like', "%{$query}%")
                  ->orWhere('name_en', 'like', "%{$query}%")
                  ->orWhere('description_ar', 'like', "%{$query}%")
                  ->orWhere('description_fr', 'like', "%{$query}%")
                  ->orWhere('description_en', 'like', "%{$query}%");
            })
            ->orderBy('order', 'asc')
            ->get();

        // Search Officials
        $officials = Official::active()
            ->with(['user', 'department'])
            ->where(function ($q) use ($query) {
                $q->where('position_ar', 'like', "%{$query}%")
                  ->orWhere('position_fr', 'like', "%{$query}%")
                  ->orWhere('position_en', 'like', "%{$query}%")
                  ->orWhereHas('user', function ($userQuery) use ($query) {
                      $userQuery->where('name', 'like', "%{$query}%");
                  });
            })
            ->get();

                // Search Council Sessions
                $councilSessions = CouncilSession::where('status', 'published')
                        ->where(function ($q) use ($query) {
                                $q->where('title_ar', 'like', "%{$query}%")
                                    ->orWhere('title_fr', 'like', "%{$query}%")
                                    ->orWhere('title_en', 'like', "%{$query}%");
                        })
                        ->latest()
                        ->get();

                // Search Associations
                $associations = Association::where(function ($q) use ($query) {
                                $q->where('name_ar', 'like', "%{$query}%")
                                    ->orWhere('name_fr', 'like', "%{$query}%")
                                    ->orWhere('name_en', 'like', "%{$query}%")
                                    ->orWhere('description_ar', 'like', "%{$query}%")
                                    ->orWhere('description_fr', 'like', "%{$query}%")
                                    ->orWhere('description_en', 'like', "%{$query}%");
                        })
                        ->get();

        // Search Events
        $events = Event::published()
            ->where(function ($q) use ($query) {
                $locale = app()->getLocale();
                $titleField = "title_{$locale}";
                $descriptionField = "description_{$locale}";
                $locationField = "location_{$locale}";
                
                $q->where($titleField, 'like', "%{$query}%")
                  ->orWhere($descriptionField, 'like', "%{$query}%")
                  ->orWhere($locationField, 'like', "%{$query}%");
            })
            ->latest()
            ->get();

                // Search Emergency Contacts
                $emergencyContacts = TelephoneDirectory::active()
                        ->where(function ($q) use ($query) {
                                $q->where('name_ar', 'like', "%{$query}%")
                                    ->orWhere('name_fr', 'like', "%{$query}%")
                                    ->orWhere('name_en', 'like', "%{$query}%")
                                    ->orWhere('phone', 'like', "%{$query}%")
                                    ->orWhere('service', 'like', "%{$query}%");
                        })
                        ->orderBy('order', 'asc')
                        ->get();

        // Search Galleries
        $galleries = Gallery::published()
            ->with('images')
            ->where(function ($q) use ($query) {
                $q->where('title_ar', 'like', "%{$query}%")
                  ->orWhere('title_fr', 'like', "%{$query}%")
                  ->orWhere('title_en', 'like', "%{$query}%")
                  ->orWhere('description_ar', 'like', "%{$query}%")
                  ->orWhere('description_fr', 'like', "%{$query}%")
                  ->orWhere('description_en', 'like', "%{$query}%");
            })
            ->latest()
            ->get();

        return view('public.search', compact('articles', 'news', 'services', 'departments', 'officials', 'councilSessions', 'associations', 'events', 'emergencyContacts', 'galleries', 'query'));
    }
}
