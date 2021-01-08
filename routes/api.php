<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DivisionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('divisions', [DivisionController::class, 'index'])->name('getAllDivisions');
Route::get('division/{id}', [DivisionController::class, 'show'])->name('getDivision');
Route::post('division', [DivisionController::class, 'store'])->name('storeDivision');
Route::put('division/{id}', [DivisionController::class, 'update'])->name('updateDivision');
Route::delete('division/{id}', [DivisionController::class, 'destroy'])->name('destroyDivision');

Route::get('superior-division/{id}', [DivisionController::class, 'showSuperiorDivision'])->name('getSuperiorDivision');
Route::get('sub-divisions/{id}', [DivisionController::class, 'showSubdivisions'])->name('getSubdivision');
