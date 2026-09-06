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
}
