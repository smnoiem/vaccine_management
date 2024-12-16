<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VaccineCardController;
use App\Http\Controllers\VaccineCertificateController;
use Illuminate\Support\Facades\Route;


Route::name('front.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::name('registration.')->prefix('registration')->group(function () {

        Route::get('/', [RegistrationController::class, 'create'])->middleware(['not-registered'])->name('create');
        Route::post('/', [RegistrationController::class, 'store'])->middleware(['not-registered'])->name('store');

        Route::get('/status', [RegistrationController::class, 'status'])->middleware(['auth', 'registered'])->name('status');
        
        Route::post('update_date', [RegistrationController::class, 'update_date'])->name('update_date');
        Route::post('cancel_appointment', [RegistrationController::class, 'cancel_appointment'])->name('cancel_appointment');

    });

    Route::middleware(['auth'])->group(function () {

        Route::get('/vaccine-card', [VaccineCardController::class, 'index'])->name('vaccine.card');

        Route::post('/vaccine-card/download', [VaccineCardController::class, 'download'])->name('vaccine.card.download');

        Route::get('/vaccine-certificate', [VaccineCertificateController::class, 'index'])->name('vaccine.certificate');

        Route::post('/vaccine-certificate.download', [VaccineCertificateController::class, 'download'])->name('vaccine.certificate.download');

    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
