<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemsController;
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
    return view('auth.login');
});


Route::get('/items', function () {
    return view('items.index');
});
Route::get('/items/pdf', [itemsController::class,'pdf'])->name('items.pdf');
Route::get('/items/crear', [itemsController::class,'create'])->middleware('auth');
Route::get('/items/retiro', [itemsController::class,'retiro'])->middleware('auth');
//ACTIVAR A TRUE PARA PERMITIR REGISTROS
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [itemsController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){

Route::get('/', [ItemsController::class, 'index'])->name('home');
Route::resource('items', itemsController::class)->middleware('auth');






});