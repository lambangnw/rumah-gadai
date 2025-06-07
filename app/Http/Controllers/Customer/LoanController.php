<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return view('customer.loans');
    }

    public function create()
    {
        return view('customer.apply-loan');
    }

    public function store(Request $request)
    {
        // For prototype, just redirect back with success message
        return redirect()->route('customer.loans')
            ->with('success', 'Pengajuan pinjaman berhasil dikirim!');
    }
} 