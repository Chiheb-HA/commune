<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display contact form
     */
    public function create()
    {
        return view('frontend.services.contact-create');
    }

    /**
     * Store a newly created contact message
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        Contact::create([
            'name' => $validated['name'],
            'service_fr' => $validated['subject'],
            'service_en' => $validated['subject'],
            'service_ar' => $validated['subject'],
            'description_fr' => $validated['message'],
            'description_en' => $validated['message'],
            'description_ar' => $validated['message'],
            'email' => $validated['email'],
            'status' => 'PUBLISHED',
            'slug' => str()->slug($validated['subject']) . '-' . time(),
        ]);

        return redirect()->route('home')
            ->with('success', __('messages.message_sent_successfully'));
    }
}
