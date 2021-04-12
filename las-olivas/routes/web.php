<?php

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
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/clients-dashboard', 'App\Http\Controllers\ClientController@index')->name('clients-dashboard');
    Route::get('/clients-modification', 'App\Http\Controllers\ClientController@client_modification')->name('clients-update');
});

require __DIR__.'/auth.php';
