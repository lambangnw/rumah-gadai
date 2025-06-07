@extends('layouts.app')

@section('title', 'Cek Nilai Taksiran')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <!-- Stepper -->
    <div class="flex items-center mb-8">
        <div class="flex items-center text-blue-600 font-bold">
            <span class="mdi mdi-package-variant mr-2"></span> Data Barang
        </div>
        <div class="flex-1 border-t-2 border-blue-100 mx-4"></div>
        <div class="flex items-center text-gray-400 font-bold">
            <span class="mdi mdi-cash-multiple mr-2"></span> Taksiran
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Data Barang Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 space-y-6">
            <h2 class="text-xl font-bold text-blue-700 flex items-center gap-2 mb-4">
                <span class="mdi mdi-package-variant"></span> Data Barang
            </h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Kategori Induk Barang</label>
                    <div class="relative">
                        <span class="mdi mdi-shape-outline absolute left-4 top-1/2 -translate-y-1/2 text-blue-300"></span>
                        <select class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                            <option>Elektronik</option>
                            <option>Kendaraan</option>
                            <option>Perhiasan</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Kategori Barang</label>
                    <div class="relative">
                        <span class="mdi mdi-shape-plus absolute left-4 top-1/2 -translate-y-1/2 text-blue-300"></span>
                        <select class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                            <option>Handphone/Ipad/Tab</option>
                            <option>Laptop</option>
                            <option>TV</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Nama Barang</label>
                    <div class="relative">
                        <span class="mdi mdi-tag-outline absolute left-4 top-1/2 -translate-y-1/2 text-blue-300"></span>
                        <input type="text" class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition" placeholder="Apple iPhone X 64GB">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Merk</label>
                    <div class="relative">
                        <span class="mdi mdi-star-outline absolute left-4 top-1/2 -translate-y-1/2 text-blue-300"></span>
                        <input type="text" class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition" placeholder="Apple">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Body HP</label>
                    <div class="relative">
                        <span class="mdi mdi-cellphone-android absolute left-4 top-1/2 -translate-y-1/2 text-blue-300"></span>
                        <select class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                            <option>--Pilih--</option>
                            <option>Normal</option>
                            <option>Lecet</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Charger dan Kabel Data</label>
                    <div class="relative">
                        <span class="mdi mdi-usb absolute left-4 top-1/2 -translate-y-1/2 text-blue-300"></span>
                        <select class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                            <option>--Pilih--</option>
                            <option>Lengkap</option>
                            <option>Tidak Lengkap</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kisaran Harga Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 space-y-6">
            <h2 class="text-xl font-bold text-blue-700 flex items-center gap-2 mb-4">
                <span class="mdi mdi-cash-multiple"></span> Kisaran Harga
            </h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Nilai Taksiran</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 font-bold">Rp</span>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mdi mdi-lock-outline"></span>
                        <input type="text" class="pl-12 pr-10 py-3 w-full rounded-xl border border-gray-200 bg-gray-100 text-gray-400 font-bold text-lg cursor-not-allowed" value="1.800.000" disabled readonly>
                    </div>
                    <div class="text-xs text-gray-400 mt-1">Ditentukan oleh sistem</div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Nilai Jaminan</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 font-bold">Rp</span>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mdi mdi-lock-outline"></span>
                        <input type="text" class="pl-12 pr-10 py-3 w-full rounded-xl border border-gray-200 bg-gray-100 text-gray-400 font-bold text-lg cursor-not-allowed" value="1.800.000" disabled readonly>
                    </div>
                    <div class="text-xs text-gray-400 mt-1">Ditentukan oleh sistem</div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Nilai Pencairan</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 font-bold">Rp</span>
                        <input type="text" class="pl-12 pr-4 py-3 w-full rounded-xl border border-gray-200 shadow focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400 bg-gray-50 transition font-bold text-lg" value="1.800.000">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Jasa Tarif Sewa Modal (%)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 font-bold">%</span>
                        <input type="text" class="pl-12 pr-4 py-3 w-full rounded-xl border border-gray-200 shadow focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400 bg-gray-50 transition font-bold text-lg" value="10">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-blue-600 mb-2">Jasa Tarif Sewa Modal</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 font-bold">Rp</span>
                        <input type="text" class="pl-12 pr-4 py-3 w-full rounded-xl border border-gray-200 shadow focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400 bg-gray-50 transition font-bold text-lg" value="180.000">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 