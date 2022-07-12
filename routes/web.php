<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportExportController;
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

    Route::view('/login', 'teacher.login')->name('teacher.login');
    Route::post('/login', [App\Http\Controllers\Teacher\LoginController::class, 'authenticate'])->name('teacher.auth');

    Route::post('/schoolnameajax', [App\Http\Controllers\AjaxController::class, 'schoolNameAjax'])->name('schoolnameajax');

    Route::group(['middleware' => 'so.auth'], function () {
        Route::match(['get', 'post'], '/first-change-password', [MainController::class, 'teacher_details'])->name('teacher.teacher_details');
        Route::get('/logout', [App\Http\Controllers\Teacher\LoginController::class, 'logout'])->name('so.logout');
       
    });

    //route for import school
    Route::get('importExportView', [ImportExportController::class, 'importExportView']);
    Route::post('import', [ImportExportController::class, 'import'])->name('import');
});

Route::group(['prefix' => 'school'], function () {

    Route::view('/login', 'school.login')->name('school.login');
    Route::post('/login', [App\Http\Controllers\School\LoginController::class, 'authenticate'])->name('school.auth');
    Route::match(['get', 'post'], '/first-change-password', [MainController::class, 'firstChangePassword'])->name('school.firstChangePassword');

    Route::post('/schoolnameajax', [App\Http\Controllers\AjaxController::class, 'schoolNameAjax'])->name('schoolnameajax');

    Route::group(['middleware' => 'so.auth'], function () {
        Route::match(['get', 'post'], '/first-change-password', [MainController::class, 'teacher_details'])->name('teacher.teacher_details');
        Route::get('/logout', [App\Http\Controllers\Teacher\LoginController::class, 'logout'])->name('so.logout');
    });

    //route for import school
    Route::get('importExportView', [ImportExportController::class, 'importExportView']);
    Route::post('import', [ImportExportController::class, 'import'])->name('import');
});

