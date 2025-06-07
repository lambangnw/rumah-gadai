@extends('layouts.app')

@section('title', 'Transaksi Baru')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Transaksi Baru</h2>
    </div>

    <form class="space-y-6">
        <!-- Data Nasabah -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Data Nasabah</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                    <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" rows="3"></textarea>
                </div>
            </div>
        </div>

        <!-- Data Barang -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Data Barang</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Barang</label>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="">Pilih Kategori</option>
                        <option value="elektronik">Elektronik</option>
                        <option value="kendaraan">Kendaraan</option>
                        <option value="perhiasan">Perhiasan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Merk/Type</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Pembuatan</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="">Pilih Kondisi</option>
                        <option value="baru">Baru</option>
                        <option value="bekas">Bekas</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" rows="3"></textarea>
                </div>
            </div>
        </div>

        <!-- Foto Barang -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Foto Barang</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <span class="mdi mdi-camera text-3xl text-gray-400"></span>
                    <p class="mt-2 text-sm text-gray-500">Foto Depan</p>
                </div>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <span class="mdi mdi-camera text-3xl text-gray-400"></span>
                    <p class="mt-2 text-sm text-gray-500">Foto Belakang</p>
                </div>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <span class="mdi mdi-camera text-3xl text-gray-400"></span>
                    <p class="mt-2 text-sm text-gray-500">Foto Detail</p>
                </div>
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end space-x-4">
            <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                Batal
            </button>
            <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection 