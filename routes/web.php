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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'newhome'])->name('newhome');

// ===== FileController
// === برای ایجاد تفاوت بین آدرس فانکشن دانلود با بقیه یک بخش به آدرس بقیه اضافه شد 
Route::post('/site/uploadparam', [App\Http\Controllers\FileController::class, 'uploadparam'])->name('uploadparam');
Route::post('/site/uploadfile', [App\Http\Controllers\FileController::class, 'uploadfile'])->name('uploadfile');
Route::get('/{x}', [App\Http\Controllers\FileController::class, 'downloadfile'])->name('downloadfile');
Route::get('/site/expire', [App\Http\Controllers\FileController::class, 'expire'])->name('expire');
Route::get('/site/delete_file', [App\Http\Controllers\FileController::class, 'delete_file'])->name('delete_file');
Route::get('/site/test', [App\Http\Controllers\FileController::class, 'test'])->name('test');
Route::get('/site/delete_file_queue', [App\Http\Controllers\FileController::class, 'delete_file_queue'])->name('delete_file_queue');




//=== ADMIN ====
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('alluploads', [App\Http\Controllers\admin\FileController::class, 'alluploads'])->name('alluploads')->middleware('role');

});





