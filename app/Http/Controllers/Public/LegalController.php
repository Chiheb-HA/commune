<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class LegalController extends Controller
{
    public function privacy()
    {
        $content = Setting::get('legal_privacy_' . app()->getLocale());
        
        return view('public.legal.page', [
            'title' => __('messages.privacy_policy'),
            'content' => $content,
        ]);
    }

    public function terms()
    {
        $content = Setting::get('legal_terms_' . app()->getLocale());
        
        return view('public.legal.page', [
            'title' => __('messages.terms_of_service'),
            'content' => $content,
        ]);
    }

    public function notice()
    {
        $content = Setting::get('legal_notice_' . app()->getLocale());
        
        return view('public.legal.page', [
            'title' => __('messages.Legal Notice'),
            'content' => $content,
        ]);
    }

    public function pau()
    {
        $content = Setting::get('legal_pau_' . app()->getLocale());
        
        return view('public.legal.page', [
            'title' => __('messages.general_regulations_pau'),
            'content' => $content,
        ]);
    }

    public function legislation()
    {
        $content = Setting::get('legal_legislation_' . app()->getLocale()) ?? __('messages.legislation_placeholder');

        return view('public.legal.legislation', ['title' => __('messages.legislation'), 'content' => $content]);
    }

    public function competences()
    {
        $content = Setting::get('legal_competences_' . app()->getLocale()) ?? __('messages.competences_placeholder');

        return view('public.legal.competences', ['title' => __('messages.competences'), 'content' => $content]);
    }

    public function administration()
    {
        $content = Setting::get('legal_administration_' . app()->getLocale()) ?? __('messages.administration_placeholder');

        return view('public.legal.administration', ['title' => __('messages.administration'), 'content' => $content]);
    }

    public function environment()
    {
        $content = Setting::get('legal_environment_' . app()->getLocale()) ?? __('messages.environment_placeholder');

        return view('public.legal.environment', ['title' => __('messages.environment'), 'content' => $content]);
    }

    public function regulations()
    {
        $content = Setting::get('legal_regulations_' . app()->getLocale()) ?? __('messages.regulations_placeholder');

        return view('public.legal.regulations', ['title' => __('messages.regulations'), 'content' => $content]);
    }
}
