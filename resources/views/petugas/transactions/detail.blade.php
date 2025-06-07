@extends('layouts.petugas')

@section('title', 'Pembayaran SBG')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 max-w-4xl mx-auto p-8 mt-0">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Data Pembayaran {{ $sbgDetail['sbg_no'] }}</h2>
                <p class="text-sm text-gray-500">Form pembayaran SBG</p>
            </div>
            <a href="{{ route('petugas.transactions') }}" class="text-gray-600 hover:text-gray-800">
                <span class="mdi mdi-arrow-left text-xl"></span>
            </a>
        </div>

        <!-- Data Pembayaran Section -->
        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">DATA PEMBAYARAN</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nominal Pinjaman Awal</span>
                        <span class="font-semibold text-gray-800">Rp {{ number_format($sbgDetail['nominal_pinjaman_awal'], 0, ',', '.') }},-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Sisa Pinjaman Pokok</span>
                        <span class="font-semibold text-gray-800">Rp {{ number_format($sbgDetail['sisa_pinjaman_pokok'], 0, ',', '.') }},-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status</span>
                        @if($sbgDetail['status'] === 'Lunas')
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 border border-green-200">{{ $sbgDetail['status'] }}</span>
                        @elseif($sbgDetail['status'] === 'Lunas Sebagian')
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200">{{ $sbgDetail['status'] }}</span>
                        @elseif($sbgDetail['status'] === 'Perpanjang')
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 border border-blue-200">{{ $sbgDetail['status'] }}</span>
                        @elseif($sbgDetail['status'] === 'Aktif')
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 border border-orange-200">{{ $sbgDetail['status'] }}</span>
                        @elseif($sbgDetail['status'] === 'Batal')
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 border border-red-200">{{ $sbgDetail['status'] }}</span>
                        @else
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-500 border border-gray-300">{{ $sbgDetail['status'] }}</span>
                        @endif
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal Jatuh Tempo</span>
                        <span class="font-semibold text-gray-800">{{ $sbgDetail['tanggal_jatuh_tempo'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3 mb-6 justify-center">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                Perpanjangan
            </button>
            <a href="{{ route('petugas.transactions.pelunasan-sebagian', $sbgDetail['sbg_no']) }}" class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-2 rounded-lg font-medium transition-colors inline-block text-center">
                Pelunasan Sebagian (Cicilan)
            </a>
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                Pelunasan Penuh
            </button>
        </div>

        <!-- Timeline Pembayaran -->
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6 text-center">TIMELINE PEMBAYARAN</h3>
            
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TANGGAL</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">STATUS</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PEMBAYARAN JASA</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PEMBAYARAN POKOK</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PRINT SURAT BUKTI</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($sbgDetail['timeline'] as $timeline)
                        <tr>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $timeline['tanggal'] }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                @if($timeline['status'] === 'Gadai Baru')
                                    <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-purple-100 text-purple-700 border border-purple-200">{{ $timeline['status'] }}</span>
                                @elseif($timeline['status'] === 'Lunas')
                                    <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 border border-green-200">{{ $timeline['status'] }}</span>
                                @elseif($timeline['status'] === 'Lunas Sebagian')
                                    <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200">{{ $timeline['status'] }}</span>
                                @elseif($timeline['status'] === 'Perpanjang')
                                    <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 border border-blue-200">{{ $timeline['status'] }}</span>
                                @elseif($timeline['status'] === 'Aktif')
                                    <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 border border-orange-200">{{ $timeline['status'] }}</span>
                                @else
                                    <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-500 border border-gray-300">{{ $timeline['status'] }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $timeline['pembayaran_jasa'] }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $timeline['pembayaran_pokok'] }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors">
                                    Print
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection