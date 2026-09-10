<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = NewsletterSubscriber::orderBy('subscribed_at', 'desc')
            ->paginate(20);

        return view('admin.newsletter.index', compact('subscribers'));
    }
}
