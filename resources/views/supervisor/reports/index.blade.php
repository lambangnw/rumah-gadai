@extends('layouts.app')

@section('title', 'Laporan Harian')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    <!-- Info: Hanya sebagai referensi -->
    <div class="text-sm text-red-500 font-semibold mb-2">HANYA SEBAGAI REFERENSI, MASIH INPUT LH DAN SO MANUAL</div>
    <!-- Form Informasi Saldo -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 mb-4">
        <form class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
            <div class="flex flex-col gap-2">
                <label class="text-gray-600 font-medium">Cabang</label>
                <select class="rounded-xl border border-gray-200 px-4 py-3 bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>RGJB GATSU.I</option>
                    <option>RGJB CIBIRU</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-600 font-medium">Saldo Awal</label>
                <div class="flex items-center gap-2">
                    <span class="text-gray-500">Rp</span>
                    <input type="text" class="rounded-xl border border-gray-200 px-4 py-3 bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full" value="5.000.000" />
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-600 font-medium">Saldo Akhir</label>
                <div class="flex items-center gap-2">
                    <span class="text-gray-500">Rp</span>
                    <input type="text" class="rounded-xl border border-gray-200 px-4 py-3 bg-gray-100 text-gray-700 w-full" value="10.000.000" readonly />
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-600 font-medium">Tanggal</label>
                <input type="text" class="rounded-xl border border-gray-200 px-4 py-3 bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="28/05/2025" />
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-600 font-medium">Top Up</label>
                <div class="flex items-center gap-2">
                    <span class="text-gray-500">Rp</span>
                    <input type="text" class="rounded-xl border border-gray-200 px-4 py-3 bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full" value="5.000.000" />
                </div>
            </div>
            <div class="flex flex-col gap-2 md:col-span-1">
                <label class="invisible">Simpan</label>
                <button type="button" class="bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow px-6 py-3 hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200 w-full">Simpan Informasi Saldo</button>
            </div>
        </form>
    </div>
    <!-- Tombol Aksi -->
    <div class="flex gap-3 mb-4">
        <button class="bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow px-6 py-3 hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200">Refresh Data LH</button>
        <button class="bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow px-6 py-3 hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200">Download LH</button>
    </div>
    <!-- Tabel Rekap -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">No.</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Tanggal</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. SBG Lama</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. SBG Baru</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status Transaksi</th>
                    <th class="px-4 py-3 text-right text-xs font-bold text-gray-600 uppercase">Pencairan</th>
                    <th class="px-4 py-3 text-right text-xs font-bold text-gray-600 uppercase">Pembayaran Pokok</th>
                    <th class="px-4 py-3 text-right text-xs font-bold text-gray-600 uppercase">Pembayaran Jasa</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr>
                    <td class="px-4 py-3 text-gray-700">1</td>
                    <td class="px-4 py-3 text-gray-700">28 Mei 2025 (16.28)</td>
                    <td class="px-4 py-3 text-gray-700">RGJB GATSU.1-20231223-38488</td>
                    <td class="px-4 py-3 text-gray-700">-</td>
                    <td class="px-4 py-3 text-gray-700">Perpanjangan</td>
                    <td class="px-4 py-3 text-right text-gray-900">0</td>
                    <td class="px-4 py-3 text-right text-gray-900">0</td>
                    <td class="px-4 py-3 text-right text-gray-900">3.600.000</td>
                </tr>
                <tr class="bg-blue-50">
                    <td class="px-4 py-3 text-gray-700">2</td>
                    <td class="px-4 py-3 text-gray-700">28 Mei 2025 (16.29)</td>
                    <td class="px-4 py-3 text-gray-700">RGJB GATSU.1-20231223-38488</td>
                    <td class="px-4 py-3 text-gray-700">-</td>
                    <td class="px-4 py-3 text-gray-700">Perpanjangan</td>
                    <td class="px-4 py-3 text-right text-gray-900">0</td>
                    <td class="px-4 py-3 text-right text-gray-900">0</td>
                    <td class="px-4 py-3 text-right text-gray-900">200.000</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 text-gray-700">3</td>
                    <td class="px-4 py-3 text-gray-700">28 Mei 2025 (16.31)</td>
                    <td class="px-4 py-3 text-gray-700">RGJB GATSU.1-20231223-38488</td>
                    <td class="px-4 py-3 text-gray-700">RGJB GATSU.1-20250528-44174</td>
                    <td class="px-4 py-3 text-gray-700">Pelunasan Sebagian</td>
                    <td class="px-4 py-3 text-right text-gray-900">0</td>
                    <td class="px-4 py-3 text-right text-gray-900">50.000</td>
                    <td class="px-4 py-3 text-right text-gray-900">200.000</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 text-gray-700">4</td>
                    <td class="px-4 py-3 text-gray-700">28 Mei 2025 (16.33)</td>
                    <td class="px-4 py-3 text-gray-700">RGJB GATSU.1-20250528-44174</td>
                    <td class="px-4 py-3 text-gray-700">-</td>
                    <td class="px-4 py-3 text-gray-700">Lunas</td>
                    <td class="px-4 py-3 text-right text-gray-900">0</td>
                    <td class="px-4 py-3 text-right text-gray-900">1.950.000</td>
                    <td class="px-4 py-3 text-right text-gray-900">195.000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Card Rekap Bawah -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">
            <table class="min-w-full">
                <tbody>
                    <tr>
                        <td class="text-gray-600 py-2">Total Pencairan</td>
                        <td class="text-right font-bold text-gray-900">0</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Pokok Pelunasan</td>
                        <td class="text-right font-bold text-gray-900">1.950.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Pokok Pelunasan Sebagian</td>
                        <td class="text-right font-bold text-gray-900">50.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Jasa Pelunasan</td>
                        <td class="text-right font-bold text-gray-900">195.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Jasa Pelunasan Sebagian</td>
                        <td class="text-right font-bold text-gray-900">200.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Jasa Perpanjangan</td>
                        <td class="text-right font-bold text-gray-900">3.800.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">
            <table class="min-w-full">
                <tbody>
                    <tr>
                        <td class="text-gray-600 py-2">Total Pokok</td>
                        <td class="text-right font-bold text-gray-900">2.000.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Jasa</td>
                        <td class="text-right font-bold text-gray-900">4.195.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Pokok + Jasa</td>
                        <td class="text-right font-bold text-gray-900">6.195.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Transaksi Gadai Baru</td>
                        <td class="text-right font-bold text-gray-900">0</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Transaksi Perpanjangan</td>
                        <td class="text-right font-bold text-gray-900">2</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Transaksi Pelunasan</td>
                        <td class="text-right font-bold text-gray-900">1</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 py-2">Total Transaksi Pelunasan Sebagian</td>
                        <td class="text-right font-bold text-gray-900">1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 