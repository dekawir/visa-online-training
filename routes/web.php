<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

Route::get('/', [TrainingController::class, 'index'])->name('home');
Route::get('/findPurpose', [TrainingController::class, 'findPurpose']);
Route::get('/findSubPurpose', [TrainingController::class, 'findSubPurpose']);
Route::get('/findCity', [TrainingController::class, 'findCity']);
Route::get('/findDistrict', [TrainingController::class, 'findDistrict']);


Route::post('/submit',[TrainingController::class,'submit'])->name('submit');
