<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Check if user has admin role using Spatie's Permission package
        if (auth()->user()->hasRole('admin')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
