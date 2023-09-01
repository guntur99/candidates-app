<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TCandidateController;

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

// Admin
Route::get('/candidate/create', [TCandidateController::class, 'create'])->name('create.candidate');
Route::post('/candidate/store', [TCandidateController::class, 'store'])->name('store.products');
Route::post('/candidate/update', [TCandidateController::class, 'update'])->name('update.products');
Route::post('/candidate/delete', [TCandidateController::class, 'delete'])->name('delete.products');
Route::get('/', [TCandidateController::class, 'index'])->name('index.candidates');
Route::get('/candidate/datatable', [TCandidateController::class, 'datatable'])->name('datatable.candidates');
