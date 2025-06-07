@extends('layouts.petugas')

@section('title', 'Pelunasan Sebagian SBG')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 max-w-2xl mx-auto p-8 mt-0">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Pelunasan Sebagian {{ $sbgDetail['sbg_no'] }}</h2>
                <p class="text-sm text-gray-500">Form pelunasan sebagian SBG</p>
            </div>
            <a href="{{ route('petugas.transactions.detail', $sbgDetail['sbg_no']) }}" class="text-gray-600 hover:text-gray-800">
                <span class="mdi mdi-arrow-left text-xl"></span>
            </a>
        </div>

        <!-- Form Pelunasan Sebagian -->
        <form action="{{ route('petugas.transactions.pelunasan-sebagian.store', $sbgDetail['sbg_no']) }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Sisa Pinjaman Pokok -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Sisa Pinjaman Pokok</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="text" 
                           value="{{ number_format($sbgDetail['sisa_pinjaman_pokok'], 0, ',', '.') }}" 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600" 
                           readonly>
                </div>
            </div>

            <!-- Jasa Tarif -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Jasa Tarif</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="text" 
                           value="{{ number_format($sbgDetail['jasa_tarif'], 0, ',', '.') }}" 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600" 
                           readonly>
                </div>
            </div>

            <!-- Pelunasan yang Dibayar -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Pelunasan yang Dibayar</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="text" 
                           name="pelunasan_dibayar"
                           id="pelunasan_dibayar"
                           placeholder="Kelipatan 50.000"
                           class="w-full pl-10 pr-4 py-3 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                           oninput="calculateTotal()">
                </div>
            </div>

            <!-- Total yang harus dibayar -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Total yang harus dibayar</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="text" 
                           id="total_bayar"
                           value="{{ number_format($sbgDetail['jasa_tarif'], 0, ',', '.') }}"
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600" 
                           readonly>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <div class="flex space-x-4">
                    <button type="button" 
                            id="btn-cash"
                            onclick="selectPaymentMethod('cash')"
                            class="flex-1 py-3 px-4 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 transition-colors">
                        Cash
                    </button>
                    <button type="button" 
                            id="btn-transfer"
                            onclick="selectPaymentMethod('transfer')"
                            class="flex-1 py-3 px-4 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                        Transfer
                    </button>
                </div>
                <input type="hidden" name="metode_pembayaran" id="metode_pembayaran" value="cash">
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-green-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-green-600 transition-colors">
                    Proses Pelunasan Sebagian
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function calculateTotal() {
    const pelunasanInput = document.getElementById('pelunasan_dibayar');
    const totalInput = document.getElementById('total_bayar');
    const jasaTarif = {{ $sbgDetail['jasa_tarif'] }};
    
    // Remove formatting and get numeric value
    let pelunasanValue = pelunasanInput.value.replace(/[^0-9]/g, '');
    pelunasanValue = parseInt(pelunasanValue) || 0;
    
    // Calculate total
    const total = jasaTarif + pelunasanValue;
    
    // Format and display total
    totalInput.value = new Intl.NumberFormat('id-ID').format(total);
    
    // Format pelunasan input
    if (pelunasanValue > 0) {
        pelunasanInput.value = new Intl.NumberFormat('id-ID').format(pelunasanValue);
    }
}

function selectPaymentMethod(method) {
    const cashBtn = document.getElementById('btn-cash');
    const transferBtn = document.getElementById('btn-transfer');
    const methodInput = document.getElementById('metode_pembayaran');
    
    if (method === 'cash') {
        cashBtn.className = 'flex-1 py-3 px-4 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 transition-colors';
        transferBtn.className = 'flex-1 py-3 px-4 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300 transition-colors';
        methodInput.value = 'cash';
    } else {
        cashBtn.className = 'flex-1 py-3 px-4 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300 transition-colors';
        transferBtn.className = 'flex-1 py-3 px-4 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 transition-colors';
        methodInput.value = 'transfer';
    }
}

// Format input on page load
document.addEventListener('DOMContentLoaded', function() {
    const pelunasanInput = document.getElementById('pelunasan_dibayar');
    
    pelunasanInput.addEventListener('input', function() {
        // Remove non-numeric characters
        let value = this.value.replace(/[^0-9]/g, '');
        
        // Format with thousand separators
        if (value) {
            this.value = new Intl.NumberFormat('id-ID').format(parseInt(value));
        }
        
        calculateTotal();
    });
});
</script>
@endsection