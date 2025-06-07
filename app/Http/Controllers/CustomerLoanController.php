<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerLoanController extends Controller
{
    /**
     * Display a listing of the loans.
     */
    public function index()
    {
        // Static data for prototype
        $loans = [
            [
                'id' => '12345',
                'item_type' => 'gold',
                'specifications' => [
                    'weight' => '5',
                    'carat' => '70'
                ],
                'estimated_value' => 5000000,
                'loan_amount' => 4500000,
                'created_at' => '2024-03-01',
                'due_date' => '2024-04-20',
                'status' => 'active'
            ],
            [
                'id' => '12346',
                'item_type' => 'electronics',
                'specifications' => [
                    'brand' => 'ASUS',
                    'model' => 'ROG Strix',
                    'year' => '2023'
                ],
                'estimated_value' => 7500000,
                'loan_amount' => 6750000,
                'created_at' => '2024-03-15',
                'status' => 'pending'
            ]
        ];

        return view('customer.loans', compact('loans'));
    }

    /**
     * Show the form for creating a new loan.
     */
    public function create()
    {
        return view('customer.apply-loan');
    }

    /**
     * Store a newly created loan in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_type' => 'required|in:gold,electronics,vehicle',
            'estimated_value' => 'required|numeric|min:0',
            'loan_amount' => 'required|numeric|min:0|lte:estimated_value',
            'loan_term' => 'required|in:30,60,90,120',
            
            // Gold specifications
            'gold_weight' => 'required_if:item_type,gold|numeric|min:0',
            'gold_carat' => 'required_if:item_type,gold|numeric|min:0|max:100',
            
            // Electronics specifications
            'electronics_brand' => 'required_if:item_type,electronics|string|max:255',
            'electronics_model' => 'required_if:item_type,electronics|string|max:255',
            'electronics_year' => 'required_if:item_type,electronics|numeric|min:1900|max:' . (date('Y') + 1),
            
            // Vehicle specifications
            'vehicle_brand' => 'required_if:item_type,vehicle|string|max:255',
            'vehicle_model' => 'required_if:item_type,vehicle|string|max:255',
            'vehicle_year' => 'required_if:item_type,vehicle|numeric|min:1900|max:' . (date('Y') + 1),
            'vehicle_license' => 'required_if:item_type,vehicle|string|max:20',
        ]);

        // Validate loan amount is maximum 90% of estimated value
        if ($validated['loan_amount'] > ($validated['estimated_value'] * 0.9)) {
            return back()
                ->withInput()
                ->withErrors(['loan_amount' => 'Jumlah pinjaman maksimal 90% dari nilai taksiran']);
        }

        // For prototype, just redirect with success message
        return redirect()
            ->route('customer.loans')
            ->with('success', 'Pengajuan gadai berhasil dikirim dan sedang menunggu verifikasi.');
    }
} 