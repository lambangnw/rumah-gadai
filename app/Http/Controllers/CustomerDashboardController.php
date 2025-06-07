<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Static data for prototype
        $stats = [
            'total_items' => 5,
            'active_items' => 3,
            'redeemed_items' => 2,
            'active_loan_amount' => 12500000,
            'nearest_due_date' => '2024-04-20',
            'active_loans_count' => 3,
            'total_loan_amount' => 25000000,
            'total_transactions' => 5,
            'total_redeemed' => 2
        ];

        $recent_loans = [
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

        // Get filter dates from request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        return view('customer.dashboard', [
            'name' => session('auth.name'),
            'email' => session('auth.email'),
            'stats' => $stats,
            'recent_loans' => $recent_loans,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }
} 