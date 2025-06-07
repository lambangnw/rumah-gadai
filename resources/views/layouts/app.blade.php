<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - Rumah Gadai</title>
        
        <!-- Styles -->
        @vite(['resources/css/app.css'])
        
        <!-- Material Design Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
        
        <!-- Custom Styles -->
        <style>
            .sidebar-item {
                @apply flex items-center gap-4 pl-8 pr-6 py-3.5 text-gray-700 text-lg transition-all duration-200 ease-in-out rounded-xl font-medium tracking-tight;
            }
            .sidebar-item .mdi {
                @apply text-2xl;
            }
            .sidebar-item:hover {
                @apply bg-blue-50 text-blue-600 font-medium;
            }
            .sidebar-item.active {
                @apply bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg;
            }
            .sidebar-item.active .mdi {
                @apply text-blue-700;
            }
            .sidebar-item:active {
                @apply outline-none;
            }

            .btn-gradient-purple {
                @apply inline-flex items-center gap-2 px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-medium rounded-lg shadow-lg hover:from-purple-700 hover:to-blue-700 transition-all duration-200;
            }
            .status-badge {
                @apply inline-flex items-center px-3 py-1 rounded-full text-xs font-medium;
            }
            .status-badge .status-dot {
                @apply w-2 h-2 rounded-full mr-3;
            }
            .card {
                @apply bg-white rounded-lg shadow-sm border border-gray-100;
            }
            .btn-primary {
                @apply inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow-lg hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200 text-lg;
            }
            .btn-secondary {
                @apply px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200;
            }
            .input-field {
                @apply w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500;
            }
            .badge {
                @apply px-3 py-0.5 text-xs font-bold rounded-full bg-blue-500 text-white ml-2 shadow;
            }
            .badge-success {
                @apply bg-green-100 text-green-800;
            }
            .badge-warning {
                @apply bg-yellow-100 text-yellow-800;
            }
            .badge-danger {
                @apply bg-red-100 text-red-800;
            }
            .badge-info {
                @apply bg-blue-100 text-blue-800;
            }
            .sidebar-subheader {
                @apply uppercase text-[11px] text-gray-400 font-bold tracking-widest px-10 pt-2 pb-2 mb-1;
            }
            .sidebar-label {
                @apply flex-1;
            }
        </style>
    </head>
    <body class="bg-gray-100">
        <div class="min-h-screen flex">
            <!-- Sidebar -->
            <div class="w-72 bg-white shadow-2xl rounded-r-2xl fixed inset-y-0 left-0 z-30 flex flex-col">
                <!-- Logo -->
                <div class="h-24 flex flex-col items-start justify-center border-b pl-10 pr-8 py-6 mb-2">
                    <div class="flex items-center gap-4">
                        <span class="inline-block w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24"><path d="M12 2L2 7v6c0 5.25 3.75 10 10 10s10-4.75 10-10V7l-10-5z" fill="#2563eb"/></svg>
                        </span>
                        <span class="text-2xl font-extrabold text-blue-600 tracking-tight">Rumah Gadai</span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="mt-4 flex-1 flex flex-col space-y-2">
                    <div class="px-10 pt-2 pb-2">
                        <span class="sidebar-subheader">Menu</span>
                    </div>

                    @if(session('auth') && session('auth.role') === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="mdi mdi-view-dashboard mr-4"></span>
                            <span class="sidebar-label">Dashboard</span>
                            <span class="ml-auto badge badge-info">5</span>
                        </a>
                        <a href="{{ route('admin.customers.index') }}" class="sidebar-item {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                            <span class="mdi mdi-account-group mr-4"></span>
                            <span class="sidebar-label">Kelola Pengguna</span>
                        </a>
                        <a href="{{ route('admin.transactions') }}" class="sidebar-item {{ request()->routeIs('admin.transactions') ? 'active' : '' }}">
                            <span class="mdi mdi-cash-multiple mr-4"></span>
                            <span class="sidebar-label">Transaksi</span>
                        </a>
                        <a href="{{ route('admin.reports') }}" class="sidebar-item {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                            <span class="mdi mdi-file-chart mr-4"></span>
                            <span class="sidebar-label">Laporan</span>
                        </a>
                        <a href="{{ route('admin.settings') }}" class="sidebar-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                            <span class="mdi mdi-cog mr-4"></span>
                            <span class="sidebar-label">Pengaturan</span>
                        </a>
                    @elseif(session('auth') && session('auth.role') === 'supervisor')
                        <a href="{{ route('supervisor.dashboard') }}"
                           class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200
                           {{ request()->routeIs('supervisor.dashboard') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-view-dashboard text-2xl"></span>
                            <span class="flex-1">Dashboard</span>
                        </a>
                        <a href="{{ route('supervisor.items.index') }}"
                           class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200
                           {{ request()->routeIs('supervisor.items.*') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-package-variant text-2xl"></span>
                            <span class="flex-1">Master Barang</span>
                        </a>
                        <a href="{{ route('supervisor.customers.index') }}"
                           class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200
                           {{ request()->routeIs('supervisor.customers.*') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-account-group text-2xl"></span>
                            <span class="flex-1">Data Nasabah</span>
                        </a>
                        <a href="{{ route('supervisor.transactions') }}"
                           class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200
                           {{ request()->routeIs('supervisor.transactions') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-cash-multiple text-2xl"></span>
                            <span class="flex-1">Daftar SBG</span>
                        </a>
                        <a href="{{ route('supervisor.reports') }}"
                           class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200
                           {{ request()->routeIs('supervisor.reports') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-file-chart text-2xl"></span>
                            <span class="flex-1">Laporan</span>
                        </a>
                    @elseif(session('auth') && session('auth.role') === 'petugas')
                        <!-- Dashboard -->
                        <a href="{{ route('petugas.dashboard') }}"
                           class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200 {{ request()->routeIs('petugas.dashboard') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-view-dashboard text-2xl"></span>
                            <span class="flex-1">Dashboard</span>
                        </a>
                        <!-- Transaksi Gadai Dropdown -->
                        <div x-data="{ open: {{ request()->routeIs('petugas.transactions.*') || request()->routeIs('petugas.sbg.*') ? 'true' : 'false' }} }" class="">
                            <button @click="open = !open" class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200 pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 w-full font-medium">
                                <span class="mdi mdi-cash-multiple text-2xl"></span>
                                <span class="flex-1 text-left">Transaksi Gadai</span>
                                <span class="mdi" :class="open ? 'mdi-chevron-up' : 'mdi-chevron-down'"></span>
                            </button>
                            <div x-show="open" class="ml-10 mt-1 space-y-1">
                                <a href="{{ route('petugas.cek-taksiran') }}" class="block py-2 px-4 rounded-lg text-base font-medium transition-all duration-150 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('petugas.cek-taksiran') ? 'text-blue-600 font-bold bg-blue-50' : 'text-gray-700' }}">Cek Nilai Taksiran</a>
                                <a href="{{ route('petugas.transaksi.create') }}" class="block py-2 px-4 rounded-lg text-base font-medium transition-all duration-150 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('petugas.transaksi.create') ? 'text-blue-600 font-bold bg-blue-50' : 'text-gray-700' }}">Input Data Transaksi</a>
                                <a href="{{ route('petugas.transactions') }}" class="block py-2 px-4 rounded-lg text-base font-medium transition-all duration-150 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('petugas.transactions') ? 'text-blue-600 font-bold bg-blue-50' : 'text-gray-700' }}">Daftar SBG</a>
                            </div>
                        </div>
                        <!-- Menu Nasabah -->
                        <a href="{{ route('petugas.customers') }}" class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200 {{ request()->routeIs('petugas.customers') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-account-group text-2xl"></span>
                            <span class="flex-1">Nasabah</span>
                        </a>
                        <!-- Barang -->
                        <a href="{{ route('petugas.items') }}" class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200 {{ request()->routeIs('petugas.items') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-package-variant text-2xl"></span>
                            <span class="flex-1">Data Barang</span>
                        </a>
                        <!-- Laporan Transaksi -->
                        <a href="{{ route('petugas.reports') }}" class="flex items-center gap-4 pr-6 py-3.5 text-lg rounded-xl transition-all duration-200 {{ request()->routeIs('petugas.reports') ? 'pl-5 bg-blue-100 text-blue-700 font-bold border-l-[6px] border-blue-600 shadow-lg mx-2' : 'pl-8 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium' }}">
                            <span class="mdi mdi-file-chart text-2xl"></span>
                            <span class="flex-1">Laporan Transaksi</span>
                        </a>
                    @else
                        <!-- Optional: menu guest atau redirect ke login -->
                    @endif
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1 ml-72">
                <!-- Top Navigation -->
                <div class="h-16 bg-white shadow-sm flex items-center justify-between px-6 fixed top-0 left-72 right-0 z-20">
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Prototype</span>
                        <span class="mdi mdi-flash text-yellow-500"></span>
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">{{ session('auth.name') }}</span>
                        <form method="POST" action="{{ route(session('auth.role') . '.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-900 flex items-center">
                                <span class="mdi mdi-logout mr-1"></span>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Page Content -->
                <main class="bg-gray-50 min-h-screen p-6 pt-24">
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- Scripts -->
        @stack('scripts')
        @vite(['resources/js/app.js'])
    </body>
</html>
