<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::active()
            ->with('head')
            ->orderBy('order', 'asc')
            ->orderBy('name_fr', 'asc')
            ->get();

        return view('public.departments.index', compact('departments'));
    }
}
