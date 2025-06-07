@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 p-10 mt-0">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tambah Barang</h2>
    <form action="{{ route('supervisor.items.store') }}" method="POST" class="space-y-8">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="category" class="block text-xs font-semibold text-gray-500 mb-2">Kategori</label>
                <div class="relative w-full">
                    <select name="category" id="category" class="form-input w-full pr-10 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Perhiasan">Perhiasan</option>
                        <option value="Dokumen">Dokumen</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <span class="mdi mdi-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></span>
                </div>
            </div>
            <div id="subkategori-group" class="hidden">
                <label for="sub_category" class="block text-xs font-semibold text-gray-500 mb-2">Sub Kategori</label>
                <div class="relative w-full">
                    <select name="sub_category" id="sub_category" class="form-input w-full pr-10 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-800">
                        <option value="">Pilih Sub Kategori</option>
                        <option value="HP">HP</option>
                        <option value="TV">TV</option>
                        <option value="Laptop">Laptop</option>
                    </select>
                    <span class="mdi mdi-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></span>
                </div>
            </div>
            <div>
                <label for="brand" class="block text-xs font-semibold text-gray-500 mb-2">Merk Barang</label>
                <input type="text" name="brand" id="brand" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan merk barang" required>
            </div>
            <div>
                <label for="name" class="block text-xs font-semibold text-gray-500 mb-2">Nama Barang</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan nama barang" required>
            </div>
            <div>
                <label for="initial_price" class="block text-xs font-semibold text-gray-500 mb-2">Harga Taksiran Awal</label>
                <input type="number" name="initial_price" id="initial_price" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Masukkan harga taksiran awal" min="0" required>
            </div>
        </div>
        <div>
            <label for="description" class="block text-xs font-semibold text-gray-500 mb-2">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-orange-400 bg-gray-50 text-gray-800 placeholder-gray-400 transition" placeholder="Deskripsi barang"></textarea>
        </div>
        <div>
            <h3 class="text-base font-bold text-gray-800 mb-3">Indikator Barang</h3>
            <div id="indikator-container" class="space-y-6">
                <div class="indikator-section bg-white rounded-xl p-6 border border-gray-100 shadow-md">
                    <div class="flex items-center gap-2 mb-4">
                        <input type="text" name="indikator[0][indikator]" class="indikator-label w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition font-semibold" placeholder="Nama Indikator (misal: Body HP)" required>
                        <button type="button" class="btn-remove-indikator hidden border border-blue-500 text-blue-600 bg-white rounded-full p-2 hover:bg-blue-50 transition" title="Hapus Indikator">
                            <span class="mdi mdi-minus text-lg"></span>
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left text-xs font-bold text-gray-500 pb-2 w-2/5 pr-6">Pilihan</th>
                                    <th class="text-left text-xs font-bold text-gray-500 pb-2 w-2/5">Pengurangan</th>
                                    <th class="w-1/5"></th>
                                </tr>
                            </thead>
                            <tbody class="pilihan-list">
                                <tr class="pilihan-row">
                                    <td class="pr-6">
                                        <input type="text" name="indikator[0][pilihan][0][pilihan]" class="w-full px-3 py-2 border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" placeholder="Pilihan (misal: Lecet)" required>
                                    </td>
                                    <td>
                                        <div class="relative flex items-center">
                                            <input type="number" name="indikator[0][pilihan][0][pengurangan]" class="w-full px-3 py-2 border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition pr-8" placeholder="0" min="0" max="100" required>
                                            <span class="absolute right-3 text-gray-400 text-sm pointer-events-none">%</span>
                                        </div>
                                    </td>
                                    <td class="flex gap-2 items-center justify-center">
                                        <button type="button" class="btn-remove-pilihan hidden border border-red-400 text-red-500 bg-white rounded-full p-2 w-10 h-10 flex items-center justify-center hover:bg-red-50 shadow transition" title="Hapus Pilihan">
                                            <span class="mdi mdi-minus-circle text-2xl"></span>
                                        </button>
                                        <button type="button" class="btn-add-pilihan border-2 border-blue-500 text-blue-600 bg-white rounded-full p-2 w-10 h-10 flex items-center justify-center hover:bg-blue-50 shadow transition text-2xl" title="Tambah Pilihan">
                                            <span class="mdi mdi-plus-circle"></span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-start mt-3">
                <button type="button" id="btn-add-indikator" class="inline-flex items-center gap-2 px-4 py-2 border-2 border-blue-500 text-blue-600 bg-white font-bold rounded-xl shadow-sm hover:bg-blue-50 hover:scale-105 transition text-base">
                    <span class="mdi mdi-plus-circle text-xl"></span> Tambah Indikator
                </button>
            </div>
        </div>
        <div class="flex flex-row gap-3 justify-end mt-8">
            <a href="{{ route('supervisor.items.index') }}" class="btn-secondary w-full md:w-auto font-semibold px-6 py-3 rounded-xl shadow">Batal</a>
            <button type="submit" class="btn-primary w-full md:w-auto font-bold px-6 py-3 rounded-xl shadow min-w-[180px]">Simpan</button>
        </div>
    </form>
