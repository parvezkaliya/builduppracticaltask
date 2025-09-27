<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$userRoles): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('login');
        }

        if (in_array($user->role, $userRoles)) {
            return $next($request);
        }

        // Optional: change this to return a view instead of JSON
        return response()->json(['error' => 'You do not have permission to access this page.'], 403);
    }
}
