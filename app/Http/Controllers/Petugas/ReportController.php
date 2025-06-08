<?php

namespace App\Http\Controllers\Petugas;

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
            'total_loans' => 25,
            'total_loan_amount' => 400000000,
            'total_payments' => 18,
            'total_payment_amount' => 150000000,
            'new_customers' => 8
        ];

        // Mock data for daily transactions
        $daily_transactions = [
            [
                'date' => '2024-03-20',
                'loans' => 3,
                'loan_amount' => 45000000,
                'payments' => 2,
                'payment_amount' => 15000000
            ],
            [
                'date' => '2024-03-19',
                'loans' => 2,
                'loan_amount' => 30000000,
                'payments' => 3,
                'payment_amount' => 20000000
            ],
            [
                'date' => '2024-03-18',
                'loans' => 4,
                'loan_amount' => 60000000,
                'payments' => 2,
                'payment_amount' => 18000000
            ],
            [
                'date' => '2024-03-17',
                'loans' => 2,
                'loan_amount' => 25000000,
                'payments' => 3,
                'payment_amount' => 22000000
            ],
            [
                'date' => '2024-03-16',
                'loans' => 3,
                'loan_amount' => 50000000,
                'payments' => 2,
                'payment_amount' => 12000000
            ]
        ];

        return view('petugas.reports.index', compact('monthly_stats', 'daily_transactions'));
    }
}