<nav class="space-y-1">
    <a href="{{ route('petugas.dashboard') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('petugas.dashboard') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-view-dashboard text-xl"></span>
        <span>Dashboard</span>
    </a>

    <!-- Transaksi Gadai Dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
                class="w-full sidebar-link font-medium flex items-center justify-between px-4 py-3 rounded-lg {{ request()->routeIs('petugas.transaksi.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
            <div class="flex items-center space-x-3">
                <span class="mdi mdi-cash-multiple text-xl"></span>
                <span>Transaksi Gadai</span>
            </div>
            <span class="mdi mdi-chevron-down transition-transform" :class="{ 'transform rotate-180': open }"></span>
        </button>
        <div x-show="open" @click.away="open = false" class="mt-1 space-y-1 pl-4">
            <a href="{{ route('petugas.transaksi.create') }}" 
               class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('petugas.transaksi.create') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
                <span class="mdi mdi-plus-circle text-xl"></span>
                <span>Input Transaksi</span>
            </a>
            <a href="{{ route('petugas.transactions') }}" 
               class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('petugas.transactions') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
                <span class="mdi mdi-format-list-bulleted text-xl"></span>
                <span>Daftar SBG</span>
            </a>
        </div>
    </div>

    <a href="{{ route('petugas.customers') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('petugas.customers') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-account-group text-xl"></span>
        <span>Nasabah</span>
    </a>

    <a href="{{ route('petugas.items') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('petugas.items') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-package-variant text-xl"></span>
        <span>Data Barang</span>
    </a>

    <a href="{{ route('petugas.cek-taksiran') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('petugas.cek-taksiran') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-calculator text-xl"></span>
        <span>Cek Nilai Taksiran</span>
    </a>

    <a href="{{ route('petugas.reports') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('petugas.reports') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-file-document-outline text-xl"></span>
        <span>Laporan Transaksi</span>
    </a>
</nav>