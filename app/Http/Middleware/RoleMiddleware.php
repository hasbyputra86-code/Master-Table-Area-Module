<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Check user role
        if (auth()->user()->role !== $role) {
            abort(403, 'Access denied. You do not have permission.');
        }

        return $next($request);
    }
}