<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    /**
     * Show the login form
     */
    public function create()
    {
        return view('auth.customer.login');
    }

    /**
     * Handle the login request
     */
    public function store(Request $request)
    {
        // For prototype, just set session and redirect
        session([
            'auth.role' => 'customer',
            'auth.name' => 'John Doe',
            'auth.email' => $request->email ?? 'customer@example.com'
        ]);

        return redirect()->route('customer.dashboard');
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