@extends('layouts.app')

@section('title', 'Laporan')

@section('page_title', 'Laporan SBG')

@section('sidebar')
    @include('layouts._navigation')
@endsection

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-900">Laporan SBG</h1>
        <p class="mt-1 text-sm text-gray-600">Ringkasan dan analisis SBG Rumah Gadai</p>
    </div>

    <!-- Monthly Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <!-- Total Loans -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="rounded-full bg-blue-50 p-3">
                    <span class="mdi mdi-cash-multiple text-xl text-blue-600"></span>
                </div>
                <span class="text-sm font-medium text-blue-600">Total Pinjaman</span>
            </div>
            <div class="flex items-baseline">
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($monthly_stats['total_loans']) }}</h3>
                <span class="ml-2 text-sm text-gray-600">pinjaman</span>
            </div>
        </div>

        <!-- Total Loan Amount -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="rounded-full bg-green-50 p-3">
                    <span class="mdi mdi-chart-line text-xl text-green-600"></span>
                </div>
                <span class="text-sm font-medium text-green-600">Nilai Pinjaman</span>
            </div>
            <div class="flex items-baseline">
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($monthly_stats['total_loan_amount'] / 1000000, 1) }}</h3>
                <span class="ml-2 text-sm text-gray-600">juta</span>
            </div>
        </div>

        <!-- Total Payments -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="rounded-full bg-orange-50 p-3">
                    <span class="mdi mdi-credit-card text-xl text-orange-600"></span>
                </div>
                <span class="text-sm font-medium text-orange-600">Total Pembayaran</span>
            </div>
            <div class="flex items-baseline">
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($monthly_stats['total_payments']) }}</h3>
                <span class="ml-2 text-sm text-gray-600">pembayaran</span>
            </div>
        </div>

        <!-- Total Payment Amount -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="rounded-full bg-purple-50 p-3">
                    <span class="mdi mdi-cash-check text-xl text-purple-600"></span>
                </div>
                <span class="text-sm font-medium text-purple-600">Nilai Pembayaran</span>
            </div>
            <div class="flex items-baseline">
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($monthly_stats['total_payment_amount'] / 1000000, 1) }}</h3>
                <span class="ml-2 text-sm text-gray-600">juta</span>
            </div>
        </div>

        <!-- New Customers -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="rounded-full bg-red-50 p-3">
                    <span class="mdi mdi-account-plus text-xl text-red-600"></span>
                </div>
                <span class="text-sm font-medium text-red-600">Nasabah Baru</span>
            </div>
            <div class="flex items-baseline">
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($monthly_stats['new_customers']) }}</h3>
                <span class="ml-2 text-sm text-gray-600">orang</span>
            </div>
        </div>
    </div>

    <!-- Daily Transactions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-900">SBG Harian</h2>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                        Minggu Ini
                    </button>
                    <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                        Bulan Ini
                    </button>
                    <button class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Custom
                    </button>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Pinjaman</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Pinjaman</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Pembayaran</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($daily_transactions as $transaction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $transaction['date'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($transaction['loans']) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            Rp {{ number_format($transaction['loan_amount']) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($transaction['payments']) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            Rp {{ number_format($transaction['payment_amount']) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Total
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ number_format(collect($daily_transactions)->sum('loans')) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Rp {{ number_format(collect($daily_transactions)->sum('loan_amount')) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ number_format(collect($daily_transactions)->sum('payments')) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Rp {{ number_format(collect($daily_transactions)->sum('payment_amount')) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Export Buttons -->
        <div class="p-6 border-t border-gray-100">
            <div class="flex justify-end space-x-3">
                <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    <span class="mdi mdi-microsoft-excel mr-2"></span>
                    Export Excel
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    <span class="mdi mdi-file-pdf-box mr-2"></span>
                    Export PDF
                </button>
            </div>
        </div>
    </div>
</div>
@endsection