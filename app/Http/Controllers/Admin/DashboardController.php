<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Complaint;
use App\Models\News;
use App\Models\Event;
use App\Models\User;
use App\Models\CitizenRequest;
use App\Models\MunicipalService;
use App\Models\Department;
use App\Models\Official;
use App\Models\Association;
use App\Models\CouncilSession;
use App\Models\FundingSource;
use App\Models\Competition;
use App\Models\ProcurementNotice;
use App\Models\GovernancePublication;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_articles' => Article::count(),
            'total_news' => News::count(),
            'total_events' => Event::count(),
            'total_complaints' => Complaint::count(),
            'total_requests' => CitizenRequest::count(),
            'total_services' => MunicipalService::count(),
            'total_departments' => Department::count(),
            'total_officials' => Official::count(),
            'total_associations' => Association::count(),
            'total_council_sessions' => CouncilSession::count(),
            'total_funding_sources' => FundingSource::count(),
            'total_competitions' => Competition::count(),
            'total_procurement_notices' => ProcurementNotice::count(),
            'total_governance_publications' => GovernancePublication::count(),
            'total_newsletter_subscribers' => NewsletterSubscriber::count(),
            'active_services' => MunicipalService::where('is_active', true)->count(),
            'pending_complaints' => Complaint::where('status', 'new')->count(),
            'pending_requests' => CitizenRequest::where('status', 'pending')->count(),
        ];

        $recentArticles = Article::latest()->take(5)->get();
        $recentComplaints = Complaint::latest()->take(5)->get();
        $recentRequests = CitizenRequest::latest()->take(5)->get();
        $recentServices = MunicipalService::latest()->take(5)->get();
        $recentDepartments = Department::latest()->take(5)->get();
        $recentOfficials = Official::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'stats', 
            'recentArticles', 
            'recentComplaints', 
            'recentRequests',
            'recentServices',
            'recentDepartments',
            'recentOfficials'
        ));
    }
}
