@extends('layouts.app')

@section('title', 'Input Transaksi Gadai')

@section('content')
<div class="max-w-4xl mx-auto" x-data="transaksiData()">
    <!-- Header dengan Progress Indicator -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-6 mb-8 text-white">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Input Transaksi Gadai</h1>
            <div class="bg-white/20 rounded-lg px-4 py-2">
                <span class="text-sm font-medium">Langkah <span x-text="currentStep"></span> dari 4</span>
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="flex items-center space-x-4">
            <div class="flex-1 bg-white/20 rounded-full h-2">
                <div class="bg-white rounded-full h-2 transition-all duration-500" :style="`width: ${(currentStep / 4) * 100}%`"></div>
            </div>
        </div>
        
        <!-- Step Indicators -->
        <div class="flex justify-between mt-4 text-sm">
            <div class="flex items-center space-x-2" :class="currentStep >= 1 ? 'text-white' : 'text-white/60'">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" :class="currentStep >= 1 ? 'bg-white text-blue-600' : 'bg-white/20'">
                    <span class="mdi mdi-account text-lg"></span>
                </div>
                <span class="hidden sm:inline">Pilih Nasabah</span>
            </div>
            <div class="flex items-center space-x-2" :class="currentStep >= 2 ? 'text-white' : 'text-white/60'">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" :class="currentStep >= 2 ? 'bg-white text-blue-600' : 'bg-white/20'">
                    <span class="mdi mdi-package-variant text-lg"></span>
                </div>
                <span class="hidden sm:inline">Pilih Barang</span>
            </div>
            <div class="flex items-center space-x-2" :class="currentStep >= 3 ? 'text-white' : 'text-white/60'">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" :class="currentStep >= 3 ? 'bg-white text-blue-600' : 'bg-white/20'">
                    <span class="mdi mdi-calculator text-lg"></span>
                </div>
                <span class="hidden sm:inline">Hitung Pinjaman</span>
            </div>
            <div class="flex items-center space-x-2" :class="currentStep >= 4 ? 'text-white' : 'text-white/60'">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" :class="currentStep >= 4 ? 'bg-white text-blue-600' : 'bg-white/20'">
                    <span class="mdi mdi-check text-lg"></span>
                </div>
                <span class="hidden sm:inline">Konfirmasi</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100" x-show="currentStep >= 1">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="mdi mdi-account-search text-blue-600 text-xl"></span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Pilih Nasabah</h3>
                                <p class="text-sm text-gray-600">Cari dan pilih nasabah untuk transaksi</p>
                            </div>
                        </div>
                        <template x-if="nasabah">
                            <div class="flex items-center space-x-2 bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                <span class="mdi mdi-check-circle text-sm"></span>
                                <span class="text-sm font-medium">Terpilih</span>
                            </div>
                        </template>
                    </div>
                </div>
                
                <div class="p-6 relative overflow-visible">
                    <div class="relative">
                        <span class="mdi mdi-magnify absolute left-4 top-4 text-gray-400 text-xl"></span>
                        <input type="text" 
                               class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                               placeholder="Ketik nama atau NIK nasabah..." 
                               x-model="nasabahInput" 
                               @input="nasabah = ''" 
                               autocomplete="off">
                        
                        <template x-if="filteredNasabah().length && !nasabah">
                            <div class="absolute left-0 right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-xl z-50 max-h-64 overflow-y-auto">
                                <template x-for="n in filteredNasabah()" :key="n.id">
                                    <div @click="pilihNasabahById(n.id)" class="px-4 py-4 cursor-pointer hover:bg-blue-50 border-b border-gray-100 last:border-b-0 transition-colors duration-150">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="mdi mdi-account text-blue-600"></span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-semibold text-gray-800" x-text="n.nama"></h4>
                                                <p class="text-sm text-gray-600" x-text="n.nik"></p>
                                                <p class="text-xs text-gray-500 mt-1" x-text="n.alamat"></p>
                                                <p class="text-xs text-gray-500" x-text="n.telepon"></p>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                    
                    <!-- Selected Nasabah Info -->
                    <template x-if="nasabah">
                        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="mdi mdi-account-check text-green-600 text-xl"></span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-green-800" x-text="nasabahList.find(n => n.id == nasabah)?.nama"></h4>
                                    <p class="text-sm text-green-700" x-text="nasabahList.find(n => n.id == nasabah)?.nik"></p>
                                    <p class="text-xs text-green-600 mt-1" x-text="nasabahList.find(n => n.id == nasabah)?.alamat"></p>
                                </div>
                                <button @click="nasabah = ''; nasabahInput = ''; currentStep = 1" class="text-green-600 hover:text-green-800">
                                    <span class="mdi mdi-pencil"></span>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <!-- Step 2: Cari Barang -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100" x-show="currentStep >= 2" :class="!nasabah ? 'opacity-50 pointer-events-none' : ''">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="mdi mdi-package-variant text-purple-600 text-xl"></span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Pilih Barang Jaminan</h3>
                                <p class="text-sm text-gray-600">Cari dan pilih barang yang akan digadaikan</p>
                            </div>
                        </div>
                        <template x-if="barang">
                            <div class="flex items-center space-x-2 bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                <span class="mdi mdi-check-circle text-sm"></span>
                                <span class="text-sm font-medium">Terpilih</span>
                            </div>
                        </template>
                    </div>
                </div>
                
                <div class="p-6 relative overflow-visible">
                    <div class="relative">
                        <span class="mdi mdi-magnify absolute left-4 top-4 text-gray-400 text-xl"></span>
                        <input type="text" 
                               class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200" 
                               placeholder="Ketik nama atau merk barang..." 
                               x-model="barangInput" 
                               @input="barang = ''" 
                               :disabled="!nasabah" 
                               autocomplete="off">
                        
                        <template x-if="filteredBarang().length && !barang && nasabah">
                            <div class="absolute left-0 right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-xl z-50 max-h-64 overflow-y-auto">
                                <template x-for="b in filteredBarang()" :key="b.id">
                                    <div @click="pilihBarangById(b.id)" class="px-4 py-4 cursor-pointer hover:bg-purple-50 border-b border-gray-100 last:border-b-0 transition-colors duration-150">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="mdi mdi-tag-outline text-purple-600"></span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2 mb-1">
                                                    <h4 class="font-semibold text-gray-800" x-text="b.nama"></h4>
                                                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full" x-text="b.kategori"></span>
                                                </div>
                                                <p class="text-sm text-gray-600" x-text="b.merk"></p>
                                                <div class="flex items-center justify-between mt-2">
                                                    <span class="text-xs text-gray-500" x-text="'Kondisi: ' + b.kondisi"></span>
                                                    <span class="text-sm font-semibold text-green-600" x-text="'Rp ' + b.taksir.toLocaleString('id-ID')"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                    
                    <!-- Selected Barang Info -->
                    <template x-if="barang">
                        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="mdi mdi-package-check text-green-600 text-xl"></span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-1">
                                        <h4 class="font-semibold text-green-800" x-text="barangList.find(b => b.id == barang)?.nama"></h4>
                                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full" x-text="barangList.find(b => b.id == barang)?.kategori"></span>
                                    </div>
                                    <p class="text-sm text-green-700" x-text="barangList.find(b => b.id == barang)?.merk"></p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="text-xs text-green-600" x-text="'Kondisi: ' + barangList.find(b => b.id == barang)?.kondisi"></span>
                                        <span class="text-sm font-semibold text-green-800" x-text="'Nilai Taksir: Rp ' + barangList.find(b => b.id == barang)?.taksir.toLocaleString('id-ID')"></span>
                                    </div>
                                </div>
                                <button @click="barang = ''; barangInput = ''; nilaiTaksir = ''; jumlahPinjaman = ''; currentStep = 2" class="text-green-600 hover:text-green-800">
                                    <span class="mdi mdi-pencil"></span>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Step 3: Perhitungan Pinjaman -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" x-show="currentStep >= 3" :class="!barang ? 'opacity-50 pointer-events-none' : ''">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="mdi mdi-calculator text-green-600 text-xl"></span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Perhitungan Pinjaman</h3>
                            <p class="text-sm text-gray-600">Atur jumlah pinjaman dan tenor</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 space-y-6">
                    <!-- Nilai Taksiran -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nilai Taksiran</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-gray-500 text-sm">Rp</span>
                            <input type="text" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-gray-50 text-gray-600 cursor-not-allowed" 
                                   :value="barang ? nilaiTaksir.toLocaleString('id-ID') : ''" 
                                   readonly disabled>
                            <span class="absolute right-4 top-4 mdi mdi-lock text-gray-400"></span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Nilai taksiran ditentukan berdasarkan kondisi dan harga pasar</p>
                    </div>
                    
                    <!-- Jumlah Pinjaman -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Pinjaman (Maks. 80% dari nilai taksir)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-gray-500 text-sm">Rp</span>
                            <input type="number" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500" 
                                   x-model="jumlahPinjaman"
                                   :max="Math.floor(nilaiTaksir * 0.8)"
                                   :disabled="!barang"
                                   @input="currentStep = jumlahPinjaman ? 4 : 3"
                                   placeholder="Masukkan jumlah pinjaman">
                        </div>
                        <div class="flex justify-between text-xs text-gray-500 mt-1">
                            <span>Minimum: Rp 100.000</span>
                            <span x-show="nilaiTaksir">Maksimum: Rp <span x-text="Math.floor(nilaiTaksir * 0.8).toLocaleString('id-ID')"></span></span>
                        </div>
                    </div>
                    
                    <!-- Tenor -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tenor Pinjaman</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button @click="tenor = '30'" 
                                    class="p-3 border rounded-xl text-center transition-all duration-200" 
                                    :class="tenor === '30' ? 'border-green-500 bg-green-50 text-green-700' : 'border-gray-200 hover:border-green-300'">
                                <div class="font-semibold">30 Hari</div>
                                <div class="text-xs text-gray-500">1 Bulan</div>
                            </button>
                            <button @click="tenor = '60'" 
                                    class="p-3 border rounded-xl text-center transition-all duration-200" 
                                    :class="tenor === '60' ? 'border-green-500 bg-green-50 text-green-700' : 'border-gray-200 hover:border-green-300'">
                                <div class="font-semibold">60 Hari</div>
                                <div class="text-xs text-gray-500">2 Bulan</div>
                            </button>
                            <button @click="tenor = '90'" 
                                    class="p-3 border rounded-xl text-center transition-all duration-200" 
                                    :class="tenor === '90' ? 'border-green-500 bg-green-50 text-green-700' : 'border-gray-200 hover:border-green-300'">
                                <div class="font-semibold">90 Hari</div>
                                <div class="text-xs text-gray-500">3 Bulan</div>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Bunga -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium text-blue-800">Suku Bunga</h4>
                                <p class="text-sm text-blue-600">Per bulan</p>
                            </div>
                            <div class="text-2xl font-bold text-blue-800" x-text="bunga + '%'"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar - Ringkasan Transaksi -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 sticky top-6">
                <div class="bg-gradient-to-r from-orange-50 to-red-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">Ringkasan Transaksi</h3>
                    <p class="text-sm text-gray-600">Detail pinjaman gadai</p>
                </div>
                
                <div class="p-6 space-y-4">
                    <!-- Nasabah Info -->
                    <div class="space-y-2">
                        <h4 class="font-medium text-gray-700 flex items-center">
                            <span class="mdi mdi-account text-blue-500 mr-2"></span>
                            Nasabah
                        </h4>
                        <template x-if="nasabah">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <p class="font-semibold text-gray-800" x-text="nasabahList.find(n => n.id == nasabah)?.nama"></p>
                                <p class="text-sm text-gray-600" x-text="nasabahList.find(n => n.id == nasabah)?.nik"></p>
                            </div>
                        </template>
                        <template x-if="!nasabah">
                            <p class="text-sm text-gray-400 italic">Belum dipilih</p>
                        </template>
                    </div>
                    
                    <!-- Barang Info -->
                    <div class="space-y-2">
                        <h4 class="font-medium text-gray-700 flex items-center">
                            <span class="mdi mdi-package-variant text-purple-500 mr-2"></span>
                            Barang Jaminan
                        </h4>
                        <template x-if="barang">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <p class="font-semibold text-gray-800" x-text="barangList.find(b => b.id == barang)?.nama"></p>
                                <p class="text-sm text-gray-600" x-text="barangList.find(b => b.id == barang)?.merk"></p>
                                <p class="text-xs text-gray-500 mt-1" x-text="'Nilai Taksir: Rp ' + (nilaiTaksir ? nilaiTaksir.toLocaleString('id-ID') : '0')"></p>
                            </div>
                        </template>
                        <template x-if="!barang">
                            <p class="text-sm text-gray-400 italic">Belum dipilih</p>
                        </template>
                    </div>
                    
                    <!-- Perhitungan -->
                    <template x-if="jumlahPinjaman">
                        <div class="border-t border-gray-200 pt-4 space-y-3">
                            <h4 class="font-medium text-gray-700 flex items-center">
                                <span class="mdi mdi-calculator text-green-500 mr-2"></span>
                                Perhitungan
                            </h4>
                            
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Pinjaman:</span>
                                    <span class="font-semibold" x-text="'Rp ' + parseInt(jumlahPinjaman).toLocaleString('id-ID')"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tenor:</span>
                                    <span class="font-semibold" x-text="tenor + ' hari'"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Bunga (' + bunga + '%):</span>
                                    <span class="font-semibold text-orange-600" x-text="'Rp ' + hitungBunga().toLocaleString('id-ID')"></span>
                                </div>
                                <div class="border-t border-gray-200 pt-2 flex justify-between">
                                    <span class="font-semibold text-gray-800">Total Pengembalian:</span>
                                    <span class="font-bold text-lg text-red-600" x-text="'Rp ' + totalPengembalian().toLocaleString('id-ID')"></span>
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <!-- Action Buttons -->
                    <div class="border-t border-gray-200 pt-4 space-y-3">
                        <button class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed" 
                                :disabled="!nasabah || !barang || !jumlahPinjaman">
                            <span class="mdi mdi-content-save mr-2"></span>
                            Simpan Transaksi
                        </button>
                        
                        <button class="w-full border border-gray-300 hover:border-gray-400 text-gray-700 font-medium py-2 px-4 rounded-xl transition-all duration-200">
                            <span class="mdi mdi-printer mr-2"></span>
                            Preview & Cetak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function transaksiData() {
    return {
        currentStep: 1,
        nasabah: '',
        nasabahInput: '',
        nasabahList: [
            { id: 1, nama: 'Budi Santoso', nik: '3201234567890001', alamat: 'Jl. Merdeka No. 123, Jakarta Pusat', telepon: '081234567890' },
            { id: 2, nama: 'Siti Aminah', nik: '3202345678901002', alamat: 'Jl. Sudirman No. 456, Jakarta Selatan', telepon: '081234567891' },
            { id: 3, nama: 'Joko Widodo', nik: '3203456789012003', alamat: 'Jl. Thamrin No. 789, Jakarta Pusat', telepon: '081234567892' },
            { id: 4, nama: 'Dewi Sartika', nik: '3204567890123004', alamat: 'Jl. Gatot Subroto No. 321, Jakarta Selatan', telepon: '081234567893' },
            { id: 5, nama: 'Ahmad Dahlan', nik: '3205678901234005', alamat: 'Jl. HR Rasuna Said No. 654, Jakarta Selatan', telepon: '081234567894' },
            { id: 6, nama: 'Kartini Putri', nik: '3206789012345006', alamat: 'Jl. Kuningan No. 987, Jakarta Selatan', telepon: '081234567895' },
            { id: 7, nama: 'Bambang Sutrisno', nik: '3207890123456007', alamat: 'Jl. Kemang Raya No. 147, Jakarta Selatan', telepon: '081234567896' },
            { id: 8, nama: 'Rina Melati', nik: '3208901234567008', alamat: 'Jl. Pancoran No. 258, Jakarta Selatan', telepon: '081234567897' },
            { id: 9, nama: 'Hendra Gunawan', nik: '3209012345678009', alamat: 'Jl. Cikini No. 369, Jakarta Pusat', telepon: '081234567898' },
            { id: 10, nama: 'Maya Sari', nik: '3210123456789010', alamat: 'Jl. Menteng No. 741, Jakarta Pusat', telepon: '081234567899' },
        ],
        filteredNasabah() {
            if (!this.nasabahInput) return [];
            return this.nasabahList.filter(n => n.nama.toLowerCase().includes(this.nasabahInput.toLowerCase()) || n.nik.includes(this.nasabahInput));
        },
        barang: '',
        barangInput: '',
        barangList: [
            { id: 1, nama: 'Emas 24K 10gr', merk: 'Antam', kategori: 'Perhiasan', taksir: 8500000, kondisi: 'Sangat Baik' },
            { id: 2, nama: 'Laptop Gaming', merk: 'Asus ROG', kategori: 'Elektronik', taksir: 15000000, kondisi: 'Sangat Baik' },
            { id: 3, nama: 'iPhone 14 Pro', merk: 'Apple', kategori: 'Elektronik', taksir: 12000000, kondisi: 'Baik' },
            { id: 4, nama: 'Kalung Emas 18K', merk: 'UBS', kategori: 'Perhiasan', taksir: 6500000, kondisi: 'Baik' },
            { id: 5, nama: 'MacBook Pro M2', merk: 'Apple', kategori: 'Elektronik', taksir: 18000000, kondisi: 'Sangat Baik' },
            { id: 6, nama: 'Samsung Galaxy S23', merk: 'Samsung', kategori: 'Elektronik', taksir: 8500000, kondisi: 'Baik' },
            { id: 7, nama: 'Cincin Berlian 1 Karat', merk: 'Tiffany & Co', kategori: 'Perhiasan', taksir: 45000000, kondisi: 'Sangat Baik' },
            { id: 8, nama: 'Jam Tangan Rolex', merk: 'Rolex Submariner', kategori: 'Aksesoris', taksir: 120000000, kondisi: 'Baik' },
            { id: 9, nama: 'iPad Pro 12.9"', merk: 'Apple', kategori: 'Elektronik', taksir: 14000000, kondisi: 'Sangat Baik' },
            { id: 10, nama: 'Gelang Emas 22K', merk: 'Pegadaian', kategori: 'Perhiasan', taksir: 4200000, kondisi: 'Baik' },
            { id: 11, nama: 'Kamera DSLR', merk: 'Canon EOS R5', kategori: 'Elektronik', taksir: 25000000, kondisi: 'Sangat Baik' },
            { id: 12, nama: 'Anting Berlian', merk: 'Cartier', kategori: 'Perhiasan', taksir: 35000000, kondisi: 'Sangat Baik' },
            { id: 13, nama: 'Gaming Console', merk: 'PlayStation 5', kategori: 'Elektronik', taksir: 7500000, kondisi: 'Baik' },
            { id: 14, nama: 'Emas Batangan 50gr', merk: 'Antam', kategori: 'Perhiasan', taksir: 42500000, kondisi: 'Sangat Baik' },
            { id: 15, nama: 'Smartwatch', merk: 'Apple Watch Ultra', kategori: 'Aksesoris', taksir: 9500000, kondisi: 'Baik' },
        ],
        filteredBarang() {
            if (!this.barangInput) return [];
            return this.barangList.filter(b => b.nama.toLowerCase().includes(this.barangInput.toLowerCase()) || b.merk.toLowerCase().includes(this.barangInput.toLowerCase()));
        },
        nilaiTaksir: '',
        jumlahPinjaman: '',
        tenor: '30',
        bunga: 2.5,
        pilihBarangById(id) {
            this.barang = id;
            const b = this.barangList.find(x => x.id == id);
            this.nilaiTaksir = b ? b.taksir : '';
            this.barangInput = b ? b.nama + ' - ' + b.merk : '';
            this.jumlahPinjaman = b ? Math.floor(b.taksir * 0.8) : '';
            this.currentStep = 3;
        },
        pilihNasabahById(id) {
            this.nasabah = id;
            const n = this.nasabahList.find(x => x.id == id);
            this.nasabahInput = n ? n.nama + ' (' + n.nik + ')' : '';
            this.barang = '';
            this.barangInput = '';
            this.nilaiTaksir = '';
            this.jumlahPinjaman = '';
            this.currentStep = 2;
        },
        hitungBunga() {
            if (!this.jumlahPinjaman || !this.tenor) return 0;
            return Math.floor((this.jumlahPinjaman * this.bunga / 100) * (this.tenor / 30));
        },
        totalPengembalian() {
            return parseInt(this.jumlahPinjaman || 0) + this.hitungBunga();
        }
    }
}
</script>
@endsection