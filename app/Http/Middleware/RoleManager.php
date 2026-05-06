<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ADD THIS IMPORT
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     */
   public function handle(Request $request, Closure $next, string ...$roles): Response
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $userRole = Auth::user()->role;

    if (in_array($userRole, $roles)) {
        return $next($request);
    }

    // Redirect to dashboard with error message
    return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
}
}