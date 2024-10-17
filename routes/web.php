<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;

Route::get('/', [MakananController::class, "index"]);
Route::post('/create-makanan', [MakananController::class, "createMakanan"])->name('create-makanan');
Route::get('/delete-makanan/{id}', [MakananController::class, "delete"])->name('delete-makanan');