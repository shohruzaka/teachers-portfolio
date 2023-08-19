<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MainController;
use Illuminate\Routing\RouteGroup;

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

Route::get('/',[MainController::class,'index'])->name('home');

Route::get('/cabinet', [MainController::class, 'cabinet'])->name('cabinet');

Route::resource('/articles',ArticleController::class);

Route::get('/download/{file_url}', [MainController::class,'download'])->name('download');
Route::get('/downloadid/{id}', [MainController::class,'downloadid'])->name('downloadid');

Route::controller(DepartmentController::class)->name('department.')->group(function(){
    Route::post('/create','create')->name('create');
});
