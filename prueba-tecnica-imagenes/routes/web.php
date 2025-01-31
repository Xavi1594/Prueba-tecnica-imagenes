<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::delete('images/{id}', [ImageController::class, 'destroy'])->name('images.destroy');
Route::get('images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('images', [ImageController::class, 'store'])->name('images.store');
Route::get('images/{id}/edit', [ImageController::class, 'edit'])->name('images.edit');
Route::put('images/{id}/update', [ImageController::class, 'update'])->name('images.update');
Route::get('images/{id}', [ImageController::class, 'show'])->name('images.show');



