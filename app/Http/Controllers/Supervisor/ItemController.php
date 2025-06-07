<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Data dummy untuk prototype
        $items = [
            [
                'id' => 1,
                'code' => 'BRG-2024-001',
                'name' => 'PCX 160',
                'specification' => 'Honda',
                'category' => 'kendaraan',
                'estimated_value' => 35000000,
                'status' => 'active',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 2,
                'code' => 'BRG-2024-002',
                'name' => 'ROG Strix G15',
                'specification' => 'Asus',
                'category' => 'elektronik',
                'estimated_value' => 15000000,
                'status' => 'active',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 3,
                'code' => 'BRG-2024-003',
                'name' => 'Cincin Emas',
                'specification' => '24 Karat',
                'category' => 'perhiasan',
                'estimated_value' => 8000000,
                'status' => 'active',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 4,
                'code' => 'BRG-2024-004',
                'name' => 'iPhone 13',
                'specification' => 'Apple',
                'category' => 'elektronik',
                'estimated_value' => 12000000,
                'status' => 'inactive',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 5,
                'code' => 'BRG-2024-005',
                'name' => 'Vario 125',
                'specification' => 'Honda',
                'category' => 'kendaraan',
                'estimated_value' => 18000000,
                'status' => 'active',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 6,
                'code' => 'BRG-2024-006',
                'name' => 'Kalung Berlian',
                'specification' => 'Tiffany & Co.',
                'category' => 'perhiasan',
                'estimated_value' => 25000000,
                'status' => 'inactive',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 7,
                'code' => 'BRG-2024-007',
                'name' => 'MacBook Air',
                'specification' => 'Apple',
                'category' => 'elektronik',
                'estimated_value' => 17000000,
                'status' => 'active',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 8,
                'code' => 'BRG-2024-008',
                'name' => 'Ninja 250',
                'specification' => 'Kawasaki',
                'category' => 'kendaraan',
                'estimated_value' => 42000000,
                'status' => 'inactive',
                'image' => 'https://via.placeholder.com/40'
            ],
            [
                'id' => 9,
                'code' => 'BRG-2024-009',
                'name' => 'Gelang Emas',
                'specification' => '22 Karat',
                'category' => 'perhiasan',
                'estimated_value' => 6000000,
                'status' => 'active',
                'image' => 'https://via.placeholder.com/40'
            ],
        ];

        return view('supervisor.items.index', compact('items'));
    }

    public function create()
    {
        return view('supervisor.items.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('supervisor.items.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function show($id)
    {
        return view('supervisor.items.show');
    }

    public function edit($id)
    {
        return view('supervisor.items.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('supervisor.items.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        return redirect()->route('supervisor.items.index')
            ->with('success', 'Barang berhasil dihapus');
    }
} 