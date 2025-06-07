<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Dummy data nasabah
        $customers = [
            [
                'id' => 1,
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'phone' => '081234567890',
                'status' => 'active',
                'registered_at' => '2024-01-10',
            ],
            [
                'id' => 2,
                'name' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'phone' => '081298765432',
                'status' => 'inactive',
                'registered_at' => '2023-12-22',
            ],
            [
                'id' => 3,
                'name' => 'Andi Wijaya',
                'email' => 'andi@example.com',
                'phone' => '081377788899',
                'status' => 'active',
                'registered_at' => '2024-02-01',
            ],
            [
                'id' => 4,
                'name' => 'Rina Marlina',
                'email' => 'rina@example.com',
                'phone' => '081355512345',
                'status' => 'active',
                'registered_at' => '2024-03-05',
            ],
            [
                'id' => 5,
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'phone' => '081222233344',
                'status' => 'inactive',
                'registered_at' => '2023-11-15',
            ],
            [
                'id' => 6,
                'name' => 'Agus Pratama',
                'email' => 'agus@example.com',
                'phone' => '081399988877',
                'status' => 'active',
                'registered_at' => '2024-01-25',
            ],
            [
                'id' => 7,
                'name' => 'Linda Sari',
                'email' => 'linda@example.com',
                'phone' => '081344455566',
                'status' => 'active',
                'registered_at' => '2024-02-18',
            ],
            [
                'id' => 8,
                'name' => 'Fajar Nugroho',
                'email' => 'fajar@example.com',
                'phone' => '081366677788',
                'status' => 'inactive',
                'registered_at' => '2023-10-30',
            ],
            [
                'id' => 9,
                'name' => 'Slamet Riyadi',
                'email' => 'slamet@example.com',
                'phone' => '081377799900',
                'status' => 'active',
                'registered_at' => '2024-03-10',
            ],
            [
                'id' => 10,
                'name' => 'Yuni Astuti',
                'email' => 'yuni@example.com',
                'phone' => '081388899911',
                'status' => 'active',
                'registered_at' => '2024-03-12',
            ],
        ];
        return view('supervisor.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('supervisor.customers.create');
    }
} 