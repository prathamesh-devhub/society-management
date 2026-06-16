<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaintenanceBillController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\MaintenancePaymentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('members', MemberController::class);
    Route::resource('complaints', ComplaintController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('notices', NoticeController::class);
    Route::resource('tenants', TenantController::class);

    //Settings
    Route::get('/settings', [SettingController::class, 'show'])->name('settings.show');
    Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    //maintenance payments
    Route::get(
        'maintenance-bills/{maintenanceBill}/payments/create',
        [MaintenancePaymentController::class,'create']
    )->name('maintenance-payments.create');

    Route::post(
        'maintenance-bills/{maintenanceBill}/payments',
        [MaintenancePaymentController::class,'store']
    )->name('maintenance-payments.store');

    Route::get('maintenance-bills/generate', [MaintenanceBillController::class,'generateForm'])->name('maintenance-bills.generate');

    Route::post(
        'maintenance-bills/generate',
        [MaintenanceBillController::class,'generate']
    )->name('maintenance-bills.generate');
    });

    Route::get(
        'maintenance-bills/{maintenanceBill}/print',
        [MaintenanceBillController::class, 'print']
    )->name('maintenance-bills.print');

    Route::get(
        'reports/defaulters',
        [ReportController::class, 'defaulters']
    )->name('reports.defaulters');

    Route::get(
        'maintenance-bills/{maintenanceBill}/billpdf',
        [MaintenanceBillController::class,'billpdf']
    )->name('maintenance-bills.billpdf');

    Route::resource('maintenance-bills', MaintenanceBillController::class);


require __DIR__.'/auth.php';
