<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;


Route::resource('cars', CarController::class);
Route::post('/cars/store', [CarController::class,'store'])->name('cars.store');
Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
Route::post('/cars/update', [CarController::class,'update'])->name('cars.update');


