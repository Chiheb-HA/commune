<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CitizenSessionController extends Controller
{
    /**
     * Display the citizen login view.
     */
    public function create(): View
    {
        return view('auth.citizen-login');
    }

    /**
     * Handle an incoming citizen authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();
    $request->session()->forget('url.intended'); // clear any stored intended URL

    $user = auth()->user();

    if (!$user->hasRole('citizen')) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('citizen.login')
            ->with('error', __('messages.citizen_only_login'));
    }

    return redirect('/'); // redirect citizen to homepage
}

    /**
     * Destroy an authenticated citizen session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
