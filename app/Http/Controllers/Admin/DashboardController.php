<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Complaint;
use App\Models\News;
use App\Models\Event;
use App\Models\User;
use App\Models\CitizenRequest;
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
            'pending_complaints' => Complaint::where('status', 'new')->count(),
            'pending_requests' => CitizenRequest::where('status', 'pending')->count(),
        ];

        $recentArticles = Article::latest()->take(5)->get();
        $recentComplaints = Complaint::latest()->take(5)->get();
        $recentRequests = CitizenRequest::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'recentComplaints', 'recentRequests'));
    }
}
