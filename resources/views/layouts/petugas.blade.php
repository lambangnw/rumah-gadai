<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Rumah Gadai Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{ sidebarOpen: true }">
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
               class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-200 ease-in-out md:translate-x-0">
            <!-- Logo -->
            <div class="flex items-center h-16 px-6 border-b border-gray-100">
                <div class="flex items-center flex-shrink-0">
                    <img src="/logo.png" alt="Logo" class="h-8 w-8">
                    <span class="ml-3 text-lg font-semibold text-gray-900">Rumah Gadai</span>
                </div>
                <button @click="sidebarOpen = false" class="md:hidden ml-auto text-gray-500 hover:text-gray-600">
                    <span class="mdi mdi-close text-2xl"></span>
                </button>
            </div>

            <!-- Navigation -->
            <div class="px-3 py-4">
                @include('layouts.navigation.petugas')
            </div>

            <!-- User Info -->
            <div class="absolute bottom-0 left-0 right-0 border-t border-gray-100">
                <div class="px-4 py-4">
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Petugas&background=ff6b00&color=fff" 
                             alt="Profile" 
                             class="h-10 w-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Petugas</p>
                            <p class="text-xs text-gray-500">petugas@rumahgadai.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div :class="{ 'md:pl-64': sidebarOpen }" class="flex flex-col min-h-screen transition-all duration-200">
            <!-- Top Bar -->
            <header class="z-40 bg-white shadow-sm">
                <div class="flex items-center justify-between h-16 px-4 md:px-6">
                    <!-- Mobile Menu Button -->
                    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-500 hover:text-gray-600">
                        <span class="mdi mdi-menu text-2xl"></span>
                    </button>

                    <!-- Page Title -->
                    <h1 class="text-xl font-semibold text-gray-900">@yield('page_title')</h1>

                    <!-- Right Side Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-1 text-gray-500 hover:text-gray-600 hover:bg-gray-100 rounded-full">
                            <span class="mdi mdi-bell text-xl"></span>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Quick Actions -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" 
                                    class="p-1 text-gray-500 hover:text-gray-600 hover:bg-gray-100 rounded-full">
                                <span class="mdi mdi-dots-vertical text-xl"></span>
                            </button>

                            <div x-show="open" 
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <span class="mdi mdi-account-circle mr-2"></span>
                                    Profile
                                </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <span class="mdi mdi-cog mr-2"></span>
                                    Settings
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('petugas.logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-50 w-full text-left">
                                        <span class="mdi mdi-logout mr-2"></span>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 py-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-100 py-4">
                <div class="px-6 text-center text-sm text-gray-600">
                    &copy; {{ date('Y') }} Rumah Gadai. All rights reserved.
                </div>
            </footer>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>