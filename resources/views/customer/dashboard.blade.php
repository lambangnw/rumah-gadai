@extends('layouts.customer')

@section('title', 'Dashboard Nasabah')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ auth()->user()->name ?? 'Nasabah' }}</h1>
                <p class="text-gray-600 mt-1">Kelola pinjaman dan transaksi Anda dengan mudah</p>
            </div>
            <div class="flex gap-3">
                <button class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-xl font-semibold flex items-center gap-2 transition-all duration-200 shadow-lg">
                    <span class="mdi mdi-plus text-lg"></span>
                    Ajukan Pinjaman
                </button>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold flex items-center gap-2 transition-all duration-200 shadow-lg">
                    <span class="mdi mdi-download text-lg"></span>
                    Unduh Laporan
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Pinjaman -->
        <div class="bg-blue-50 rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-blue-600 font-medium">Total Pinjaman</p>
                <p class="text-2xl font-bold text-blue-700">Rp 5.000.000</p>
                <p class="text-xs text-blue-500 mt-1">2 pinjaman aktif</p>
            </div>
            <div class="bg-blue-500 p-3 rounded-full">
                <span class="mdi mdi-cash text-2xl text-white"></span>
            </div>
        </div>
        
        <!-- Sisa Pembayaran -->
        <div class="bg-red-50 rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-red-600 font-medium">Sisa Pembayaran</p>
                <p class="text-2xl font-bold text-red-700">Rp 3.200.000</p>
                <p class="text-xs text-red-500 mt-1">Jatuh tempo 15 hari</p>
            </div>
            <div class="bg-red-500 p-3 rounded-full">
                <span class="mdi mdi-calendar-clock text-2xl text-white"></span>
            </div>
        </div>
        
        <!-- Barang Digadaikan -->
        <div class="bg-green-50 rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-green-600 font-medium">Barang Digadaikan</p>
                <p class="text-2xl font-bold text-green-700">3</p>
                <p class="text-xs text-green-500 mt-1">Emas, Elektronik</p>
            </div>
            <div class="bg-green-500 p-3 rounded-full">
                <span class="mdi mdi-diamond-stone text-2xl text-white"></span>
            </div>
        </div>
        
        <!-- Status Akun -->
        <div class="bg-purple-50 rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-purple-600 font-medium">Status Akun</p>
                <p class="text-2xl font-bold text-purple-700">Aktif</p>
                <p class="text-xs text-purple-500 mt-1">Terverifikasi</p>
            </div>
            <div class="bg-purple-500 p-3 rounded-full">
                <span class="mdi mdi-account-check text-2xl text-white"></span>
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Transaksi Terbaru</h3>
            <a href="{{ route('customer.loans') }}" class="text-orange-600 hover:text-orange-700 font-medium">Lihat Semua</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Tanggal</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Jenis</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Barang</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Jumlah</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-4 px-4 text-gray-900">15 Des 2024</td>
                        <td class="py-4 px-4 text-gray-900">Gadai</td>
                        <td class="py-4 px-4 text-gray-900">Emas 24K</td>
                        <td class="py-4 px-4 text-gray-900">Rp 2.500.000</td>
                        <td class="py-4 px-4">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Aktif</span>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-4 px-4 text-gray-900">10 Des 2024</td>
                        <td class="py-4 px-4 text-gray-900">Pembayaran</td>
                        <td class="py-4 px-4 text-gray-900">Laptop</td>
                        <td class="py-4 px-4 text-gray-900">Rp 500.000</td>
                        <td class="py-4 px-4">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Lunas</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection