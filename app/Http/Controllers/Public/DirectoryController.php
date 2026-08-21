<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Official;

class DirectoryController extends Controller
{
    public function index()
    {
        $departments = Department::active()
            ->with(['head', 'officials' => function ($query) {
                $query->active();
            }])
            ->orderBy('order')
            ->get();

        return view('public.directory.index', compact('departments'));
    }

    public function show(Department $department)
    {
        $department->load(['head', 'officials' => function ($query) {
            $query->active();
        }, 'openingHours']);

        return view('public.directory.show', compact('department'));
    }
}