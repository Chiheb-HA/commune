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

    public function export()
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['email', 'is_confirmed', 'subscribed_at']);

            NewsletterSubscriber::orderBy('subscribed_at', 'desc')
                ->each(fn ($subscriber) => fputcsv($handle, [
                    $subscriber->email,
                    $subscriber->is_confirmed ? '1' : '0',
                    optional($subscriber->subscribed_at)->toDateTimeString(),
                ]));

            fclose($handle);
        }, 'newsletter-subscribers.csv', ['Content-Type' => 'text/csv']);
    }
}
