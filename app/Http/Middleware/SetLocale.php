<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale') ?? config('app.locale', 'fr');

        if (in_array($locale, config('app.supported_locales', ['fr', 'en', 'ar']))) {
            app()->setLocale($locale);
            config(['app.locale' => $locale]);
            session()->put('locale', $locale);
        }

        return $next($request);
    }
}
