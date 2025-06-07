<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    
    @if(session('auth.role') === 'petugas' || session('auth.role') === 'admin')
        <x-nav-link :href="route('item-requests.index')" :active="request()->routeIs('item-requests.*')">
            {{ __('Item Requests') }}
        </x-nav-link>
    @endif
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        @if(session('auth.role') === 'petugas' || session('auth.role') === 'admin')
            <x-responsive-nav-link :href="route('item-requests.index')" :active="request()->routeIs('item-requests.*')">
                {{ __('Item Requests') }}
            </x-responsive-nav-link>
        @endif
    </div>
}