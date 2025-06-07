<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // For prototype, just check session role
        if (session('auth.role') !== $role) {
            if ($role === 'customer') {
                return redirect()->route('customer.login');
            } else {
                return redirect()->route('admin.login');
            }
        }

        return $next($request);
    }
} 