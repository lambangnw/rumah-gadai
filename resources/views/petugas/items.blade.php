@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 rounded-lg p-4 flex items-center gap-3">
        <span class="mdi mdi-check-circle text-green-600 text-xl"></span>
        <span class="text-green-800 font-medium">{{ session('success') }}</span>
    </div>
    @endif
    
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 space-y-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-2">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Data Barang</h2>
                <p class="text-gray-500 text-sm">Daftar data barang gadai yang tercatat.</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('petugas.ajukan-barang') }}" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg">
                    <span class="mdi mdi-plus"></span>
                    Ajukan Barang
                </a>
            </div>
        </div>
        <!-- Filter & Search -->
        <div class="flex flex-col md:flex-row gap-3 items-center bg-white p-4 rounded-xl shadow border border-gray-100">
            <div class="flex-1 flex flex-col sm:flex-row gap-3 w-full">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                        <span class="mdi mdi-magnify text-blue-500 text-xl"></span>
                    </span>
                    <input type="text" placeholder="Cari barang..."
                        class="pl-12 pr-4 py-3 w-full rounded-xl border border-gray-200 shadow focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400 bg-gray-50 transition" />
                </div>
                <select class="rounded-xl border border-gray-200 shadow px-4 pr-10 py-3 bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none">
                    <option value="">Semua Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="kendaraan">Kendaraan</option>
                    <option value="perhiasan">Perhiasan</option>
                </select>
                <select class="rounded-xl border border-gray-200 shadow px-4 pr-10 py-3 bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none">
                    <option value="">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                </select>
            </div>
        </div>
        <!-- Items Table -->
        <div class="card overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 rounded-2xl shadow-lg border border-gray-200 bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Harga Taksir</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($items as $item)
                    <tr class="hover:bg-blue-50 transition {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-6 py-4 font-mono text-sm text-gray-700">{{ $item['code'] }}</td>
                        <td class="px-6 py-4">
                            <div>
                                <div class="text-base font-bold text-gray-900 leading-tight">{{ $item['name'] }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $item['brand'] ?? '-' }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $brand = strtolower($item['specification'] ?? '');
                                $name = strtolower($item['name'] ?? '');
                                $subKategori = '-';
                                if($item['category'] === 'elektronik') {
                                    if(str_contains($brand, 'apple') || str_contains($name, 'iphone')) {
                                        $subKategori = 'HP';
                                    } elseif(str_contains($brand, 'asus') || str_contains($name, 'rog') || str_contains($name, 'macbook')) {
                                        $subKategori = 'Laptop';
                                    } elseif(str_contains($name, 'tv')) {
                                        $subKategori = 'TV';
                                    }
                                } elseif($item['category'] === 'kendaraan') {
                                    if(str_contains($brand, 'honda') || str_contains($brand, 'kawasaki') || str_contains($name, 'vario') || str_contains($name, 'pcx') || str_contains($name, 'ninja')) {
                                        $subKategori = 'Motor';
                                    }
                                } elseif($item['category'] === 'perhiasan') {
                                    if(str_contains($brand, 'tiffany') || str_contains($brand, 'berlian') || str_contains($brand, 'emas') || str_contains($name, 'emas')) {
                                        $subKategori = 'Emas';
                                    }
                                }
                            @endphp
                            @if($item['category'] === 'elektronik')
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 border border-blue-200 shadow">Elektronik</span>
                            @elseif($item['category'] === 'kendaraan')
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200 shadow">Kendaraan</span>
                            @elseif($item['category'] === 'dokumen')
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200 shadow">Dokumen</span>
                            @else
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 border border-green-200 shadow">Perhiasan</span>
                            @endif
                            <div class="text-xs text-gray-500 mt-1">{{ $subKategori }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-900">Rp {{ number_format($item['estimated_value'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @if($item['status'] === 'active')
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 border border-green-200 shadow-sm">Aktif</span>
                            @else
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-500 border border-gray-300 shadow-sm">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="#" class="text-blue-600 hover:text-blue-800" title="Detail">
                                    <span class="mdi mdi-eye"></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-gray-400 text-lg">
                            <span class="mdi mdi-package-variant text-4xl block mb-2"></span>
                            Belum ada data barang.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4">
            <div class="text-sm text-gray-700">
                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">{{ count($items) }}</span> dari <span class="font-medium">{{ count($items) }}</span> data
            </div>
            <div class="flex gap-2">
                <button class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200 text-base opacity-50 cursor-not-allowed" disabled>
                    <span class="mdi mdi-chevron-left text-xl"></span> Sebelumnya
                </button>
                <button class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200 text-base disabled:opacity-50 disabled:cursor-not-allowed">
                    Selanjutnya <span class="mdi mdi-chevron-right text-xl"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection