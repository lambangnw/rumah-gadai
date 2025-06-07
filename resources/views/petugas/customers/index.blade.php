@extends('layouts.app')

@section('title', 'Daftar Nasabah')

@section('content')
<!-- Header Section -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Nasabah</h2>
        <!-- Filter and Actions -->
        <div class="flex items-center gap-3">
            <div class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2 shadow-sm">
                <span class="mdi mdi-calendar text-xl text-gray-500 mr-2"></span>
                <span class="font-semibold text-gray-800 mr-1">Filter:</span>
                <span class="text-gray-700">Semua Waktu</span>
                <span class="mdi mdi-menu-down text-2xl text-gray-400 ml-2"></span>
            </div>
            <button class="btn-secondary p-3 rounded-xl shadow">
                <span class="mdi mdi-download text-lg"></span>
            </button>
            <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-semibold rounded-xl flex items-center gap-2 shadow-lg hover:from-blue-700 hover:to-blue-500 transition-all duration-200">
                <span class="mdi mdi-plus text-lg"></span>
                Tambah Nasabah
            </button>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-8">
        <!-- Total Nasabah -->
        <div class="bg-blue-50 rounded-lg p-6 flex items-center justify-between min-h-[120px]">
            <div>
                <p class="text-sm text-blue-600 font-medium">Total Nasabah</p>
                <p class="text-2xl font-bold text-blue-700">3</p>
                <p class="text-xs text-blue-500 mt-1">+12% dari bulan lalu</p>
            </div>
            <div class="bg-blue-500 p-3 rounded-full">
                <span class="mdi mdi-account-group text-2xl text-white"></span>
            </div>
        </div>
        
        <!-- Nasabah Aktif -->
        <div class="bg-green-50 rounded-lg p-6 flex items-center justify-between min-h-[120px]">
            <div>
                <p class="text-sm text-green-600 font-medium">Nasabah Aktif</p>
                <p class="text-2xl font-bold text-green-700">2</p>
                <p class="text-xs text-green-500 mt-1">+8% dari bulan lalu</p>
            </div>
            <div class="bg-green-500 p-3 rounded-full">
                <span class="mdi mdi-account-check text-2xl text-white"></span>
            </div>
        </div>
        
        <!-- Nasabah Baru (Bulan Ini) -->
        <div class="bg-orange-50 rounded-lg p-6 flex items-center justify-between min-h-[120px]">
            <div>
                <p class="text-sm text-orange-600 font-medium">Nasabah Baru</p>
                <p class="text-2xl font-bold text-orange-700">15</p>
                <p class="text-xs text-orange-500 mt-1">Bulan ini</p>
            </div>
            <div class="bg-orange-500 p-3 rounded-full">
                <span class="mdi mdi-account-plus text-2xl text-white"></span>
            </div>
        </div>
        
        <!-- Transaksi Nasabah -->
        <div class="bg-purple-50 rounded-lg p-6 flex items-center justify-between min-h-[120px]">
            <div>
                <p class="text-sm text-purple-600 font-medium">Total Transaksi</p>
                <p class="text-2xl font-bold text-purple-700">1,234</p>
                <p class="text-xs text-purple-500 mt-1">+25% dari bulan lalu</p>
            </div>
            <div class="bg-purple-500 p-3 rounded-full">
                <span class="mdi mdi-swap-horizontal text-2xl text-white"></span>
            </div>
        </div>
    </div>
</div>

<!-- Data Table Section -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-6">
    <!-- Search and Filter Bar -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="flex-1">
            <div class="relative">
                <input type="text" placeholder="Cari nasabah berdasarkan nama atau NIK..." class="w-full px-4 py-3 pl-12 pr-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200">
                <span class="mdi mdi-magnify absolute left-4 top-3.5 text-gray-400 text-xl"></span>
            </div>
        </div>
        <div class="flex gap-2">
            <select class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-3 rounded-xl transition-colors flex items-center gap-2">
                <span class="mdi mdi-filter-variant"></span>
                Filter
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider rounded-tl-lg w-1/4">
                        <div class="flex items-center gap-1">
                            <span class="mdi mdi-account text-sm"></span>
                            <span class="hidden sm:inline">Nama</span>
                        </div>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/4 hidden md:table-cell">
                        <div class="flex items-center gap-1">
                            <span class="mdi mdi-email text-sm"></span>
                            Email
                        </div>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/6">
                        <div class="flex items-center gap-1">
                            <span class="mdi mdi-phone text-sm"></span>
                            <span class="hidden sm:inline">No. HP</span>
                        </div>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/6">
                        <div class="flex items-center gap-1">
                            <span class="mdi mdi-check-circle text-sm"></span>
                            Status
                        </div>
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/6 hidden lg:table-cell">
                        <div class="flex items-center gap-1">
                            <span class="mdi mdi-calendar text-sm"></span>
                            Terdaftar
                        </div>
                    </th>
                    <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider rounded-tr-lg w-1/6">
                        <div class="flex items-center justify-center gap-1">
                            <span class="mdi mdi-cog text-sm"></span>
                            <span class="hidden sm:inline">Aksi</span>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
yan                @forelse($customers as $customer)
ightnya.                 <tr class="hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 transition-all duration-300 group">
                    <td class="px-3 py-3">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-full p-1.5 mr-2 flex-shrink-0">
                                <span class="mdi mdi-account text-white text-sm"></span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="text-sm font-semibold text-gray-900 truncate">{{ $customer['nama'] }}</div>
                                <div class="text-xs text-gray-500 sm:hidden">{{ $customer['email'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 py-3 hidden md:table-cell">
                        <div class="text-sm text-gray-900 truncate">{{ $customer['email'] }}</div>
                    </td>
                    <td class="px-3 py-3">
                        <div class="text-sm text-gray-900">{{ $customer['no_hp'] }}</div>
                    </td>
                    <td class="px-3 py-3">
                        @if($customer['status'] == 'Aktif')
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></span>
                            <span class="hidden sm:inline">Aktif</span>
                        </span>
                        @elseif($customer['status'] == 'Tidak Aktif')
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1"></span>
                            <span class="hidden sm:inline">Tidak Aktif</span>
                        </span>
                        @elseif($customer['status'] == 'Pending')
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1"></span>
                            <span class="hidden sm:inline">Pending</span>
                        </span>
                        @else
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full mr-1"></span>
                            <span class="hidden sm:inline">{{ $customer['status'] }}</span>
                        </span>
                        @endif
                    </td>
                    <td class="px-3 py-3 hidden lg:table-cell">
                        <div class="text-sm text-gray-900">{{ $customer['terdaftar'] }}</div>
                    </td>
                    <td class="px-3 py-3 text-center">
                        <div class="flex justify-center space-x-1">
                            <button class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-1.5 rounded-lg transition-all duration-200" title="Lihat Detail">
                                <span class="mdi mdi-eye text-sm"></span>
                            </button>
                            <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-600 p-1.5 rounded-lg transition-all duration-200" title="Edit">
                                <span class="mdi mdi-pencil text-sm"></span>
                            </button>
                            <button class="bg-red-100 hover:bg-red-200 text-red-600 p-1.5 rounded-lg transition-all duration-200" title="Hapus">
                                <span class="mdi mdi-delete text-sm"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="bg-gradient-to-r from-gray-100 to-gray-200 rounded-full p-6 mb-4">
                                <span class="mdi mdi-account-off text-6xl text-gray-400"></span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Data Nasabah</h3>
                            <p class="text-gray-500 text-sm mb-6 max-w-md">Mulai dengan menambahkan nasabah baru untuk memulai transaksi gadai</p>
                            <button class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-6 py-3 rounded-lg transition-all duration-200 flex items-center gap-2 shadow-lg">
                                <span class="mdi mdi-plus text-lg"></span>
                                Tambah Nasabah Pertama
                            </button>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6 pt-6 border-t border-gray-200">
        <div class="flex items-center text-sm text-gray-700">
            <span>Menampilkan</span>
            <select class="mx-2 px-3 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span>dari {{ count($customers) }} data</span>
        </div>
        <div class="flex items-center space-x-2">
            <button class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                <span class="mdi mdi-chevron-left"></span>
                Sebelumnya
            </button>
            <button class="px-3 py-2 text-sm text-white bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg">
                1
            </button>
            <button class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                2
            </button>
            <button class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                3
            </button>
            <button class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Selanjutnya
                <span class="mdi mdi-chevron-right"></span>
            </button>
        </div>
    </div>
</div>
@endsection