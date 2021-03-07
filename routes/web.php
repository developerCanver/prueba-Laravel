<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Mark;
use App\Http\Controllers\Chart;
use App\Http\Controllers\Modelo;
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
})->middleware('auth');

Route::get('/usuarios', [User::class, 'index']);
Route::post('usuarios/create', [User::class, 'store']);
Route::resource('usuarios', User::class);

Route::get('/marcas', [Mark::class, 'index']);
Route::post('marcas/create', [Mark::class, 'store']);
Route::resource('marcas', Mark::class);

Route::get('/modelos', [Modelo::class, 'index']);
Route::post('modelos/create', [Modelo::class, 'store']);
Route::resource('modelos', Modelo::class);

Route::get('/grafica', [Chart::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
