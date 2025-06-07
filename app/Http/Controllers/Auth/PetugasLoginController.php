<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasLoginController extends Controller
{
    /**
     * Show the login form
     */
    public function create()
    {
        return view('auth.petugas.login');
    }

    /**
     * Handle the login request
     */
    public function store(Request $request)
    {
        // For prototype, just set session and redirect
        session([
            'auth.role' => 'petugas',
            'auth.name' => 'Petugas User',
            'auth.email' => $request->email ?? 'petugas@example.com'
        ]);

        return redirect()->route('petugas.dashboard');
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