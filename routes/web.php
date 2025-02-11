<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
Route::get('/cars/create-step1', [CarController::class, 'createStep1'])->name('cars.create-step1');
Route::post('/cars/create-step1', [CarController::class, 'postCreateStep1'])->name('cars.post-create-step1');
Route::get('/cars/create-step2', [CarController::class, 'createStep2'])->name('cars.create-step2');
Route::post('/cars/create-step2', [CarController::class, 'postCreateStep2'])->name('cars.post-create-step2');
Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

Auth::routes();
