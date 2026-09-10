<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Event;
use App\Models\MunicipalService;
use App\Models\News;

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

    public function xml()
    {
        $urls = collect([
            'home', 'articles.index', 'news.index', 'events.index', 'galleries.index',
            'services.index', 'services.request', 'services.complaint', 'services.contact',
            'departments.index', 'officials.index', 'emergency-contacts.index', 'sitemap.index',
            'associations.index', 'council-sessions.index', 'budget.index', 'taxes.index',
            'request-tracking.index', 'permit-consultation.index', 'legal.privacy', 'legal.terms',
            'legal.notice', 'legal.pau', 'legal.legislation', 'legal.competences',
            'legal.administration', 'legal.environment', 'legal.regulations', 'legal.useful-links',
            'faqs.index', 'partnerships.index', 'staff-resources.index', 'newsletter.index',
            'funding-sources.index', 'competitions.index', 'procurement-notices.index',
            'governance-publications.index', 'establishments.index', 'downloadable-forms.index',
        ])->map(fn (string $routeName) => [
            'loc' => route($routeName),
            'lastmod' => now()->toAtomString(),
        ])->all();

        foreach (Article::published()->get(['slug', 'updated_at']) as $article) {
            $urls[] = ['loc' => route('articles.show', $article->slug), 'lastmod' => $article->updated_at->toAtomString()];
        }

        foreach (News::published()->get(['slug', 'updated_at']) as $news) {
            $urls[] = ['loc' => route('news.show', $news->slug), 'lastmod' => $news->updated_at->toAtomString()];
        }

        foreach (Event::published()->get(['slug', 'updated_at']) as $event) {
            $urls[] = ['loc' => route('events.show', $event->slug), 'lastmod' => $event->updated_at->toAtomString()];
        }

        foreach (MunicipalService::active()->get(['slug', 'updated_at']) as $service) {
            $urls[] = ['loc' => route('services.show', $service->slug), 'lastmod' => $service->updated_at->toAtomString()];
        }

        return response()->view('public.sitemap.xml', compact('urls'))
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}