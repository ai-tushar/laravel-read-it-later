<?php

use App\Http\Controllers\ContentDataController;
use App\Http\Controllers\PocketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pockets', [PocketController::class, 'index']);
Route::get('contents/{id}/data', [ContentDataController::class, 'index'])->name('contents.data');
