<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::get('/', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/invoice/{invoice}/print', [InvoiceController::class, 'print'])->name('invoice.print');
Route::get('/invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
Route::get('/invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::PATCH('/invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::DELETE('/invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::fallback(function () {
    return view('invoice.fallback');
})->name('invoice.fallback');

Auth::routes();