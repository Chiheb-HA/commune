<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DownloadableForm;

class DownloadableFormController extends Controller
{
    public function index()
    {
        $forms = DownloadableForm::active()->orderBy('order')->orderBy('title_fr')->get();
        return view('public.downloadable-forms.index', compact('forms'));
    }
}
