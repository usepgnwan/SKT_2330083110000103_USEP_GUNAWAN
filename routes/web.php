<?php

use App\Http\Controllers\ProfileController;
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

/**
 * ROUTE UNTUK PROFILE
 */

Route::controller(ProfileController::class)->prefix('profile')->group(function(){
    Route::get('/', 'index')->name('profile.index');
});

Route::get('/', function () {
    return view('index');
});
