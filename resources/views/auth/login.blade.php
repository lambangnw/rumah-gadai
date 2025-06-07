<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center mt-4">
        <a href="{{ route('admin.login') }}" onclick="event.preventDefault(); document.getElementById('auto-login-form').submit();" class="inline-flex items-center px-8 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-lg text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Login to Dashboard') }}
        </a>
    </div>

    <form id="auto-login-form" action="{{ route('admin.login') }}" method="POST" style="display: none;">
        @csrf
    </form>
</x-guest-layout>
