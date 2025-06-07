<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\SupervisorLoginController;
use App\Http\Controllers\Auth\PetugasLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\CustomerLoanController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\ItemRequestController;
use App\Http\Controllers\Supervisor\DashboardController as SupervisorDashboardController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Supervisor\ItemController as SupervisorItemController;
use App\Http\Controllers\Supervisor\ReportController as SupervisorReportController;
use App\Http\Controllers\Supervisor\SettingController as SupervisorSettingController;
use App\Http\Controllers\Petugas\CustomerController as PetugasCustomerController;
use App\Http\Controllers\Petugas\ReportController as PetugasReportController;
use App\Http\Controllers\Supervisor\CustomerController as SupervisorCustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Guest Routes (Login)
Route::middleware('guest')->group(function () {
    // Customer Login Routes
    Route::get('/customer/login', [CustomerLoginController::class, 'create'])->name('customer.login');
    Route::post('/customer/login', [CustomerLoginController::class, 'store']);
    
    // Admin Login Routes
    Route::get('/admin/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'store']);

    // Supervisor Login Routes
    Route::get('/supervisor/login', [SupervisorLoginController::class, 'create'])->name('supervisor.login');
    Route::post('/supervisor/login', [SupervisorLoginController::class, 'store']);

    // Petugas Login Routes
    Route::get('/petugas/login', [PetugasLoginController::class, 'create'])->name('petugas.login');
    Route::post('/petugas/login', [PetugasLoginController::class, 'store']);
});

// Customer Routes (Protected)
Route::middleware(['web', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/loans', [CustomerLoanController::class, 'index'])->name('loans');
    Route::get('/apply-loan', [CustomerLoanController::class, 'create'])->name('apply-loan');
    Route::post('/store-loan', [CustomerLoanController::class, 'store'])->name('store-loan');
    Route::get('/payments', [CustomerPaymentController::class, 'index'])->name('payments');
    
    // Profile Routes
    Route::get('/profile', [CustomerProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [CustomerProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [CustomerProfileController::class, 'update'])->name('profile.update');
});

// Admin Routes (Protected)
Route::middleware(['web', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('customers', CustomerController::class);
    Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('transactions');
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports');
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings');
    Route::put('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
});

// Supervisor Routes (Protected)
Route::middleware(['web', 'role:supervisor'])->prefix('supervisor')->name('supervisor.')->group(function () {
    Route::get('/dashboard', [SupervisorDashboardController::class, 'index'])->name('dashboard');
    Route::resource('customers', SupervisorCustomerController::class);
    Route::get('/transactions', [App\Http\Controllers\Supervisor\TransactionController::class, 'index'])->name('transactions');
    Route::patch('/transactions/{itemRequest}/status', [ItemRequestController::class, 'updateStatus'])->name('transactions.update-status');
    Route::resource('items', App\Http\Controllers\Supervisor\ItemController::class);
    Route::get('/reports', [SupervisorReportController::class, 'index'])->name('reports');
    Route::get('/settings', [SupervisorSettingController::class, 'index'])->name('settings');
    Route::put('/settings', [SupervisorSettingController::class, 'update'])->name('settings.update');
});

// Petugas Routes (Protected)
Route::middleware(['web', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
    Route::get('/transactions', [ItemRequestController::class, 'index'])->name('transactions');
    Route::get('/transactions/{id}/detail', [ItemRequestController::class, 'show'])->name('transactions.detail');
    Route::get('/transactions/{id}/pelunasan-sebagian', [ItemRequestController::class, 'pelunasanSebagian'])->name('transactions.pelunasan-sebagian');
    Route::post('/transactions/{id}/pelunasan-sebagian', [ItemRequestController::class, 'storePelunasanSebagian'])->name('transactions.pelunasan-sebagian.store');
    Route::get('/transactions/create', [ItemRequestController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [ItemRequestController::class, 'store'])->name('transactions.store');
    Route::get('/customers', [PetugasCustomerController::class, 'index'])->name('customers');
    Route::get('/reports', [PetugasReportController::class, 'index'])->name('reports');
    Route::get('/items', function() {
        $items = [
            [ 'code' => 'BRG001', 'name' => 'iPhone 13', 'brand' => 'iPhone', 'specification' => 'Apple, 128GB, Biru', 'category' => 'elektronik', 'estimated_value' => 9000000, 'status' => 'active' ],
            [ 'code' => 'BRG002', 'name' => 'Honda Vario 125', 'brand' => 'Honda', 'specification' => 'Honda, 2022, Hitam', 'category' => 'kendaraan', 'estimated_value' => 15000000, 'status' => 'active' ],
            [ 'code' => 'BRG003', 'name' => 'Cincin Emas', 'brand' => 'Cincin', 'specification' => 'Emas 24K, 5gr', 'category' => 'perhiasan', 'estimated_value' => 3500000, 'status' => 'inactive' ],
            [ 'code' => 'BRG004', 'name' => 'Samsung Galaxy S21', 'brand' => 'Samsung', 'specification' => 'Samsung, 256GB, Silver', 'category' => 'elektronik', 'estimated_value' => 8000000, 'status' => 'active' ],
            [ 'code' => 'BRG005', 'name' => 'Yamaha NMAX', 'brand' => 'Yamaha', 'specification' => 'Yamaha, 2021, Putih', 'category' => 'kendaraan', 'estimated_value' => 17000000, 'status' => 'inactive' ],
            [ 'code' => 'BRG006', 'name' => 'Laptop ASUS ROG', 'brand' => 'ASUS', 'specification' => 'ASUS, i7, 16GB RAM', 'category' => 'elektronik', 'estimated_value' => 12000000, 'status' => 'active' ],
            [ 'code' => 'BRG007', 'name' => 'Anting Berlian', 'brand' => 'Anting', 'specification' => 'Berlian, 2gr', 'category' => 'perhiasan', 'estimated_value' => 5000000, 'status' => 'active' ],
            [ 'code' => 'BRG008', 'name' => 'Honda Beat', 'brand' => 'Honda', 'specification' => 'Honda, 2020, Merah', 'category' => 'kendaraan', 'estimated_value' => 10000000, 'status' => 'inactive' ],
            [ 'code' => 'BRG009', 'name' => 'Macbook Air', 'brand' => 'Macbook', 'specification' => 'Apple, M1, 256GB', 'category' => 'elektronik', 'estimated_value' => 14000000, 'status' => 'active' ],
            [ 'code' => 'BRG010', 'name' => 'Kalung Emas', 'brand' => 'Kalung', 'specification' => 'Emas 18K, 10gr', 'category' => 'perhiasan', 'estimated_value' => 8000000, 'status' => 'active' ],
            [ 'code' => 'BRG011', 'name' => 'Suzuki Satria', 'brand' => 'Suzuki', 'specification' => 'Suzuki, 2019, Biru', 'category' => 'kendaraan', 'estimated_value' => 9000000, 'status' => 'inactive' ],
            [ 'code' => 'BRG012', 'name' => 'Smart TV LG', 'brand' => 'LG', 'specification' => 'LG, 43 inch, 4K', 'category' => 'elektronik', 'estimated_value' => 6000000, 'status' => 'active' ],
        ];
        return view('petugas.items', compact('items'));
    })->name('items');
    Route::get('/cek-taksiran', function() {
        return view('petugas.cek-taksiran');
    })->name('cek-taksiran');
    
    // Routes untuk ajukan barang
    Route::get('/ajukan-barang', function() {
        return view('petugas.ajukan-barang');
    })->name('ajukan-barang');
    Route::post('/ajukan-barang', function() {
        // Logic untuk menyimpan barang baru akan ditambahkan di sini
        return redirect()->route('petugas.items')->with('success', 'Barang berhasil diajukan!');
    })->name('ajukan-barang.store');
    
    // Routes untuk input data transaksi
    Route::get('/transaksi/create', [App\Http\Controllers\Petugas\TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [App\Http\Controllers\Petugas\TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/search-customer', [App\Http\Controllers\Petugas\TransaksiController::class, 'searchCustomer'])->name('transaksi.search-customer');
    Route::get('/transaksi/get-items', [App\Http\Controllers\Petugas\TransaksiController::class, 'getItemsByCategory'])->name('transaksi.get-items');
});

// Logout Routes
Route::middleware('web')->group(function () {
    Route::post('/admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');
    Route::post('/supervisor/logout', [SupervisorLoginController::class, 'destroy'])->name('supervisor.logout');
    Route::post('/petugas/logout', [PetugasLoginController::class, 'destroy'])->name('petugas.logout');
});

Route::middleware(['auth', 'role:petugas,admin'])->group(function () {
    Route::get('/item-requests', [ItemRequestController::class, 'index'])->name('item-requests.index');
    Route::get('/item-requests/create', [ItemRequestController::class, 'create'])->name('item-requests.create')->middleware('role:petugas');
    Route::post('/item-requests', [ItemRequestController::class, 'store'])->name('item-requests.store')->middleware('role:petugas');
    Route::get('/item-requests/{itemRequest}', [ItemRequestController::class, 'show'])->name('item-requests.show');
    Route::patch('/item-requests/{itemRequest}/status', [ItemRequestController::class, 'updateStatus'])->name('item-requests.update-status')->middleware('role:admin');
});

require __DIR__.'/auth.php';
