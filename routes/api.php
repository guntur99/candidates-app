<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APITCandidateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/candidates', [APITCandidateController::class, 'index'])->name('index.candidates');
Route::post('/candidate/store', [APITCandidateController::class, 'store'])->name('store.candidates');
Route::post('/candidate/update/{id}', [APITCandidateController::class, 'update'])->name('update.candidates');
Route::post('/candidate/delete/{id}', [APITCandidateController::class, 'destroy'])->name('destroy.candidates');
