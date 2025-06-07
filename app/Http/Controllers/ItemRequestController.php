<?php

namespace App\Http\Controllers;

use App\Models\ItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemRequestController extends Controller
{
    public function index()
    {
        // Data dummy untuk transaksi SBG
        $transactions = [
            [
                'sbg_no' => 'SBG-2024-001',
                'customer_name' => 'Ahmad Rizki',
                'item_name' => 'iPhone 14 Pro',
                'item_category' => 'elektronik',
                'amount' => 15000000,
                'payment_date' => '15 Mar 2024',
                'status' => 'Lunas'
            ],
            [
                'sbg_no' => 'SBG-2024-002',
                'customer_name' => 'Siti Nurhaliza',
                'item_name' => 'Kalung Emas 24K',
                'item_category' => 'perhiasan',
                'amount' => 8000000,
                'payment_date' => '12 Mar 2024',
                'status' => 'Aktif'
            ],
            [
                'sbg_no' => 'SBG-2024-003',
                'customer_name' => 'Budi Santoso',
                'item_name' => 'Honda Vario 150',
                'item_category' => 'kendaraan',
                'amount' => 18000000,
                'payment_date' => '10 Mar 2024',
                'status' => 'Lunas Sebagian'
            ],
            [
                'sbg_no' => 'SBG-2024-004',
                'customer_name' => 'Maya Sari',
                'item_name' => 'Laptop ASUS ROG',
                'item_category' => 'elektronik',
                'amount' => 12000000,
                'payment_date' => '08 Mar 2024',
                'status' => 'Perpanjang'
            ],
            [
                'sbg_no' => 'SBG-2024-005',
                'customer_name' => 'Dedi Kurniawan',
                'item_name' => 'Cincin Berlian',
                'item_category' => 'perhiasan',
                'amount' => 25000000,
                'payment_date' => '05 Mar 2024',
                'status' => 'Batal'
            ],
            [
                'sbg_no' => 'SBG-2024-006',
                'customer_name' => 'Rina Sari',
                'item_name' => 'Gelang Emas',
                'item_category' => 'perhiasan',
                'amount' => 5000000,
                'payment_date' => '03 Mar 2024',
                'status' => 'Aktif'
            ]
        ];

        return view('petugas.transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('item-requests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'estimated_value' => 'required|numeric|min:0',
        ]);

        // Simulasi penyimpanan untuk prototype (tanpa database)
        $itemRequestData = [
            'id' => 'REQ-' . time(),
            'user_id' => 'USER-001',
            'item_name' => $validated['item_name'],
            'description' => $validated['description'],
            'estimated_value' => $validated['estimated_value'],
            'status' => 'pending',
            'created_at' => now()->format('Y-m-d H:i:s')
        ];

        // Simpan ke session untuk demo
        session()->push('dummy_item_requests', $itemRequestData);

        return redirect()->route('item-requests.index')
            ->with('success', 'Item request submitted successfully (PROTOTYPE MODE)');
    }

    public function show($id)
    {
        // Data dummy untuk detail SBG berdasarkan ID
        $sbgDetail = [
            'sbg_no' => 'PUSAT-20240720-40944',
            'customer_name' => 'Ahmad Rizki',
            'item_name' => 'iPhone 14 Pro',
            'item_category' => 'elektronik',
            'nominal_pinjaman_awal' => 2000000,
            'sisa_pinjaman_pokok' => 1950000,
            'jasa_tarif' => 195000,
            'status' => 'Aktif',
            'tanggal_jatuh_tempo' => '16 Agustus 2024',
            'timeline' => [
                [
                    'tanggal' => '20 Juli 2024 pukul 18:08',
                    'status' => 'Gadai Baru',
                    'pembayaran_jasa' => 0,
                    'pembayaran_pokok' => 0
                ],
                [
                    'tanggal' => '20 Juli 2024 pukul 18:33',
                    'status' => 'Lunas',
                    'pembayaran_jasa' => 200000,
                    'pembayaran_pokok' => 2000000
                ]
            ]
        ];
        
        return view('petugas.transactions.detail', compact('sbgDetail'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!session('auth.role') || session('auth.role') !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        // Simulasi update status untuk prototype (tanpa database)
        session()->put('item_request_' . $id . '_status', $validated['status']);
        session()->put('item_request_' . $id . '_admin_notes', $validated['admin_notes']);

        return redirect()->route('item-requests.show', $id)
            ->with('success', 'Status updated successfully.');
    }

    public function pelunasanSebagian($id)
    {
        // Data dummy untuk pelunasan sebagian berdasarkan ID
        $sbgDetail = [
            'sbg_no' => 'PUSAT-20240720-40944',
            'customer_name' => 'Ahmad Rizki',
            'item_name' => 'iPhone 14 Pro',
            'item_category' => 'elektronik',
            'nominal_pinjaman_awal' => 2000000,
            'sisa_pinjaman_pokok' => 1950000,
            'jasa_tarif' => 195000,
            'status' => 'Aktif',
            'tanggal_jatuh_tempo' => '16 Agustus 2024',
        ];

        return view('petugas.transactions.pelunasan-sebagian', compact('sbgDetail'));
    }

    public function storePelunasanSebagian(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'pelunasan_dibayar' => 'required|numeric|min:50000',
            'metode_pembayaran' => 'required|in:cash,transfer'
        ]);

        // Proses pelunasan sebagian (dummy implementation)
        // Di implementasi nyata, ini akan menyimpan ke database
        
        return redirect()->route('petugas.transactions.detail', $id)
            ->with('success', 'Pelunasan sebagian berhasil diproses!');
    }
}