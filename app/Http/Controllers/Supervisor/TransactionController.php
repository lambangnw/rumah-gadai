<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        // Data dummy transaksi
        $transactions = [
            [
                'sbg_no' => 'PUSAT-20240720-40944',
                'customer_name' => 'YANTO SURYANA PUTRA',
                'category' => 'Pinjaman Plus',
                'item_name' => 'Dokumen',
                'item_category' => 'dokumen',
                'amount' => 2000000,
                'branch_code' => 'PUSAT',
                'payment_date' => '20/07/2024',
                'status' => 'Lunas',
            ],
            [
                'sbg_no' => 'PUSAT-20240720-40945',
                'customer_name' => 'HJ. NEULIS UNINA',
                'category' => 'Pinjaman Plus',
                'item_name' => 'Dokumen',
                'item_category' => 'dokumen',
                'amount' => 2000000,
                'branch_code' => 'PUSAT',
                'payment_date' => '20/07/2024',
                'status' => 'Lunas',
            ],
            [
                'sbg_no' => 'CBG1-20240719-40946',
                'customer_name' => 'AGUS SUPRIADI',
                'category' => 'Pinjaman Emas',
                'item_name' => 'Cincin Emas',
                'item_category' => 'perhiasan',
                'amount' => 1500000,
                'branch_code' => 'CBG1',
                'payment_date' => '19/07/2024',
                'status' => 'Menunggu',
            ],
            [
                'sbg_no' => 'CBG2-20240718-40947',
                'customer_name' => 'SITI AMINAH',
                'category' => 'Pinjaman Plus',
                'item_name' => 'BPKB Motor',
                'item_category' => 'kendaraan',
                'amount' => 3500000,
                'branch_code' => 'CBG2',
                'payment_date' => '18/07/2024',
                'status' => 'Lunas',
            ],
            [
                'sbg_no' => 'PUSAT-20240717-40948',
                'customer_name' => 'ANDI WIJAYA',
                'category' => 'Pinjaman Elektronik',
                'item_name' => 'Laptop Asus',
                'item_category' => 'elektronik',
                'amount' => 5000000,
                'branch_code' => 'PUSAT',
                'payment_date' => '17/07/2024',
                'status' => 'Ditolak',
            ],
            [
                'sbg_no' => 'CBG1-20240716-40949',
                'customer_name' => 'RINA MARLINA',
                'category' => 'Pinjaman Plus',
                'item_name' => 'Dokumen',
                'item_category' => 'dokumen',
                'amount' => 2500000,
                'branch_code' => 'CBG1',
                'payment_date' => '16/07/2024',
                'status' => 'Lunas',
            ],
            [
                'sbg_no' => 'CBG2-20240715-40950',
                'customer_name' => 'DEWI LESTARI',
                'category' => 'Pinjaman Emas',
                'item_name' => 'Gelang Emas',
                'item_category' => 'perhiasan',
                'amount' => 1800000,
                'branch_code' => 'CBG2',
                'payment_date' => '15/07/2024',
                'status' => 'Menunggu',
            ],
            [
                'sbg_no' => 'PUSAT-20240714-40951',
                'customer_name' => 'AGUS PRATAMA',
                'category' => 'Pinjaman Elektronik',
                'item_name' => 'iPhone 13',
                'item_category' => 'elektronik',
                'amount' => 4000000,
                'branch_code' => 'PUSAT',
                'payment_date' => '14/07/2024',
                'status' => 'Lunas',
            ],
        ];

        return view('supervisor.transactions.index', compact('transactions'));
    }
} 