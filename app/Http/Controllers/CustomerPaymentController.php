<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPaymentController extends Controller
{
    public function index()
    {
        // Static data for prototype
        $payments = [
            [
                'id' => 'PAY001',
                'loan_id' => '12345',
                'amount' => 500000,
                'payment_date' => '2024-03-15',
                'payment_method' => 'transfer',
                'status' => 'success',
                'description' => 'Pembayaran Cicilan #1'
            ],
            [
                'id' => 'PAY002',
                'loan_id' => '12345',
                'amount' => 500000,
                'payment_date' => '2024-03-01',
                'payment_method' => 'cash',
                'status' => 'success',
                'description' => 'Pembayaran Cicilan #2'
            ]
        ];

        return view('customer.payments.index', [
            'payments' => $payments,
            'name' => session('auth.name'),
            'email' => session('auth.email')
        ]);
    }
} 