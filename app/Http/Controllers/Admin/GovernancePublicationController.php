<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GovernancePublication;
use Illuminate\Http\Request;

class GovernancePublicationController extends Controller
{
    private function rules(): array
    {
        return [
            'title_fr' => 'required|string|max:255', 'title_en' => 'required|string|max:255', 'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string', 'description_en' => 'required|string', 'description_ar' => 'required|string',
            'type' => 'required|in:programme_participatif,consultation_publique,pai,pic,pges',
            'publication_date' => 'required|date', 'attachment_path' => 'nullable|string|max:255',
            'is_active' => 'boolean', 'order' => 'integer',
        ];
    }

    public function index()
    {
        $publications = GovernancePublication::orderByDesc('publication_date')->orderBy('order')->paginate(20);
        return view('admin.governance-publications.index', compact('publications'));
    }

    public function create()
    {
        return view('admin.governance-publications.form', ['governancePublication' => new GovernancePublication()]);
    }

    public function store(Request $request)
    {
        GovernancePublication::create($request->validate($this->rules()));
        return redirect()->route('admin.governance-publications.index')->with('success', 'Governance publication created successfully');
    }

    public function edit(GovernancePublication $governancePublication)
    {
        return view('admin.governance-publications.form', compact('governancePublication'));
    }

    public function update(Request $request, GovernancePublication $governancePublication)
    {
        $governancePublication->update($request->validate($this->rules()));
        return redirect()->route('admin.governance-publications.index')->with('success', 'Governance publication updated successfully');
    }

    public function destroy(GovernancePublication $governancePublication)
    {
        $governancePublication->delete();
        return redirect()->route('admin.governance-publications.index')->with('success', 'Governance publication deleted successfully');
    }
}
