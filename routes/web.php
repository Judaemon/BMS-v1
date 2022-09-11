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

// Shared bwetween all roles
Route::group(['middleware' => ['role:Super Admin|Officer|Resident']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::get('certificate/print/{certyficateType}/{userID}', [CertificateController::class, 'print'])->name('print');
});

// Admins
Route::group(['middleware' => ['role:Super Admin|Officer']], function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::view('users', 'users')->name('user.index');

    Route::view('blotters', 'blotters')->name('blotter.index');
    
    Route::view('schedule', 'schedule')->name('schedule.index');
    
    Route::get('certificate/requests', [CertificateController::class, 'requests'])->name('certificate.requests');
    Route::get('certificate/types', [CertificateController::class, 'types'])->name('certificate.types');
    
    Route::get('settings', [SystemSettingController::class, 'index'])->name('settings.index');
    Route::put('settings/update', [SystemSettingController::class, 'update'])->name('settings.update');
});

// Residents
Route::group(['middleware' => ['role:Resident']], function () {
    Route::view('contact-information', 'contact-information')->name('contact-information');
    
    Route::view('resident-blotter', 'resident.blotter')->name('resident-blotter');
    Route::view('resident-report-incident', 'resident.report-incident')->name('resident-report-incident');
    Route::view('resident-request-certificate', 'resident.request-certificate')->name('resident-request-certificate');
});