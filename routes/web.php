<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\LoginController;
use App\Http\Controllers\Teacher\MainController;
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


Route::get('/', [HomeController::class, 'home']);
Route::any('logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'teacher'], function () {

    Route::view('/login', 'so.login')->name('so.login');
    Route::post('/login', [App\Http\Controllers\Teacher\LoginController::class, 'authenticate'])->name('so.auth');

    Route::group(['middleware' => 'so.auth'], function () {
        Route::match(['get', 'post'], '/first-change-password', [MainController::class, 'firstChangePassword'])->name('so.firstChangePassword');
        Route::get('/logout', [App\Http\Controllers\Teacher\LoginController::class, 'logout'])->name('so.logout');
       
    });
});

