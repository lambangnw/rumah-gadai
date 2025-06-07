@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Dashboard Petugas</h2>
        <!-- Date Picker Filter -->
        <div class="flex items-center gap-3">
            <div class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2 shadow-sm">
                <span class="mdi mdi-calendar text-xl text-gray-500 mr-2"></span>
                <span class="font-semibold text-gray-800 mr-1">Hari Ini:</span>
                <span class="text-gray-700">03/06/2025</span>
                <span class="mdi mdi-menu-down text-2xl text-gray-400 ml-2"></span>
            </div>
            <button class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                <span class="mdi mdi-download text-xl"></span>
            </button>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
        <!-- Transaksi Hari Ini -->
        <div class="bg-blue-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-blue-600">Transaksi Hari Ini</p>
                <p class="text-2xl font-bold text-blue-700">12</p>
            </div>
            <span class="mdi mdi-cash-multiple text-3xl text-blue-500"></span>
        </div>
        <!-- Lunas Sebagian -->
         <div class="bg-yellow-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
             <div>
                 <p class="text-sm text-yellow-600">Lunas Sebagian</p>
                 <p class="text-2xl font-bold text-yellow-700">5</p>
             </div>
             <span class="mdi mdi-cash-minus text-3xl text-yellow-500"></span>
         </div>
        <!-- Total Transaksi -->
        <div class="bg-green-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-green-600">Total Transaksi</p>
                <p class="text-2xl font-bold text-green-700">150</p>
            </div>
            <span class="mdi mdi-chart-line text-3xl text-green-500"></span>
        </div>
        <!-- SBG Aktif -->
        <div class="bg-orange-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-orange-600">SBG Aktif</p>
                <p class="text-2xl font-bold text-orange-700">85</p>
            </div>
            <span class="mdi mdi-package-variant-closed text-3xl text-orange-500"></span>
        </div>
        <!-- Transaksi Lunas Hari Ini -->
        <div class="bg-teal-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-teal-600">Lunas Hari Ini</p>
                <p class="text-2xl font-bold text-teal-700">8</p>
            </div>
            <span class="mdi mdi-cash-check text-3xl text-teal-500"></span>
        </div>
        <!-- Nasabah Baru -->
        <div class="bg-purple-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-purple-600">Nasabah Baru</p>
                <p class="text-2xl font-bold text-purple-700">3</p>
            </div>
            <span class="mdi mdi-account-plus text-3xl text-purple-500"></span>
        </div>
    </div>
</div>

<!-- Tabel Transaksi Terbaru -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-10">
    <h3 class="text-lg font-bold text-blue-700 mb-4 flex items-center gap-2">
        <span class="mdi mdi-clock-fast"></span> Transaksi Terbaru
    </h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. SBG</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nasabah</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nilai Taksiran</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr>
                     <td class="px-6 py-4">SBG-2024-001</td>
                     <td class="px-6 py-4">John Doe</td>
                     <td class="px-6 py-4">Laptop Asus ROG</td>
                     <td class="px-6 py-4">Rp 5.000.000</td>
                     <td class="px-6 py-4">03 Jun 2025</td>
                     <td class="px-6 py-4">
                         <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200 shadow-sm whitespace-nowrap">Lunas Sebagian</span>
                     </td>
                     <td class="px-6 py-4 flex gap-2">
                         <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs font-semibold hover:bg-blue-600 transition">Detail</button>
                     </td>
                 </tr>
                <tr>
                    <td class="px-6 py-4">SBG-2024-002</td>
                    <td class="px-6 py-4">Jane Smith</td>
                    <td class="px-6 py-4">iPhone 14 Pro</td>
                    <td class="px-6 py-4">Rp 8.500.000</td>
                    <td class="px-6 py-4">03 Jun 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 border border-green-200 shadow-sm whitespace-nowrap">Aktif</span>
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs font-semibold hover:bg-blue-600 transition">Detail</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">SBG-2024-003</td>
                    <td class="px-6 py-4">Ahmad Wijaya</td>
                    <td class="px-6 py-4">Emas 24K (10gr)</td>
                    <td class="px-6 py-4">Rp 12.000.000</td>
                    <td class="px-6 py-4">02 Jun 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 border border-blue-200 shadow-sm whitespace-nowrap">Lunas</span>
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs font-semibold hover:bg-blue-600 transition">Detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection