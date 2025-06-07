@extends('layouts.admin')

@section('title', 'Data Nasabah')

@section('page_title', 'Kelola Nasabah')

@section('sidebar')
    <nav class="space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white hover:bg-orange-700 rounded-lg">
            <span class="mdi mdi-view-dashboard text-xl"></span>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.customers') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white bg-orange-700 rounded-lg">
            <span class="mdi mdi-account-group text-xl"></span>
            <span>Kelola Nasabah</span>
        </a>
        <a href="{{ route('admin.transactions') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white hover:bg-orange-700 rounded-lg">
            <span class="mdi mdi-cash-multiple text-xl"></span>
            <span>SBG</span>
        </a>
        <a href="{{ route('admin.reports') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white hover:bg-orange-700 rounded-lg">
            <span class="mdi mdi-file-chart text-xl"></span>
            <span>Laporan</span>
        </a>
        <a href="{{ route('admin.settings') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 text-white hover:bg-orange-700 rounded-lg">
            <span class="mdi mdi-cog text-xl"></span>
            <span>Pengaturan</span>
        </a>
    </nav>
@endsection

@section('content')
    <!-- Customer Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Total Nasabah</h3>
                <span class="mdi mdi-account-group text-2xl text-orange-600"></span>
            </div>
            <p class="text-3xl font-bold text-gray-800">150</p>
            <div class="flex items-center text-sm text-green-600 mt-2">
                <span class="mdi mdi-trending-up"></span>
                <span class="ml-1">12% kenaikan</span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Nasabah Aktif</h3>
                <span class="mdi mdi-account-check text-2xl text-green-600"></span>
            </div>
            <p class="text-3xl font-bold text-gray-800">45</p>
            <div class="flex items-center text-sm text-gray-500 mt-2">
                <span class="mdi mdi-information"></span>
                <span class="ml-1">Memiliki pinjaman aktif</span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Pengajuan Baru</h3>
                <span class="mdi mdi-account-clock text-2xl text-yellow-600"></span>
            </div>
            <p class="text-3xl font-bold text-gray-800">8</p>
            <div class="flex items-center text-sm text-yellow-600 mt-2">
                <span class="mdi mdi-clock"></span>
                <span class="ml-1">Menunggu persetujuan</span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Nasabah Telat</h3>
                <span class="mdi mdi-account-alert text-2xl text-red-600"></span>
            </div>
            <p class="text-3xl font-bold text-gray-800">3</p>
            <div class="flex items-center text-sm text-red-600 mt-2">
                <span class="mdi mdi-alert-circle"></span>
                <span class="ml-1">Perlu tindakan</span>
            </div>
        </div>
    </div>

    <!-- Customer List -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-6 border-b border-gray-100">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <h3 class="text-lg font-semibold text-gray-800">Daftar Nasabah</h3>
                <div class="flex flex-wrap items-center gap-4">
                    <!-- Search -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            <span class="mdi mdi-magnify text-lg"></span>
                        </span>
                        <input type="text" placeholder="Cari nasabah..." class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>
                    <!-- Filter -->
                    <button class="text-orange-600 border border-orange-600 px-4 py-2 rounded-lg hover:bg-orange-50 transition-colors flex items-center">
                        <span class="mdi mdi-filter-variant mr-2"></span>
                        Filter
                    </button>
                    <!-- Export -->
                    <button class="text-orange-600 border border-orange-600 px-4 py-2 rounded-lg hover:bg-orange-50 transition-colors flex items-center">
                        <span class="mdi mdi-download mr-2"></span>
                        Export
                    </button>
                    <!-- Add New -->
                    <button class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors flex items-center">
                        <span class="mdi mdi-plus mr-2"></span>
                        Tambah Nasabah
                    </button>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nasabah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. KTP</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Pinjaman</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terakhir Aktif</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=fb923c&color=fff" 
                                         class="h-8 w-8 rounded-full" alt="User">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">John Doe</p>
                                        <p class="text-sm text-gray-500">john@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3271046504870002</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp 5.000.000</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20 Mar 2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="text-orange-600 hover:text-orange-900 mr-3">
                                    <span class="mdi mdi-eye text-lg"></span>
                                </button>
                                <button class="text-orange-600 hover:text-orange-900 mr-3">
                                    <span class="mdi mdi-pencil text-lg"></span>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <span class="mdi mdi-delete text-lg"></span>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=fb923c&color=fff" 
                                         class="h-8 w-8 rounded-full" alt="User">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Jane Smith</p>
                                        <p class="text-sm text-gray-500">jane@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3271046504870003</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp 3.000.000</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">19 Mar 2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="text-orange-600 hover:text-orange-900 mr-3">
                                    <span class="mdi mdi-eye text-lg"></span>
                                </button>
                                <button class="text-orange-600 hover:text-orange-900 mr-3">
                                    <span class="mdi mdi-pencil text-lg"></span>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <span class="mdi mdi-delete text-lg"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm text-gray-500">
                    Menampilkan 1-10 dari 150 nasabah
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 disabled:opacity-50">
                        Previous
                    </button>
                    <button class="px-3 py-1 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                        1
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                        2
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                        3
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection 