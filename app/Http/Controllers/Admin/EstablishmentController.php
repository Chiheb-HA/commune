<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    private function rules(): array
    {
        return [
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function index()
    {
        $establishments = Establishment::orderBy('order')->orderBy('name_fr')->paginate(20);
        return view('admin.establishments.index', compact('establishments'));
    }

    public function create()
    {
        return view('admin.establishments.form', ['establishment' => new Establishment()]);
    }

    public function store(Request $request)
    {
        Establishment::create($request->validate($this->rules()));
        return redirect()->route('admin.establishments.index')->with('success', 'Establishment created successfully');
    }

    public function edit(Establishment $establishment)
    {
        return view('admin.establishments.form', compact('establishment'));
    }

    public function update(Request $request, Establishment $establishment)
    {
        $establishment->update($request->validate($this->rules()));
        return redirect()->route('admin.establishments.index')->with('success', 'Establishment updated successfully');
    }

    public function destroy(Establishment $establishment)
    {
        $establishment->delete();
        return redirect()->route('admin.establishments.index')->with('success', 'Establishment deleted successfully');
    }
}
