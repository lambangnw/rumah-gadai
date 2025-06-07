<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Tampilkan daftar nasabah (dummy).
     */
    public function index()
    {
        // Dummy data, bisa diganti dengan query ke model Customer
        $customers = [
            [ 
                'id' => 1, 
                'nama' => 'Budi Santoso', 
                'nik' => '1234567890123456',
                'email' => 'budi@example.com',
                'no_hp' => '081234567890',
                'status' => 'Aktif',
                'terdaftar' => '2024-01-10'
            ],
            [ 
                'id' => 2, 
                'nama' => 'Siti Aminah', 
                'nik' => '2345678901234567',
                'email' => 'siti@example.com',
                'no_hp' => '081298765432',
                'status' => 'Tidak Aktif',
                'terdaftar' => '2023-12-22'
            ],
            [ 
                'id' => 3, 
                'nama' => 'Andi Wijaya', 
                'nik' => '3456789012345678',
                'email' => 'andi@example.com',
                'no_hp' => '081377788899',
                'status' => 'Aktif',
                'terdaftar' => '2024-02-01'
            ],
            [ 
                'id' => 4, 
                'nama' => 'Rina Marlina', 
                'nik' => '4567890123456789',
                'email' => 'rina@example.com',
                'no_hp' => '081355512345',
                'status' => 'Aktif',
                'terdaftar' => '2024-03-05'
            ],
            [ 
                'id' => 5, 
                'nama' => 'Dewi Lestari', 
                'nik' => '5678901234567890',
                'email' => 'dewi@example.com',
                'no_hp' => '081222333444',
                'status' => 'Tidak Aktif',
                'terdaftar' => '2023-11-15'
            ],
            [ 
                'id' => 6, 
                'nama' => 'Agus Pratama', 
                'nik' => '6789012345678901',
                'email' => 'agus@example.com',
                'no_hp' => '081399988877',
                'status' => 'Aktif',
                'terdaftar' => '2024-01-25'
            ],
            [ 
                'id' => 7, 
                'nama' => 'Linda Sari', 
                'nik' => '7890123456789012',
                'email' => 'linda@example.com',
                'no_hp' => '081344455566',
                'status' => 'Aktif',
                'terdaftar' => '2024-02-18'
            ],
        ];
        return view('petugas.customers.index', compact('customers'));
    }
}