</div>
@push('scripts')
<script>
    let indikatorIndex = 1;
    document.addEventListener('DOMContentLoaded', function() {
        const indikatorContainer = document.getElementById('indikator-container');
        const btnAddIndikator = document.getElementById('btn-add-indikator');
        btnAddIndikator.addEventListener('click', function() {
            const sections = indikatorContainer.querySelectorAll('.indikator-section');
            const lastSection = sections[sections.length - 1];
            const clone = lastSection.cloneNode(true);
            const labelInput = clone.querySelector('.indikator-label');
            labelInput.value = '';
            labelInput.name = `indikator[${indikatorIndex}][indikator]`;
            const pilihanList = clone.querySelector('.pilihan-list');
            pilihanList.innerHTML = '';
            pilihanList.appendChild(createPilihanRow(indikatorIndex, 0));
            clone.querySelector('.btn-remove-indikator').classList.remove('hidden');
            clone.querySelector('.btn-remove-indikator').onclick = function() {
                if (indikatorContainer.children.length > 1) clone.remove();
            };
            updatePilihanEvents(clone, indikatorIndex);
            indikatorContainer.appendChild(clone);
            indikatorIndex++;
        });
        indikatorContainer.querySelectorAll('.btn-remove-indikator').forEach(btn => {
            btn.onclick = function() {
                if (indikatorContainer.children.length > 1) btn.closest('.indikator-section').remove();
            };
        });
        function createPilihanRow(indIdx, pilIdx) {
            const tr = document.createElement('tr');
            tr.className = 'pilihan-row';
            tr.innerHTML = `
                <td class="pr-6"><input type="text" name="indikator[${indIdx}][pilihan][${pilIdx}][pilihan]" class="w-full px-3 py-2 border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" placeholder="Pilihan (misal: Lecet)" required></td>
                <td><div class="relative flex items-center"><input type="number" name="indikator[${indIdx}][pilihan][${pilIdx}][pengurangan]" class="w-full px-3 py-2 border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition pr-8" placeholder="0" min="0" max="100" required><span class="absolute right-3 text-gray-400 text-sm pointer-events-none">%</span></div></td>
                <td class="flex gap-2 items-center justify-center">
                    <button type="button" class="btn-remove-pilihan hidden border border-red-400 text-red-500 bg-white rounded-full p-2 w-10 h-10 flex items-center justify-center hover:bg-red-50 shadow transition" title="Hapus Pilihan"><span class="mdi mdi-minus-circle text-2xl"></span></button>
                    <button type="button" class="btn-add-pilihan border-2 border-blue-500 text-blue-600 bg-white rounded-full p-2 w-10 h-10 flex items-center justify-center hover:bg-blue-50 shadow transition text-2xl" title="Tambah Pilihan"><span class="mdi mdi-plus-circle"></span></button>
                </td>
            `;
            return tr;
        }
        function updatePilihanEvents(section, indIdx) {
            const pilihanList = section.querySelector('.pilihan-list');
            pilihanList.querySelectorAll('.btn-add-pilihan').forEach(btn => btn.onclick = null);
            pilihanList.querySelectorAll('.btn-remove-pilihan').forEach(btn => btn.onclick = null);
            pilihanList.querySelectorAll('.btn-add-pilihan').forEach((btn, i, arr) => {
                btn.classList.toggle('hidden', i !== arr.length - 1);
                btn.onclick = function() {
                    const rows = pilihanList.querySelectorAll('.pilihan-row');
                    const pilIdx = rows.length;
                    const newRow = createPilihanRow(indIdx, pilIdx);
                    pilihanList.appendChild(newRow);
                    updatePilihanEvents(section, indIdx);
                };
            });
            pilihanList.querySelectorAll('.btn-remove-pilihan').forEach((btn, i, arr) => {
                btn.classList.toggle('hidden', arr.length === 1);
                btn.onclick = function() {
                    if (pilihanList.children.length > 1) btn.closest('tr').remove();
                    updatePilihanEvents(section, indIdx);
                };
            });
        }
        updatePilihanEvents(indikatorContainer.querySelector('.indikator-section'), 0);
        const kategori = document.getElementById('category');
        const subkategoriGroup = document.getElementById('subkategori-group');
        const subkategori = document.getElementById('sub_category');
        kategori.addEventListener('change', function() {
            if (this.value === 'Elektronik') {
                subkategoriGroup.classList.remove('hidden');
                subkategori.required = true;
            } else {
                subkategoriGroup.classList.add('hidden');
                subkategori.value = '';
                subkategori.required = false;
            }
        });
    });
</script>
@endpush
<style>
.btn-primary {
  background-color: #2563eb !important;
  color: #fff !important;
  border: none;
  box-shadow: 0 2px 8px 0 rgba(37,99,235,0.08);
}
.btn-primary:hover {
  background-color: #1d4ed8 !important;
  color: #fff !important;
}
</style>
@endsection 