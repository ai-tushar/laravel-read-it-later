<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\PocketController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function() {
    Route::post('pockets', [PocketController::class, 'store']);
    Route::delete('pockets/{id}', [PocketController::class, 'destroy']);

    Route::get('pockets/{id}/contents', [ContentController::class, 'index']);
    Route::post('pockets/{id}/contents', [ContentController::class, 'store']);
    Route::delete('contents/{id}', [ContentController::class, 'destroy']);
});
