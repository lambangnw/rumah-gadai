<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        // Mock data for customers
        $customers = [
            [
                'id' => '001',
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Sudirman No. 123, Jakarta Pusat',
                'status' => 'active',
                'total_loans' => 15000000,
            ],
            [
                'id' => '002',
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '081234567891',
                'address' => 'Jl. Thamrin No. 456, Jakarta Pusat',
                'status' => 'active',
                'total_loans' => 25000000,
            ],
            [
                'id' => '003',
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad.rizki@example.com',
                'phone' => '081234567892',
                'address' => 'Jl. Gatot Subroto No. 789, Jakarta Selatan',
                'status' => 'inactive',
                'total_loans' => 10000000,
            ],
            [
                'id' => '004',
                'name' => 'Siti Rahma',
                'email' => 'siti.rahma@example.com',
                'phone' => '081234567893',
                'address' => 'Jl. Asia Afrika No. 321, Bandung',
                'status' => 'active',
                'total_loans' => 30000000,
            ],
            [
                'id' => '005',
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone' => '081234567894',
                'address' => 'Jl. Malioboro No. 654, Yogyakarta',
                'status' => 'active',
                'total_loans' => 20000000,
            ],
        ];

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        // Store customer logic here
        // ...

        return redirect()->route('admin.customers.index')
            ->with('success', 'Nasabah berhasil ditambahkan');
    }

    /**
     * Display the specified customer.
     */
    public function show($id)
    {
        // Get customer details logic here
        // ...

        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit($id)
    {
        // Get customer for editing logic here
        // ...

        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,'.$id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        // Update customer logic here
        // ...

        return redirect()->route('admin.customers.index')
            ->with('success', 'Data nasabah berhasil diperbarui');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy($id)
    {
        // Delete customer logic here
        // ...

        return redirect()->route('admin.customers.index')
            ->with('success', 'Nasabah berhasil dihapus');
    }
} 