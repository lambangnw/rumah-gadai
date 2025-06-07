<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Item Request Details') }}
            </h2>
            <a href="{{ route('item-requests.index') }}" class="text-gray-600 hover:text-gray-900">
                {{ __('Back to List') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Request Information') }}</h3>
                            <dl class="mt-4 space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Item Name') }}</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $itemRequest->item_name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Description') }}</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $itemRequest->description }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Estimated Value') }}</dt>
                                    <dd class="mt-1 text-sm text-gray-900">Rp {{ number_format($itemRequest->estimated_value, 0, ',', '.') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Status') }}</dt>
                                    <dd class="mt-1">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($itemRequest->status === 'approved') bg-green-100 text-green-800
                                            @elseif($itemRequest->status === 'rejected') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">
                                            {{ ucfirst($itemRequest->status) }}
                                        </span>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Submitted By') }}</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $itemRequest->user->name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Submitted At') }}</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $itemRequest->created_at }}</dd>
                                </div>
                            </dl>
                        </div>

                        @if(session('auth.role') === 'admin' && $itemRequest->status === 'pending')
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Admin Action') }}</h3>
                            <form method="POST" action="{{ route('item-requests.update-status', $itemRequest->id) }}" class="mt-4 space-y-4">
                                @csrf
                                @method('PATCH')

                                <div>
                                    <x-input-label for="status" :value="__('Update Status')" />
                                    <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="approved">{{ __('Approve') }}</option>
                                        <option value="rejected">{{ __('Reject') }}</option>
                                    </select>
                                </div>

                                <div>
                                    <x-input-label for="admin_notes" :value="__('Notes')" />
                                    <textarea id="admin_notes" name="admin_notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('admin_notes') }}</textarea>
                                </div>

                                <div class="flex justify-end">
                                    <x-primary-button>
                                        {{ __('Submit Decision') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                        @elseif($itemRequest->admin_notes)
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Admin Notes') }}</h3>
                            <div class="mt-4 text-sm text-gray-900">
                                {{ $itemRequest->admin_notes }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>