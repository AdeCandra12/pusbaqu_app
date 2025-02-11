<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/berita/{slug}', [FrontController::class, 'show'])->name('front.news');


//create me a route to connect to the getTestRegistrations function which functions to retrieve registrant data from the test_registrations table, by retrieving the registrant data from the 'registrant' role

Route::get('/dashboard', function () {
    return view('front.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Izinkan Admin dan Registrant mengakses halaman ini
    Route::middleware(['auth', 'role:admin|registrant'])->group(function () {
        Route::get('/forms/{category:slug}', [FrontController::class, 'form'])->name('front.forms');
        Route::post('/forms/{category:slug}/submit', [FrontController::class, 'submit'])->name('front.forms.submit');

        Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category.form');
        Route::get('/table/history', [FrontController::class, 'history'])->name('front.history');
        
        // Perbaikan route untuk upload bukti bayar dengan slug layanan
        Route::get('/table/history/{slug}/{id}/detail', [FrontController::class, 'detail'])->name('front.detail');
        Route::get('/table/history/{slug}/{id}/payproof', [FrontController::class, 'showPayproof'])->name('front.payproof');
        Route::post('/table/history/{slug}/{id}/payproof/submit', [FrontController::class, 'uploadPaymentProof'])->name('front.payproof.submit');
    });
});


require __DIR__ . '/auth.php';
