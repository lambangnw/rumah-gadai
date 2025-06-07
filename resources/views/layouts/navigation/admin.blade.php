<nav class="space-y-1">
    <a href="{{ route('admin.dashboard') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-orange-700 text-white font-bold' : 'text-gray-700 hover:bg-orange-50' }}">
        <span class="mdi mdi-view-dashboard text-xl"></span>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('admin.customers') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.customers') ? 'bg-orange-700 text-white font-bold' : 'text-gray-700 hover:bg-orange-50' }}">
        <span class="mdi mdi-account-group text-xl"></span>
        <span>Data Nasabah</span>
    </a>
    <a href="{{ route('admin.transactions') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.transactions') ? 'bg-orange-700 text-white font-bold' : 'text-gray-700 hover:bg-orange-50' }}">
        <span class="mdi mdi-diamond-stone text-xl"></span>
        <span>Data Gadai</span>
    </a>
    <a href="{{ route('admin.reports') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.reports') ? 'bg-orange-700 text-white font-bold' : 'text-gray-700 hover:bg-orange-50' }}">
        <span class="mdi mdi-scale-balance text-xl"></span>
        <span>Penaksiran</span>
    </a>
    <a href="{{ route('admin.settings') }}" 
       class="sidebar-link font-medium flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.settings') ? 'bg-orange-700 text-white font-bold' : 'text-gray-700 hover:bg-orange-50' }}">
        <span class="mdi mdi-cog text-xl"></span>
        <span>Pengaturan</span>
    </a>
</nav>

<div class="space-y-1">
    <a href="{{ route('petugas.dashboard') }}" class="font-semibold flex items-center px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.dashboard') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-view-dashboard mr-3"></span>
        Dashboard
    </a>

    <!-- Transaksi Gadai Dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="w-full font-semibold flex items-center justify-between px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.transaksi.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
            <div class="flex items-center">
                <span class="mdi mdi-cash-multiple mr-3"></span>
                Transaksi Gadai
            </div>
            <span class="mdi mdi-chevron-down transition-transform" :class="{ 'transform rotate-180': open }"></span>
        </button>
        <div x-show="open" @click.away="open = false" class="mt-1 space-y-1 pl-4">
            <a href="{{ route('petugas.transaksi.create') }}" class="font-semibold flex items-center px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.transaksi.create') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
                <span class="mdi mdi-plus-circle mr-3"></span>
                Input Transaksi
            </a>
            <a href="{{ route('petugas.transactions') }}" class="font-semibold flex items-center px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.transactions') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
                <span class="mdi mdi-format-list-bulleted mr-3"></span>
                Daftar SBG
            </a>
        </div>
    </div>

    <a href="{{ route('petugas.customers') }}" class="font-semibold flex items-center px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.customers') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-account-group mr-3"></span>
        Nasabah
    </a>

    <a href="{{ route('petugas.items') }}" class="font-semibold flex items-center px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.items') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-package-variant mr-3"></span>
        Data Barang
    </a>

    <a href="{{ route('petugas.cek-taksiran') }}" class="font-semibold flex items-center px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.cek-taksiran') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-calculator mr-3"></span>
        Cek Nilai Taksiran
    </a>

    <a href="{{ route('petugas.reports') }}" class="font-semibold flex items-center px-4 py-2 text-sm rounded-lg {{ request()->routeIs('petugas.reports') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-gray-700 hover:bg-blue-50' }}">
        <span class="mdi mdi-file-document-outline mr-3"></span>
        Laporan Transaksi
    </a>
</div>