@extends('layouts.app')

@section('title', 'Data Nasabah')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 space-y-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-2">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Data Nasabah</h2>
                <p class="text-gray-500 text-sm">Daftar nasabah yang terdaftar di sistem.</p>
            </div>
            <a href="{{ route('supervisor.customers.create') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow-lg hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200 text-lg">
                <span class="mdi mdi-account-plus text-2xl"></span> Tambah Nasabah
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 rounded-2xl shadow-lg border border-gray-200 bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. HP</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Terdaftar</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($customers as $customer)
                    <tr class="hover:bg-blue-50 transition {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $customer['name'] }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $customer['email'] }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $customer['phone'] }}</td>
                        <td class="px-6 py-4">
                            @if($customer['status'] === 'active')
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 border border-green-200 shadow-sm">Aktif</span>
                            @else
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-500 border border-gray-300 shadow-sm">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $customer['registered_at'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800" title="Detail">
                                    <span class="mdi mdi-eye"></span>
                                </a>
                                <a href="#" class="text-blue-600 hover:text-blue-800" title="Edit">
                                    <span class="mdi mdi-pencil"></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-gray-400 text-lg">
                            <span class="mdi mdi-account-group text-4xl block mb-2"></span>
                            Belum ada data nasabah.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 