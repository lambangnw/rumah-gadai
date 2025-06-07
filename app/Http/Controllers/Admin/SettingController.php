<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        // Mock data for settings
        $settings = [
            'company_name' => 'Rumah Gadai Sejahtera',
            'company_email' => 'info@rumahgadai.com',
            'company_phone' => '021-12345678',
            'company_address' => 'Jl. Raya Utama No. 123, Jakarta Pusat',
            'loan_interest_rate' => 2.5,
            'late_payment_fee' => 50000,
            'max_loan_percentage' => 80,
            'min_loan_duration' => 30,
            'max_loan_duration' => 180
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validation rules
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email',
            'company_phone' => 'required|string|max:20',
            'company_address' => 'required|string|max:500',
            'loan_interest_rate' => 'required|numeric|min:0|max:100',
            'late_payment_fee' => 'required|numeric|min:0',
            'max_loan_percentage' => 'required|numeric|min:0|max:100',
            'min_loan_duration' => 'required|numeric|min:1',
            'max_loan_duration' => 'required|numeric|min:1'
        ]);

        // Update settings logic here
        // ...

        return redirect()->route('admin.settings')
            ->with('success', 'Pengaturan berhasil diperbarui');
    }
} 