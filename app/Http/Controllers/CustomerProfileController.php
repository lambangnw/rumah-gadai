<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerProfileController extends Controller
{
    /**
     * Display the customer's profile.
     */
    public function index()
    {
        // For prototype, using static data
        $customer = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '081234567890',
            'id_number' => '3271046504870002',
            'address' => 'Jl. Contoh No. 123, Kota Contoh',
            'role' => 'customer'
        ];

        return view('customer.profile', compact('customer'));
    }

    /**
     * Show the form for editing the customer's profile.
     */
    public function edit()
    {
        // For prototype, using static data
        $customer = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '081234567890',
            'id_number' => '3271046504870002',
            'address' => 'Jl. Contoh No. 123, Kota Contoh'
        ];

        return view('customer.profile.edit', compact('customer'));
    }

    /**
     * Update the customer's profile.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500'
        ]);

        // For prototype, just redirect back with success message
        return redirect()
            ->route('customer.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }
} 