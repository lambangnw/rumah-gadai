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
</head>
<body class="bg-gray-100">
    <!-- Fixed Header -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-orange-600">Rumah Gadai</h1>
                
                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ session('auth.name') }}</span>
                    <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-800">
                            <span class="mdi mdi-logout"></span>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Fixed Sidebar -->
    <aside class="fixed top-16 left-0 w-64 h-full bg-orange-600 text-white overflow-y-auto">
        <nav class="p-4 space-y-2">
            <a href="{{ route('customer.dashboard') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.dashboard') ? 'bg-orange-700 font-bold' : 'hover:bg-orange-700 font-medium' }}">
                <span class="mdi mdi-view-dashboard text-xl"></span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('customer.loans') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.loans') ? 'bg-orange-700 font-bold' : 'hover:bg-orange-700 font-medium' }}">
                <span class="mdi mdi-cash text-xl"></span>
                <span>Pinjaman Saya</span>
            </a>
            <a href="{{ route('customer.payments') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.payments') ? 'bg-orange-700 font-bold' : 'hover:bg-orange-700 font-medium' }}">
                <span class="mdi mdi-history text-xl"></span>
                <span>Riwayat Pembayaran</span>
            </a>
            <a href="{{ route('customer.apply-loan') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.apply-loan') ? 'bg-orange-700 font-bold' : 'hover:bg-orange-700 font-medium' }}">
                <span class="mdi mdi-plus-circle text-xl"></span>
                <span>Ajukan Pinjaman</span>
            </a>
            <a href="{{ route('customer.profile') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.profile') ? 'bg-orange-700 font-bold' : 'hover:bg-orange-700 font-medium' }}">
                <span class="mdi mdi-account-circle text-xl"></span>
                <span>Profil</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="min-h-screen pt-20 pl-64">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</body>
</html>