@extends('layouts.app')

@section('title', 'Tambah Nasabah')

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg border border-gray-200 p-10">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tambah Nasabah</h2>
    <form action="#" method="POST" class="space-y-8">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-xs font-semibold text-blue-600 mb-2">Nama</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan nama nasabah" required>
            </div>
            <div>
                <label for="nik" class="block text-xs font-semibold text-blue-600 mb-2">NIK</label>
                <input type="text" name="nik" id="nik" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan NIK" required>
            </div>
            <div>
                <label for="email" class="block text-xs font-semibold text-blue-600 mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan email" required>
            </div>
            <div>
                <label for="phone" class="block text-xs font-semibold text-blue-600 mb-2">No. HP</label>
                <input type="text" name="phone" id="phone" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan nomor HP" required>
            </div>
            <div>
                <label for="npwp" class="block text-xs font-semibold text-blue-600 mb-2">NPWP <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="text" name="npwp" id="npwp" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan NPWP">
            </div>
        </div>

        <!-- Alamat KTP -->
        <div class="mt-8">
            <h3 class="text-lg font-bold text-blue-700 mb-2">Alamat KTP</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="address_ktp" class="block text-xs font-semibold text-blue-600 mb-2">Alamat</label>
                    <input type="text" name="address_ktp" id="address_ktp" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Alamat sesuai KTP" required>
                </div>
                <div>
                    <label for="province_ktp" class="block text-xs font-semibold text-blue-600 mb-2">Provinsi KTP</label>
                    <select name="province_ktp" id="province_ktp" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Provinsi</option>
                        <option value="JAWA BARAT">JAWA BARAT</option>
                        <option value="DKI JAKARTA">DKI JAKARTA</option>
                    </select>
                </div>
                <div>
                    <label for="city_ktp" class="block text-xs font-semibold text-blue-600 mb-2">Kota KTP</label>
                    <select name="city_ktp" id="city_ktp" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Kota</option>
                        <option value="KOTA TASIKMALAYA">KOTA TASIKMALAYA</option>
                    </select>
                </div>
                <div>
                    <label for="district_ktp" class="block text-xs font-semibold text-blue-600 mb-2">Kecamatan KTP</label>
                    <select name="district_ktp" id="district_ktp" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Kecamatan</option>
                        <option value="INDIHIANG">INDIHIANG</option>
                    </select>
                </div>
                <div>
                    <label for="village_ktp" class="block text-xs font-semibold text-blue-600 mb-2">Kelurahan KTP</label>
                    <select name="village_ktp" id="village_ktp" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Kelurahan</option>
                        <option value="PANYINGKIRAN">PANYINGKIRAN</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Alamat Sekarang -->
        <div class="mt-8">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-bold text-blue-700">Alamat Sekarang</h3>
                <button type="button" class="btn-secondary px-4 py-2 rounded-lg text-xs font-semibold" onclick="salinAlamatKTP()">Salin Alamat KTP</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="address_now" class="block text-xs font-semibold text-blue-600 mb-2">Alamat</label>
                    <input type="text" name="address_now" id="address_now" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Alamat domisili sekarang" required>
                </div>
                <div>
                    <label for="province_now" class="block text-xs font-semibold text-blue-600 mb-2">Provinsi Sekarang</label>
                    <select name="province_now" id="province_now" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Provinsi</option>
                        <option value="JAWA BARAT">JAWA BARAT</option>
                        <option value="DKI JAKARTA">DKI JAKARTA</option>
                    </select>
                </div>
                <div>
                    <label for="city_now" class="block text-xs font-semibold text-blue-600 mb-2">Kota Sekarang</label>
                    <select name="city_now" id="city_now" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Kota</option>
                        <option value="KOTA TASIKMALAYA">KOTA TASIKMALAYA</option>
                    </select>
                </div>
                <div>
                    <label for="district_now" class="block text-xs font-semibold text-blue-600 mb-2">Kecamatan Sekarang</label>
                    <select name="district_now" id="district_now" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Kecamatan</option>
                        <option value="INDIHIANG">INDIHIANG</option>
                    </select>
                </div>
                <div>
                    <label for="village_now" class="block text-xs font-semibold text-blue-600 mb-2">Kelurahan Sekarang</label>
                    <select name="village_now" id="village_now" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition">
                        <option value="">Pilih Kelurahan</option>
                        <option value="PANYINGKIRAN">PANYINGKIRAN</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Kontak Darurat -->
        <div class="mt-8">
            <h3 class="text-lg font-bold text-blue-700 mb-2">Kontak Darurat</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="emergency_name" class="block text-xs font-semibold text-blue-600 mb-2">Nama yang Dapat Dihubungi</label>
                    <input type="text" name="emergency_name" id="emergency_name" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Nama kontak darurat" required>
                </div>
                <div>
                    <label for="emergency_phone" class="block text-xs font-semibold text-blue-600 mb-2">Nomor Darurat</label>
                    <input type="text" name="emergency_phone" id="emergency_phone" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Nomor HP kontak darurat" required>
                </div>
                <div>
                    <label for="emergency_relation" class="block text-xs font-semibold text-blue-600 mb-2">Status Hubungan</label>
                    <select name="emergency_relation" id="emergency_relation" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800 transition" required>
                        <option value="">Pilih Hubungan</option>
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Saudara Kandung">Saudara Kandung</option>
                        <option value="Pasangan">Pasangan</option>
                        <option value="Teman">Teman</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-3 justify-end mt-8">
            <a href="{{ route('supervisor.customers.index') }}" class="inline-flex items-center justify-center gap-2 border-2 border-black text-black bg-white font-semibold rounded-xl px-6 py-3 w-full md:w-auto hover:bg-gray-100 transition">Batal</a>
            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold rounded-xl shadow px-8 py-3 hover:from-blue-700 hover:to-blue-500 hover:scale-105 transition-all duration-200 w-full md:w-auto">Simpan</button>
        </div>
    </form>
</div>

<script>
function salinAlamatKTP() {
    document.getElementById('address_now').value = document.getElementById('address_ktp').value;
    document.getElementById('province_now').value = document.getElementById('province_ktp').value;
    document.getElementById('city_now').value = document.getElementById('city_ktp').value;
    document.getElementById('district_now').value = document.getElementById('district_ktp').value;
    document.getElementById('village_now').value = document.getElementById('village_ktp').value;
}
</script>
@endsection 