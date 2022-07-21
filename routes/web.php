<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuanController;
use App\Http\Controllers\MinhController;
use App\Http\Controllers\SinhVienController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

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

Auth::logout();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', 'QuanController@index');
Route::get('/quan', [QuanController::class, 'quan']);
Route::get('/minh', [MinhController::class, 'listUser']);

Route::get('/login', [LoginController::class, 'getViewLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin']);

Route::middleware('auth')->group(function () {

    Route::get('/sinhVien', [SinhVienController::class, 'loadListSV']);
});
Route::get('/user', function () {
    return view('user.index');
});

Route::get('/sv', [SinhVienController::class, 'listSv']);
