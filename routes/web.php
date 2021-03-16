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


Route::resource('admins',\App\Http\Controllers\AdminController::class);

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('index');
Route::get('/about',[\App\Http\Controllers\HomeController::class,'about_us'])->name('about');
Route::get('inform/dead',[\App\Http\Controllers\InformController::class,'dead_form'])->name('form.dead');
Route::get('inform/detained',[\App\Http\Controllers\InformController::class,'detained_form'])->name('form.detained');
