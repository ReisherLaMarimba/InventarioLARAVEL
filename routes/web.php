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
Route::get('/items/crear', [itemsController::class,'create'])->middleware('auth');
Route::resource('items', itemsController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [ItemsController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){

Route::get('/', [ItemsController::class, 'index'])->name('home');
});