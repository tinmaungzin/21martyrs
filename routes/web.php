<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InformController;
use App\Http\Controllers\NewPendingPostsController;
use App\Http\Controllers\RejectedPendingPostsController;
use App\Http\Controllers\SuggestedEditPendingPostsController;
use App\Http\Controllers\HomeController;

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

Route::prefix('admin')->group(function () {

    Route::get('/login',[LoginController::class, 'loginForm'])->name('admin.login_form');
    Route::post('/login',[LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [LoginController::class,'logout'])->name('admin.logout');


    Route::middleware('admin')->group(function(){

        Route::resource('admins',AdminController::class);

        Route::get('new_pending_posts',[NewPendingPostsController::class,'new_pending_posts'])->name('list.new_pending_posts');
        Route::get('new_pending_posts/{pendingPost}/confirm',[NewPendingPostsController::class,'new_pending_post_confirm_form'])->name('form.confirm.new_pending_post');
        Route::post('new_pending_posts/{pendingPost}/confirm',[NewPendingPostsController::class,'handle_new_pending_post'])->name('handle.new_pending_post');

        Route::get('rejected_pending_posts',[ RejectedPendingPostsController::class,'rejected_pending_posts'])->name('list.rejected_pending_posts');
        Route::get('rejected_pending_posts/{pendingPost}/confirm',[RejectedPendingPostsController::class,'rejected_pending_post_confirm_form'])->name('form.confirm.rejected_pending_post');

        Route::get('suggested_edit_pending_posts',[ SuggestedEditPendingPostsController::class,'suggested_edit_pending_posts'])->name('list.suggested_edit_pending_posts');
        Route::get('suggested_edit_pending_posts/{pendingPost}/confirm',[SuggestedEditPendingPostsController::class,'suggested_edit_pending_post_confirm_form'])->name('form.confirm.suggested_edit_pending_post');
        Route::post('suggested_edit_pending_posts/{pendingPost}/confirm',[SuggestedEditPendingPostsController::class,'handle_suggested_edit_pending_post'])->name('handle.suggested_edit_pending_post');



    });

});

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/about',[HomeController::class,'about_us'])->name('about');
Route::post('/search',[HomeController::class,'search'])->name('search');

Route::get('/profile/{post}',[HomeController::class,'profile'])->name('profile');


Route::get('inform/detained',[InformController::class,'detained_form'])->name('form.detained');
Route::post('inform/detained',[InformController::class,'store_detained'])->name('store.detained');
Route::get('inform/edit_detained/{post}',[InformController::class,'edit_detained_form'])->name('form.edit.detained');
Route::post('inform/edit_detained/{post}',[InformController::class,'store_edit_detained'])->name('store.edit.detained');


Route::get('inform/dead',[InformController::class,'dead_form'])->name('form.dead');
Route::post('inform/dead',[InformController::class,'store_dead'])->name('store.dead');
Route::get('inform/edit_dead/{post}',[InformController::class,'edit_dead_form'])->name('form.edit.dead');
Route::post('inform/edit_dead/{post}',[InformController::class,'store_edit_dead'])->name('store.edit.dead');


Route::post('/fetchCities',[InformController::class,'getCities'])->name('fetch.cities');
