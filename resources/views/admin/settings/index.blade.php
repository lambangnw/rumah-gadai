@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('page_title', 'Pengaturan Sistem')

@section('sidebar')
    @include('layouts._navigation')
@endsection

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-900">Pengaturan Sistem</h1>
        <p class="mt-1 text-sm text-gray-600">Kelola pengaturan dan konfigurasi Rumah Gadai</p>
    </div>

    <!-- Settings Form -->
    <form action="#" method="POST">
        @csrf
        @method('PUT')

        <!-- Company Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Informasi Perusahaan</h2>
                <p class="mt-1 text-sm text-gray-600">Pengaturan detail informasi perusahaan</p>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Company Name -->
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Perusahaan</label>
                        <input type="text" 
                               id="company_name" 
                               name="company_name" 
                               value="{{ $settings['company_name'] }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Company Email -->
                    <div>
                        <label for="company_email" class="block text-sm font-medium text-gray-700 mb-2">Email Perusahaan</label>
                        <input type="email" 
                               id="company_email" 
                               name="company_email" 
                               value="{{ $settings['company_email'] }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Company Phone -->
                    <div>
                        <label for="company_phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <input type="tel" 
                               id="company_phone" 
                               name="company_phone" 
                               value="{{ $settings['company_phone'] }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Company Address -->
                    <div>
                        <label for="company_address" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea id="company_address" 
                                  name="company_address" 
                                  rows="3"
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">{{ $settings['company_address'] }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loan Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Pengaturan Pinjaman</h2>
                <p class="mt-1 text-sm text-gray-600">Konfigurasi parameter pinjaman dan pembayaran</p>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Interest Rate -->
                    <div>
                        <label for="loan_interest_rate" class="block text-sm font-medium text-gray-700 mb-2">
                            Suku Bunga (%)
                            <span class="text-xs text-gray-500">per bulan</span>
                        </label>
                        <input type="number" 
                               id="loan_interest_rate" 
                               name="loan_interest_rate" 
                               value="{{ $settings['loan_interest_rate'] }}"
                               step="0.1"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Late Payment Fee -->
                    <div>
                        <label for="late_payment_fee" class="block text-sm font-medium text-gray-700 mb-2">
                            Denda Keterlambatan
                            <span class="text-xs text-gray-500">per hari</span>
                        </label>
                        <input type="number" 
                               id="late_payment_fee" 
                               name="late_payment_fee" 
                               value="{{ $settings['late_payment_fee'] }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Max Loan Percentage -->
                    <div>
                        <label for="max_loan_percentage" class="block text-sm font-medium text-gray-700 mb-2">
                            Maksimal Pinjaman (%)
                            <span class="text-xs text-gray-500">dari nilai taksir</span>
                        </label>
                        <input type="number" 
                               id="max_loan_percentage" 
                               name="max_loan_percentage" 
                               value="{{ $settings['max_loan_percentage'] }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Min Loan Duration -->
                    <div>
                        <label for="min_loan_duration" class="block text-sm font-medium text-gray-700 mb-2">
                            Minimal Durasi Pinjaman
                            <span class="text-xs text-gray-500">hari</span>
                        </label>
                        <input type="number" 
                               id="min_loan_duration" 
                               name="min_loan_duration" 
                               value="{{ $settings['min_loan_duration'] }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <!-- Max Loan Duration -->
                    <div>
                        <label for="max_loan_duration" class="block text-sm font-medium text-gray-700 mb-2">
                            Maksimal Durasi Pinjaman
                            <span class="text-xs text-gray-500">hari</span>
                        </label>
                        <input type="number" 
                               id="max_loan_duration" 
                               name="max_loan_duration" 
                               value="{{ $settings['max_loan_duration'] }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end space-x-3">
            <button type="reset" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                Reset
            </button>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-orange-600 rounded-lg hover:bg-orange-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection 