<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        // Mock data for transactions
        $transactions = [
            [
                'id' => 'TRX-001',
                'loan_number' => 'LN-2024-001',
                'customer_name' => 'John Doe',
                'type' => 'loan',
                'amount' => 15000000,
                'status' => 'completed',
                'created_at' => '2024-03-20 10:00:00'
            ],
            [
                'id' => 'TRX-002',
                'loan_number' => 'LN-2024-002',
                'customer_name' => 'Jane Smith',
                'type' => 'payment',
                'amount' => 5000000,
                'status' => 'pending',
                'created_at' => '2024-03-19 14:30:00'
            ],
            [
                'id' => 'TRX-003',
                'loan_number' => 'LN-2024-003',
                'customer_name' => 'Ahmad Rizki',
                'type' => 'loan',
                'amount' => 10000000,
                'status' => 'completed',
                'created_at' => '2024-03-18 09:15:00'
            ],
            [
                'id' => 'TRX-004',
                'loan_number' => 'LN-2024-004',
                'customer_name' => 'Siti Rahma',
                'type' => 'payment',
                'amount' => 7500000,
                'status' => 'completed',
                'created_at' => '2024-03-17 16:45:00'
            ],
            [
                'id' => 'TRX-005',
                'loan_number' => 'LN-2024-005',
                'customer_name' => 'Budi Santoso',
                'type' => 'loan',
                'amount' => 20000000,
                'status' => 'pending',
                'created_at' => '2024-03-16 11:20:00'
            ]
        ];

        return view('admin.transactions.index', compact('transactions'));
    }
} 