<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MultiStepFormController;
use App\Http\Controllers\ProfileController;

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


Route::get('/', [CarController::class, 'index'])->name('cars.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-cars', [CarController::class, 'show'])->name('cars.show');
    Route::get('/cars/create', [MultiStepFormController::class, 'showStep1'])->name('cars.step1');
    Route::post('/cars/create', [MultiStepFormController::class, 'postStep1'])->name('cars.step1.post');
    Route::get('/cars/create/details', [MultiStepFormController::class, 'showStep2'])->name('cars.step2');
    Route::post('/cars/create/details', [MultiStepFormController::class, 'postStep2'])->name('cars.step2.post');
    Route::get('/cars/step3', [MultiStepFormController::class, 'showStep3'])->name('cars.step3');
    Route::post('/cars/step3', [MultiStepFormController::class, 'postStep3'])->name('cars.step3.post');
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/cars/{id}/sold', [CarController::class, 'markAsSold'])->name('cars.sold');
});
Route::get('/cars/{car}', [CarController::class, 'detail'])->name('cars.detail');
Route::get('/cars/{car}/pdf', [CarController::class, 'generatePdf'])->name('cars.pdf');
Auth::routes();
