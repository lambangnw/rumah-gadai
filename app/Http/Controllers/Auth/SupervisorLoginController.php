<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupervisorLoginController extends Controller
{
    /**
     * Show the login form
     */
    public function create()
    {
        return view('auth.supervisor.login');
    }

    /**
     * Handle the login request
     */
    public function store(Request $request)
    {
        // For prototype, just set session and redirect
        session([
            'auth.role' => 'supervisor',
            'auth.name' => 'Supervisor User',
            'auth.email' => $request->email ?? 'supervisor@example.com'
        ]);

        return redirect()->route('supervisor.dashboard');
    }

    /**
     * Handle the logout request
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