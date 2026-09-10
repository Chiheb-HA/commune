<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::orderBy('status')
            ->orderBy('order')
            ->paginate(20);

        return view('admin.competitions.index', compact('competitions'));
    }

    public function create()
    {
        return view('admin.competitions.form', ['competition' => new Competition()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:open,closed,upcoming',
            'attachment_path' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $validated['slug'] = \Str::slug($validated['title_fr']) . '-' . time();

        $competition = Competition::create($validated);

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition created successfully');
    }

    public function show(Competition $competition)
    {
        return redirect()->route('admin.competitions.edit', $competition);
    }

    public function edit(Competition $competition)
    {
        return view('admin.competitions.form', ['competition' => $competition]);
    }

    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:open,closed,upcoming',
            'attachment_path' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($competition->title_fr !== $validated['title_fr']) {
            $validated['slug'] = \Str::slug($validated['title_fr']) . '-' . time();
        }

        $competition->update($validated);

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition updated successfully');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition deleted successfully');
    }
}
