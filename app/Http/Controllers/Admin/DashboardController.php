<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Mock data for dashboard statistics
        $stats = [
            'total_customers' => 100,
            'active_loans' => 45,
            'total_loan_amount' => 750000000,
            'pending_payments' => 15
        ];

        // Mock data for recent loans
        $recent_loans = [
            [
                'loan_number' => 'LN-2024-001',
                'customer_name' => 'John Doe',
                'amount' => 15000000,
                'status' => 'active',
                'created_at' => '2024-03-20'
            ],
            [
                'loan_number' => 'LN-2024-002',
                'customer_name' => 'Jane Smith',
                'amount' => 25000000,
                'status' => 'pending',
                'created_at' => '2024-03-19'
            ],
            [
                'loan_number' => 'LN-2024-003',
                'customer_name' => 'Ahmad Rizki',
                'amount' => 10000000,
                'status' => 'active',
                'created_at' => '2024-03-18'
            ],
            [
                'loan_number' => 'LN-2024-004',
                'customer_name' => 'Siti Rahma',
                'amount' => 30000000,
                'status' => 'active',
                'created_at' => '2024-03-17'
            ],
            [
                'loan_number' => 'LN-2024-005',
                'customer_name' => 'Budi Santoso',
                'amount' => 20000000,
                'status' => 'pending',
                'created_at' => '2024-03-16'
            ]
        ];

        return view('admin.dashboard', compact('stats', 'recent_loans'));
    }
} 