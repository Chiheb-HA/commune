<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Official;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display the organization chart page (Organigramme).
     * Combines departments and officials into a comprehensive org chart view.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $departmentsQuery = Department::active()
            ->with(['head', 'officials' => function ($query) {
                $query->active()->with('user');
            }])
            ->orderBy('order', 'asc')
            ->orderBy('name_fr', 'asc');

        if ($search) {
            $departmentsQuery->where(function ($q) use ($search) {
                $q->where('name_fr', 'like', "%{$search}%")
                    ->orWhere('name_en', 'like', "%{$search}%")
                    ->orWhere('name_ar', 'like', "%{$search}%")
                    ->orWhere('description_fr', 'like', "%{$search}%")
                    ->orWhere('description_en', 'like', "%{$search}%")
                    ->orWhere('description_ar', 'like', "%{$search}%")
                    ->orWhere('responsibilities_fr', 'like', "%{$search}%")
                    ->orWhere('responsibilities_en', 'like', "%{$search}%")
                    ->orWhere('responsibilities_ar', 'like', "%{$search}%");
            });
        }

        $departments = $departmentsQuery->get();

        return view('public.departments.index', compact('departments', 'search'));
    }

    /**
     * Display a single department's detail page with all officials.
     */
    public function show($slug)
    {
        $department = Department::active()
            ->where('slug', $slug)
            ->with(['head', 'officials' => function ($query) {
                $query->active()->with('user')->orderBy('created_at', 'desc');
            }, 'openingHours'])
            ->firstOrFail();

        return view('public.departments.show', compact('department'));
    }
}
