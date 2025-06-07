@extends('layouts.petugas')

@section('title', 'Daftar SBG')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 max-w-6xl mx-auto p-8 mt-0">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Daftar SBG</h2>
                <p class="text-sm text-gray-500">Semua SBG (Surat Bukti Gadai) yang dikelola petugas.</p>
            </div>
            <div class="flex gap-2">
                <input type="text" placeholder="Cari SBG..." class="form-input w-full md:w-64 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50 text-gray-800" />
                <div class="relative w-full md:w-48">
                    <select class="form-input w-full pr-10 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50 text-gray-800">
                        <option value="">Semua Status</option>
                        <option value="lunas">Lunas</option>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                    </select>
                    <span class="mdi mdi-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></span>
                </div>
                <div class="relative w-full md:w-48">
                    <select class="form-input w-full pr-10 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50 text-gray-800">
                        <option value="">Semua Kategori</option>
                        <option value="elektronik">Elektronik</option>
                        <option value="kendaraan">Kendaraan</option>
                        <option value="perhiasan">Perhiasan</option>
                        <option value="dokumen">Dokumen</option>
                    </select>
                    <span class="mdi mdi-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></span>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. SBG</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Pencairan</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($transactions as $trx)
                    <tr class="hover:bg-orange-50 transition {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-6 py-4 font-mono text-sm text-gray-700">{{ $trx['sbg_no'] }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $trx['customer_name'] }}</td>
                        <td class="px-6 py-4 text-gray-700">
                            <div class="font-semibold text-gray-900">{{ $trx['item_name'] }}</div>
                            <div class="text-xs text-gray-500 mt-1 capitalize">{{ $trx['item_category'] }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-900 w-40">Rp {{ number_format($trx['amount'], 0, ',', '.') }},-</td>
                        <td class="px-6 py-4 text-gray-700">{{ $trx['payment_date'] }}</td>
                        <td class="px-6 py-4">
                            @if($trx['status'] === 'Lunas')
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 border border-orange-200 shadow-sm">Lunas</span>
                            @else
                                <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-500 border border-gray-300 shadow-sm">{{ $trx['status'] }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="#" class="text-orange-600 hover:text-orange-800" title="Detail">
                                    <span class="mdi mdi-eye"></span>
                                </a>
                                <a href="#" class="text-orange-500 hover:text-orange-700" title="Pembayaran">
                                    <span class="mdi mdi-cash-multiple"></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-gray-400 text-lg">
                            <span class="mdi mdi-cash-multiple text-4xl block mb-2"></span>
                            Belum ada data SBG.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection