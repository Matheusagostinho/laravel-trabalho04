<?php

use App\Http\Controllers\Admin\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\OwnerController;

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

Route::redirect('/admin', '/admin/cars',);




Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('cars', CarController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('cars.fotos', FotoController::class)->except(['show', 'edit', 'update']);
});

Route::redirect('/', '/cars',);

Route::resource('cars', App\Http\Controllers\Site\CarController::class)->only(['index', 'show']);
