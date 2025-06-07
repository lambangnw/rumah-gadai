<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Menampilkan daftar transaksi SBG
     */
    public function index()
    {
        // Data dummy transaksi SBG untuk petugas
        $transactions = [
            [
                'sbg_no' => 'PUSAT-20240720-40944',
                'customer_name' => 'YANTO SURYANA PUTRA',
                'item_name' => 'Dokumen BPKB',
                'item_category' => 'dokumen',
                'amount' => 2000000,
                'payment_date' => '20/07/2024',
                'status' => 'Lunas',
            ],
            [
                'sbg_no' => 'PUSAT-20240720-40945',
                'customer_name' => 'HJ. NEULIS UNINA',
                'item_name' => 'Sertifikat Tanah',
                'item_category' => 'dokumen',
                'amount' => 2000000,
                'payment_date' => '20/07/2024',
                'status' => 'Lunas',
            ],
            [
                'sbg_no' => 'CBG1-20240719-40946',
                'customer_name' => 'AGUS SUPRIADI',
                'item_name' => 'Cincin Emas',
                'item_category' => 'perhiasan',
                'amount' => 1500000,
                'payment_date' => '19/07/2024',
                'status' => 'Aktif',
            ],
            [
                'sbg_no' => 'CBG1-20240718-40947',
                'customer_name' => 'SITI AMINAH',
                'item_name' => 'iPhone 13',
                'item_category' => 'elektronik',
                'amount' => 3500000,
                'payment_date' => '18/07/2024',
                'status' => 'Aktif',
            ],
            [
                'sbg_no' => 'PUSAT-20240717-40948',
                'customer_name' => 'BUDI SANTOSO',
                'item_name' => 'Honda Vario 150',
                'item_category' => 'kendaraan',
                'amount' => 5000000,
                'payment_date' => '17/07/2024',
                'status' => 'Lunas',
            ],
        ];

        return view('petugas.transaksi.index', compact('transactions'));
    }

    /**
     * Menampilkan form input transaksi
     */
    public function create()
    {
        return view('petugas.transaksi.create');
    }

    /**
     * Menyimpan data transaksi baru (DUMMY VERSION - NO DATABASE)
     */
    public function store(Request $request)
    {
        // Validasi input (tanpa database validation)
        $validated = $request->validate([
            'customer_id' => 'required|string',
            'item_id' => 'required|string',
            'nilai_pencairan' => 'required|numeric|min:0',
            'jasa_tarif_sewa_modal' => 'required|numeric|min:0',
            'jasa_tarif_sewa_modal_persen' => 'required|numeric|min:0|max:100',
            'jangka_waktu' => 'required|in:3,6,12',
            'kondisi_barang' => 'required|string',
        ]);

        // Simulasi penyimpanan data (untuk prototype)
        // Data akan disimpan dalam session untuk demo
        $transaksiData = [
            'id' => 'TXN-' . time(),
            'customer_id' => $validated['customer_id'],
            'item_id' => $validated['item_id'],
            'petugas_id' => 'PETUGAS-001',
            'nilai_taksiran' => 5000000, // dummy value
            'nilai_pencairan' => $validated['nilai_pencairan'],
            'jasa_tarif_sewa_modal' => $validated['jasa_tarif_sewa_modal'],
            'jasa_tarif_sewa_modal_persen' => $validated['jasa_tarif_sewa_modal_persen'],
            'jangka_waktu' => $validated['jangka_waktu'],
            'kondisi_barang' => $validated['kondisi_barang'],
            'status' => 'active',
            'tanggal_transaksi' => now()->format('Y-m-d H:i:s'),
            'tanggal_jatuh_tempo' => now()->addMonths($validated['jangka_waktu'])->format('Y-m-d H:i:s'),
        ];

        // Simpan ke session untuk demo
        session()->push('dummy_transactions', $transaksiData);

        return redirect()
            ->route('petugas.transactions')
            ->with('success', 'Transaksi berhasil disimpan (PROTOTYPE MODE)');
    }

    /**
     * Mencari data nasabah berdasarkan NIK atau nama (DUMMY VERSION)
     */
    public function searchCustomer(Request $request)
    {
        $search = $request->get('search');
        
        // Data dummy nasabah untuk prototype
        $dummyCustomers = [
            [
                'id' => 'CUST-001',
                'nik' => '3201234567890001',
                'name' => 'Ahmad Suryadi',
                'address' => 'Jl. Merdeka No. 123, Jakarta',
                'phone' => '081234567890'
            ],
            [
                'id' => 'CUST-002',
                'nik' => '3201234567890002',
                'name' => 'Siti Nurhaliza',
                'address' => 'Jl. Sudirman No. 456, Jakarta',
                'phone' => '081234567891'
            ],
            [
                'id' => 'CUST-003',
                'nik' => '3201234567890003',
                'name' => 'Budi Santoso',
                'address' => 'Jl. Thamrin No. 789, Jakarta',
                'phone' => '081234567892'
            ],
            [
                'id' => 'CUST-004',
                'nik' => '3201234567890004',
                'name' => 'Dewi Sartika',
                'address' => 'Jl. Gatot Subroto No. 321, Jakarta',
                'phone' => '081234567893'
            ]
        ];

        // Filter berdasarkan pencarian
        if ($search) {
            $dummyCustomers = array_filter($dummyCustomers, function($customer) use ($search) {
                return stripos($customer['nik'], $search) !== false || 
                       stripos($customer['name'], $search) !== false;
            });
        }

        return response()->json(array_values($dummyCustomers));
    }

    /**
     * Mengambil data item berdasarkan kategori (DUMMY VERSION)
     */
    public function getItemsByCategory(Request $request)
    {
        $category = $request->get('category');
        
        // Data dummy barang untuk prototype
        $dummyItems = [
            'elektronik' => [
                [
                    'id' => 'ITEM-001',
                    'name' => 'iPhone 14 Pro',
                    'brand' => 'Apple',
                    'estimated_value' => 15000000
                ],
                [
                    'id' => 'ITEM-002',
                    'name' => 'Samsung Galaxy S23',
                    'brand' => 'Samsung',
                    'estimated_value' => 12000000
                ],
                [
                    'id' => 'ITEM-003',
                    'name' => 'MacBook Pro M2',
                    'brand' => 'Apple',
                    'estimated_value' => 25000000
                ]
            ],
            'perhiasan' => [
                [
                    'id' => 'ITEM-004',
                    'name' => 'Kalung Emas 24K',
                    'brand' => 'Antam',
                    'estimated_value' => 8000000
                ],
                [
                    'id' => 'ITEM-005',
                    'name' => 'Cincin Berlian',
                    'brand' => 'Tiffany & Co',
                    'estimated_value' => 20000000
                ],
                [
                    'id' => 'ITEM-006',
                    'name' => 'Gelang Emas',
                    'brand' => 'UBS',
                    'estimated_value' => 5000000
                ]
            ],
            'kendaraan' => [
                [
                    'id' => 'ITEM-007',
                    'name' => 'Honda Vario 150',
                    'brand' => 'Honda',
                    'estimated_value' => 18000000
                ],
                [
                    'id' => 'ITEM-008',
                    'name' => 'Yamaha NMAX',
                    'brand' => 'Yamaha',
                    'estimated_value' => 22000000
                ]
            ]
        ];

        $items = $dummyItems[$category] ?? [];
        return response()->json($items);
    }
}