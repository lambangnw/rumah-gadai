<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in as customer
        if (!session()->has('auth.role') || session('auth.role') !== 'customer') {
            return redirect()->route('customer.login');
        }

        return $next($request);
    }
} 