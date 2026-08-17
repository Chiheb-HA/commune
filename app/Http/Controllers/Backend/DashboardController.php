<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Reclamation;
use App\Models\DemandeAcces;
use App\Models\Evenement;
use App\Models\Citoyen;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        // Get statistics
        $totalNews = Actualite::count();
        $totalEvents = Evenement::count();
        $totalComplaints = Reclamation::count();
        $pendingComplaints = Reclamation::open()->count();
        $totalAccessRequests = DemandeAcces::count();
        $pendingAccessRequests = DemandeAcces::pending()->count();
        $totalCitizens = Citoyen::count();

        // Get recent items
        $recentNews = Actualite::latest()->take(5)->get();
        $recentComplaints = Reclamation::latest()->take(5)->get();
        $pendingRequests = DemandeAcces::pending()->latest()->take(5)->get();

        return view('backend.dashboard', compact(
            'totalNews',
            'totalEvents',
            'totalComplaints',
            'pendingComplaints',
            'totalAccessRequests',
            'pendingAccessRequests',
            'totalCitizens',
            'recentNews',
            'recentComplaints',
            'pendingRequests'
        ));
    }

    /**
     * Display profile page
     */
    public function profile()
    {
        $user = Auth::user();

        return view('backend.profile', compact('user'));
    }

    /**
     * Update profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->cin,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                \Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validated);

        return redirect()->back()->with('success', __('messages.profile_updated'));
    }
}
