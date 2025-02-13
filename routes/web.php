<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MultiStepFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['auth'])->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [MultiStepFormController::class, 'showStep1'])->name('cars.step1');
    Route::post('/cars/create', [MultiStepFormController::class, 'postStep1'])->name('cars.step1.post');
    Route::get('/cars/create/details', [MultiStepFormController::class, 'showStep2'])->name('cars.step2');
    Route::post('/cars/create/details', [MultiStepFormController::class, 'postStep2'])->name('cars.step2.post');
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
});

Auth::routes();
