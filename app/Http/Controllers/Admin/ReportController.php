<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display the reports page.
     */
    public function index()
    {
        // Mock data for monthly statistics
        $monthly_stats = [
            'total_loans' => 45,
            'total_loan_amount' => 750000000,
            'total_payments' => 30,
            'total_payment_amount' => 250000000,
            'new_customers' => 15
        ];

        // Mock data for daily transactions
        $daily_transactions = [
            [
                'date' => '2024-03-20',
                'loans' => 5,
                'loan_amount' => 75000000,
                'payments' => 3,
                'payment_amount' => 25000000
            ],
            [
                'date' => '2024-03-19',
                'loans' => 4,
                'loan_amount' => 60000000,
                'payments' => 4,
                'payment_amount' => 30000000
            ],
            [
                'date' => '2024-03-18',
                'loans' => 6,
                'loan_amount' => 90000000,
                'payments' => 5,
                'payment_amount' => 35000000
            ],
            [
                'date' => '2024-03-17',
                'loans' => 3,
                'loan_amount' => 45000000,
                'payments' => 2,
                'payment_amount' => 15000000
            ],
            [
                'date' => '2024-03-16',
                'loans' => 4,
                'loan_amount' => 70000000,
                'payments' => 3,
                'payment_amount' => 20000000
            ]
        ];

        return view('admin.reports.index', compact('monthly_stats', 'daily_transactions'));
    }
} 