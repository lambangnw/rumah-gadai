@extends('layouts.admin')

@section('title', 'SBG')

@section('page_title', 'Daftar SBG')

@section('sidebar')
    @include('layouts._navigation')
@endsection

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-900">Daftar SBG</h1>
        <p class="mt-1 text-sm text-gray-600">Kelola semua SBG pinjaman dan pembayaran</p>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
        <div class="p-6">
            <form class="flex w-full gap-3">
                <input type="text" name="search" id="search" placeholder="Cari transaksi..." class="flex-1 pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500" />
                <select name="type" id="type" class="border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    <option value="">Semua Jenis</option>
                    <option value="loan">Pinjaman</option>
                    <option value="payment">Pembayaran</option>
                </select>
                <select name="status" id="status" class="border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    <option value="">Semua Status</option>
                    <option value="completed">Selesai</option>
                    <option value="pending">Menunggu</option>
                    <option value="cancelled">Dibatalkan</option>
                </select>
                <input type="date" name="date" id="date" class="border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500" />
            </form>
        </div>
    </div>

    <!-- Transactions Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. SBG</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Kategori Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nilai Pencairan</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Tanggal Pembayaran</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($transactions as $transaction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-900">{{ $transaction['id'] }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $transaction['customer_name'] }}</td>
                        <td class="px-6 py-4 text-gray-900">
                            @if($transaction['type'] === 'loan')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Pinjaman
                            </span>
                            @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Pembayaran
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-900">{{ $transaction['item_name'] }}</td>
                        <td class="px-6 py-4 text-gray-900">Rp {{ number_format($transaction['amount']) }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $transaction['created_at'] }}</td>
                        <td class="px-6 py-4 text-gray-900">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ ucfirst($transaction['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-orange-600 hover:text-orange-900">
                                <span class="mdi mdi-eye"></span>
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    Menampilkan 1-10 dari 50 data
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50" disabled>
                        Previous
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 