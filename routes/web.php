<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::get('/', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::put('/invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::get('/invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');

Route::DELETE('/invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::prefix('admin')->group(function () {
    Route::get('a', function () {
        return " a";
    });
    Route::get('b', function () {
        return " b";
    });
    Route::get('c', function () {
        return " c";
    });
    Route::get('d', function () {
        return " d";
    });
});
Route::fallback(function () {
    return view('invoice.fallback');
})->name('invoice.fallback');

Auth::routes();