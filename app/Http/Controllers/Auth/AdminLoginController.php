<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    /**
     * Display the login view or redirect to dashboard.
     */
    public function create()
    {
        return view('auth.admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // For prototype, just set session and redirect
        session([
            'auth.role' => 'admin',
            'auth.name' => 'Admin User',
            'auth.email' => $request->email ?? 'admin@example.com'
        ]);
        
        return redirect()->route('admin.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        // Clear session
        $request->session()->forget([
            'auth.role',
            'auth.name',
            'auth.email'
        ]);

        return redirect('/');
    }
} 