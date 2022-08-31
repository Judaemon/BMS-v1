<?php

use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SystemSettingController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::view('about', 'about')->name('about');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::view('dashboard', 'dashboard')->name('dashboard');
    
    Route::view('users', 'users')->name('user.index');

    Route::view('blotters', 'blotters')->name('blotter.index');
    
    Route::view('schedule', 'schedule')->name('schedule.index');
    
    Route::get('certificate/requests', [CertificateController::class, 'requests'])->name('certificate.requests');
    Route::get('certificate/types', [CertificateController::class, 'types'])->name('certificate.types');
    
    Route::get('settings', [SystemSettingController::class, 'index'])->name('settings.index');
    Route::put('settings/update', [SystemSettingController::class, 'update'])->name('settings.update');
});
