@extends('layouts.app')

@section('title', 'Ajukan Barang')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Ajukan Barang Baru</h2>
                <p class="text-gray-500 text-sm">Tambahkan barang baru untuk dapat digadaikan oleh nasabah.</p>
            </div>
            <a href="{{ route('petugas.items') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <span class="mdi mdi-arrow-left"></span>
                Kembali
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('petugas.ajukan-barang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Informasi Dasar Barang -->
            <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                <h3 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
                    <span class="mdi mdi-package-variant text-blue-600 mr-2"></span>
                    Informasi Dasar Barang
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Barang -->
                    <div>
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-2">Nama Barang *</label>
                        <input type="text" id="nama_barang" name="nama_barang" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Contoh: iPhone 14 Pro Max">
                    </div>
                    
                    <!-- Merk/Brand -->
                    <div>
                        <label for="merk" class="block text-sm font-medium text-gray-700 mb-2">Merk/Brand *</label>
                        <input type="text" id="merk" name="merk" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Contoh: Apple">
                    </div>
                    
                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                        <select id="kategori" name="kategori" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">Pilih Kategori</option>
                            <option value="elektronik">Elektronik</option>
                            <option value="kendaraan">Kendaraan</option>
                            <option value="perhiasan">Perhiasan</option>
                            <option value="dokumen">Dokumen</option>
                        </select>
                    </div>
                    
                    <!-- Kondisi -->
                    <div>
                        <label for="kondisi" class="block text-sm font-medium text-gray-700 mb-2">Kondisi Barang *</label>
                        <select id="kondisi" name="kondisi" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">Pilih Kondisi</option>
                            <option value="sangat_baik">Sangat Baik</option>
                            <option value="baik">Baik</option>
                            <option value="cukup">Cukup</option>
                            <option value="kurang">Kurang</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Spesifikasi dan Nilai -->
            <div class="bg-green-50 rounded-xl p-6 border border-green-200">
                <h3 class="text-lg font-semibold text-green-900 mb-4 flex items-center">
                    <span class="mdi mdi-clipboard-text text-green-600 mr-2"></span>
                    Spesifikasi dan Nilai
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Spesifikasi -->
                    <div class="md:col-span-2">
                        <label for="spesifikasi" class="block text-sm font-medium text-gray-700 mb-2">Spesifikasi Detail</label>
                        <textarea id="spesifikasi" name="spesifikasi" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Contoh: 256GB, Warna Space Gray, Kondisi 95%, Lengkap dengan box dan charger original"></textarea>
                    </div>
                    
                    <!-- Nilai Estimasi -->
                    <div>
                        <label for="nilai_estimasi" class="block text-sm font-medium text-gray-700 mb-2">Nilai Estimasi (Rp) *</label>
                        <input type="number" id="nilai_estimasi" name="nilai_estimasi" required min="0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Contoh: 12000000">
                    </div>
                    
                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select id="status" name="status" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Upload Foto -->
            <div class="bg-purple-50 rounded-xl p-6 border border-purple-200">
                <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                    <span class="mdi mdi-camera text-purple-600 mr-2"></span>
                    Foto Barang
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="foto_barang" class="block text-sm font-medium text-gray-700 mb-2">Upload Foto Barang</label>
                        <input type="file" id="foto_barang" name="foto_barang[]" multiple accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maksimal 5 foto, ukuran maksimal 2MB per foto.</p>
                    </div>
                    
                    <!-- Preview Area -->
                    <div id="preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4 hidden">
                        <!-- Preview images will be inserted here -->
                    </div>
                </div>
            </div>
            
            <!-- Catatan Tambahan -->
            <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-200">
                <h3 class="text-lg font-semibold text-yellow-900 mb-4 flex items-center">
                    <span class="mdi mdi-note-text text-yellow-600 mr-2"></span>
                    Catatan Tambahan
                </h3>
                
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan Petugas</label>
                    <textarea id="catatan" name="catatan" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        placeholder="Catatan tambahan mengenai barang, kondisi khusus, atau informasi penting lainnya..."></textarea>
                </div>
            </div>
            
            <!-- Submit Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6">
                <button type="submit" 
                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 flex items-center justify-center gap-2 shadow-lg">
                    <span class="mdi mdi-content-save"></span>
                    Simpan Barang
                </button>
                <a href="{{ route('petugas.items') }}" 
                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-colors flex items-center justify-center gap-2">
                    <span class="mdi mdi-cancel"></span>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// Preview uploaded images
document.getElementById('foto_barang').addEventListener('change', function(e) {
    const previewContainer = document.getElementById('preview-container');
    previewContainer.innerHTML = '';
    
    if (e.target.files.length > 0) {
        previewContainer.classList.remove('hidden');
        
        Array.from(e.target.files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                        <div class="absolute top-1 right-1 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                            ${index + 1}
                        </div>
                    `;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        });
    } else {
        previewContainer.classList.add('hidden');
    }
});

// Format number input for nilai estimasi
document.getElementById('nilai_estimasi').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    e.target.value = value;
});
</script>
@endsection