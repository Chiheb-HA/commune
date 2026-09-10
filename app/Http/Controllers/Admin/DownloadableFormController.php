<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadableForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadableFormController extends Controller
{
    private function rules(bool $fileRequired = true): array
    {
        return [
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'file' => ($fileRequired ? 'required' : 'nullable') . '|file|max:10240',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function index()
    {
        $forms = DownloadableForm::orderBy('order')->orderBy('title_fr')->paginate(20);
        return view('admin.downloadable-forms.index', compact('forms'));
    }

    public function create()
    {
        return view('admin.downloadable-forms.form', ['downloadableForm' => new DownloadableForm()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
        $validated['file_path'] = $request->file('file')->store('downloadable-forms', 'public');
        unset($validated['file']);
        DownloadableForm::create($validated);
        return redirect()->route('admin.downloadable-forms.index')->with('success', 'Form created successfully');
    }

    public function edit(DownloadableForm $downloadableForm)
    {
        return view('admin.downloadable-forms.form', compact('downloadableForm'));
    }

    public function update(Request $request, DownloadableForm $downloadableForm)
    {
        $validated = $request->validate($this->rules(false));
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($downloadableForm->file_path);
            $validated['file_path'] = $request->file('file')->store('downloadable-forms', 'public');
        }
        unset($validated['file']);
        $downloadableForm->update($validated);
        return redirect()->route('admin.downloadable-forms.index')->with('success', 'Form updated successfully');
    }

    public function destroy(DownloadableForm $downloadableForm)
    {
        Storage::disk('public')->delete($downloadableForm->file_path);
        $downloadableForm->delete();
        return redirect()->route('admin.downloadable-forms.index')->with('success', 'Form deleted successfully');
    }
}
