@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard Admin</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Statistik -->
        <div class="bg-orange-50 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-orange-600">Total Transaksi</p>
                    <p class="text-2xl font-bold text-orange-700">150</p>
                </div>
                <span class="mdi mdi-cash-multiple text-3xl text-orange-500"></span>
            </div>
        </div>

        <div class="bg-orange-50 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-orange-600">Transaksi Hari Ini</p>
                    <p class="text-2xl font-bold text-orange-700">12</p>
                </div>
                <span class="mdi mdi-calendar-check text-3xl text-orange-500"></span>
            </div>
        </div>

        <div class="bg-orange-50 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-orange-600">Total Pendapatan</p>
                    <p class="text-2xl font-bold text-orange-700">Rp 15.000.000</p>
                </div>
                <span class="mdi mdi-currency-usd text-3xl text-orange-500"></span>
            </div>
        </div>
    </div>

    <!-- Daftar Transaksi Terbaru -->
    <div class="mt-8">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Transaksi Terbaru</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nasabah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Laptop Asus ROG</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp 5.000.000</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Selesai
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a href="#" class="text-orange-600 hover:text-orange-900">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 