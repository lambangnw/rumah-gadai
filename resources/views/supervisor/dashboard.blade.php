@extends('layouts.app')

@section('title', 'Dashboard Supervisor')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Dashboard Supervisor</h2>
        <!-- Date Picker Filter -->
        <div class="flex items-center gap-3">
            <div class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2 shadow-sm">
                <span class="mdi mdi-calendar text-xl text-gray-500 mr-2"></span>
                <span class="font-semibold text-gray-800 mr-1">Minggu Ini:</span>
                <span class="text-gray-700">02/06/2025 - 03/06/2025</span>
                <span class="mdi mdi-menu-down text-2xl text-gray-400 ml-2"></span>
            </div>
            <button class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                <span class="mdi mdi-download text-xl"></span>
            </button>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
        <!-- Total Nasabah -->
        <div class="bg-blue-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-blue-600">Total Nasabah</p>
                <p class="text-2xl font-bold text-blue-700">1.250</p>
            </div>
            <span class="mdi mdi-account-group text-3xl text-blue-500"></span>
        </div>
        <!-- Total Transaksi -->
        <div class="bg-green-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-green-600">Total Transaksi</p>
                <p class="text-2xl font-bold text-green-700">2.340</p>
            </div>
            <span class="mdi mdi-swap-horizontal text-3xl text-green-500"></span>
        </div>
        <!-- Transaksi Lunas -->
        <div class="bg-orange-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-orange-600">Transaksi Lunas</p>
                <p class="text-2xl font-bold text-orange-700">1.800</p>
            </div>
            <span class="mdi mdi-cash-check text-3xl text-orange-500"></span>
        </div>
        <!-- Total Barang Gadai -->
        <div class="bg-teal-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-teal-600">Total Barang Gadai</p>
                <p class="text-2xl font-bold text-teal-700">320</p>
            </div>
            <span class="mdi mdi-package-variant-closed text-3xl text-teal-500"></span>
        </div>
        <!-- Total Piutang -->
        <div class="bg-red-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-red-600">Total Piutang</p>
                <p class="text-2xl font-bold text-red-700">Rp 320.000.000</p>
            </div>
            <span class="mdi mdi-cash-multiple text-3xl text-red-500"></span>
        </div>
        <!-- Transaksi Baru Bulan Ini -->
        <div class="bg-pink-50 rounded-lg p-6 flex items-center justify-between min-h-[120px] flex-1">
            <div>
                <p class="text-sm text-pink-600">Transaksi Baru (Bulan Ini)</p>
                <p class="text-2xl font-bold text-pink-700">45</p>
            </div>
            <span class="mdi mdi-plus-circle text-3xl text-pink-500"></span>
        </div>
    </div>
</div>
<!-- Tabel Pengajuan Tambah Barang -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-10">
    <h3 class="text-lg font-bold text-purple-700 mb-4 flex items-center gap-2">
        <span class="mdi mdi-plus-box"></span> Pengajuan Tambah Barang
    </h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama Pengaju</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Tanggal Pengajuan</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr>
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Smartwatch Garmin Venu 2</td>
                    <td class="px-6 py-4">Budi Santoso</td>
                    <td class="px-6 py-4">2024-07-01</td>
                    <td class="px-6 py-4">
                        <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200 shadow-sm">Menunggu</span>
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs font-semibold hover:bg-green-600 transition">Terima</button>
                        <button class="px-3 py-1 bg-red-500 text-white rounded-lg text-xs font-semibold hover:bg-red-600 transition">Tolak</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">2</td>
                    <td class="px-6 py-4">Drone DJI Mini 3</td>
                    <td class="px-6 py-4">Siti Aminah</td>
                    <td class="px-6 py-4">2024-07-02</td>
                    <td class="px-6 py-4">
                        <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 border border-green-200 shadow-sm">Disetujui</span>
                    </td>
                    <td class="px-6 py-4"></td>
                </tr>
                <tr>
                    <td class="px-6 py-4">3</td>
                    <td class="px-6 py-4">Kamera Canon EOS R10</td>
                    <td class="px-6 py-4">Andi Wijaya</td>
                    <td class="px-6 py-4">2024-07-03</td>
                    <td class="px-6 py-4">
                        <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 border border-red-200 shadow-sm">Ditolak</span>
                    </td>
                    <td class="px-6 py-4"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection