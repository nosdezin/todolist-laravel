<?php

use App\Http\Controllers\ActivyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ActivyController::class, 'home'])->name('home');
Route::post('/create', [ActivyController::class, "createActivy"])->name('activy.create');
Route::put('/update/{id}/{isChecked}', [ActivyController::class, "updateCheck"])->name('activy.update');
Route::delete('/delete/{id}', [ActivyController::class, 'removeActivy'])->name('activy.destroy');
