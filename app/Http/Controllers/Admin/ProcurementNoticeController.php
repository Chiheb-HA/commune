<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcurementNotice;
use Illuminate\Http\Request;

class ProcurementNoticeController extends Controller
{
    private function rules(): array
    {
        return [
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'type' => 'required|in:pam,appel_offres,resultat_designation',
            'reference_number' => 'nullable|string|max:255',
            'publication_date' => 'required|date',
            'deadline_date' => 'nullable|date|after_or_equal:publication_date',
            'attachment_path' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function index()
    {
        $notices = ProcurementNotice::orderByDesc('publication_date')->orderBy('order')->paginate(20);
        return view('admin.procurement-notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.procurement-notices.form', ['procurementNotice' => new ProcurementNotice()]);
    }

    public function store(Request $request)
    {
        ProcurementNotice::create($request->validate($this->rules()));
        return redirect()->route('admin.procurement-notices.index')->with('success', 'Procurement notice created successfully');
    }

    public function edit(ProcurementNotice $procurementNotice)
    {
        return view('admin.procurement-notices.form', compact('procurementNotice'));
    }

    public function update(Request $request, ProcurementNotice $procurementNotice)
    {
        $procurementNotice->update($request->validate($this->rules()));
        return redirect()->route('admin.procurement-notices.index')->with('success', 'Procurement notice updated successfully');
    }

    public function destroy(ProcurementNotice $procurementNotice)
    {
        $procurementNotice->delete();
        return redirect()->route('admin.procurement-notices.index')->with('success', 'Procurement notice deleted successfully');
    }
}
