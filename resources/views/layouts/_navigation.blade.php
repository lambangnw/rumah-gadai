<!-- Navigation Links -->
<nav class="space-y-1.5">
    <!-- Dashboard -->
    <a href="{{ route('admin.dashboard') }}" 
       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
        <span class="mdi mdi-view-dashboard text-[22px] mr-3"></span>
        <span>Dashboard</span>
        @if(request()->routeIs('admin.dashboard'))
            <span class="ml-auto w-1.5 h-6 rounded-full bg-blue-500"></span>
        @endif
    </a>
    
    <!-- Kelola Nasabah -->
    <a href="{{ route('admin.customers.index') }}" 
       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out {{ request()->routeIs('admin.customers.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
        <span class="mdi mdi-account-group text-[22px] mr-3"></span>
        <span>Kelola Nasabah</span>
        @if(request()->routeIs('admin.customers.*'))
            <span class="ml-auto w-1.5 h-6 rounded-full bg-blue-500"></span>
        @endif
    </a>
    
    <!-- SBG -->
    <a href="{{ route('admin.transactions') }}" 
       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out {{ request()->routeIs('admin.transactions') ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
        <span class="mdi mdi-swap-horizontal text-[22px] mr-3"></span>
        <span>SBG</span>
        @if(request()->routeIs('admin.transactions'))
            <span class="ml-auto w-1.5 h-6 rounded-full bg-blue-500"></span>
        @endif
    </a>
    
    <!-- Laporan -->
    <a href="{{ route('admin.reports') }}" 
       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out {{ request()->routeIs('admin.reports') ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
        <span class="mdi mdi-file-chart text-[22px] mr-3"></span>
        <span>Laporan</span>
        @if(request()->routeIs('admin.reports'))
            <span class="ml-auto w-1.5 h-6 rounded-full bg-blue-500"></span>
        @endif
    </a>
    
    <!-- Divider -->
    <div class="border-t border-gray-200 my-4"></div>
    
    <!-- Pengaturan -->
    <a href="{{ route('admin.settings') }}" 
       class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out {{ request()->routeIs('admin.settings') ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
        <span class="mdi mdi-cog text-[22px] mr-3"></span>
        <span>Pengaturan</span>
        @if(request()->routeIs('admin.settings'))
            <span class="ml-auto w-1.5 h-6 rounded-full bg-blue-500"></span>
        @endif
    </a>
</nav> 