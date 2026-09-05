<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $sections = [
            __('messages.home') => [
                ['home', __('messages.home')],
            ],
            __('messages.articles') => [
                ['articles.index', __('messages.articles')],
            ],
            __('messages.news') => [
                ['news.index', __('messages.news')],
            ],
            __('messages.events') => [
                ['events.index', __('messages.events')],
            ],
            __('messages.Galleries') => [
                ['galleries.index', __('messages.Galleries')],
            ],
            __('messages.services') => [
                ['services.index', __('messages.municipal_services')],
                ['services.request', __('messages.submit_request')],
                ['services.complaint', __('messages.file_complaint')],
                ['services.contact', __('messages.contact')],
            ],
            __('messages.directory_title') => [
                ['departments.index', __('messages.departments')],
                ['officials.index', __('messages.officials')],
                ['emergency-contacts.index', __('messages.emergency_contacts')],
            ],
            __('messages.taxes') => [
                ['taxes.index', __('messages.taxes')],
            ],
            __('messages.request_tracking') => [
                ['request-tracking.index', __('messages.request_tracking')],
            ],
            __('messages.legal') => [
                ['legal.privacy', __('messages.privacy_policy')],
                ['legal.terms', __('messages.terms_of_service')],
                ['legal.notice', __('messages.Legal Notice')],
            ],
        ];

        return view('public.sitemap.index', compact('sections'));
    }
}