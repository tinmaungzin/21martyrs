<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InformController;
use App\Http\Controllers\NewPendingPostsController;
use App\Http\Controllers\PublishedPostsController;
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

    Route::get('/login', [LoginController::class, 'loginForm'])->name('admin.login_form');
//    Route::middleware(['throttle:login'])->post('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');


    Route::middleware('admin')->group(function () {

        Route::resource('admins', AdminController::class);
        Route::resource('stats', StatController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('feedback', FeedbackController::class);

        Route::get('new_pending_posts', [NewPendingPostsController::class, 'new_pending_posts'])->name('list.new_pending_posts');
        Route::get('new_pending_posts/{pendingPost}/confirm', [NewPendingPostsController::class, 'new_pending_post_confirm_form'])->name('form.confirm.new_pending_post');
        Route::post('new_pending_posts/{pendingPost}/confirm', [NewPendingPostsController::class, 'handle_new_pending_post'])->name('handle.new_pending_post');


        Route::get('published_posts', [PublishedPostsController::class, 'published_posts'])->name('list.published_posts');
        Route::get('published_posts/{post}', [PublishedPostsController::class, 'edit'])->name('edit.published_posts');
        Route::post('published_posts/{post}', [PublishedPostsController::class, 'update'])->name('update.published_posts');

        Route::get('rejected_pending_posts', [RejectedPendingPostsController::class, 'rejected_pending_posts'])->name('list.rejected_pending_posts');
        Route::get('rejected_pending_posts/{pendingPost}/confirm', [RejectedPendingPostsController::class, 'rejected_pending_post_confirm_form'])->name('form.confirm.rejected_pending_post');

        Route::get('suggested_edit_pending_posts', [SuggestedEditPendingPostsController::class, 'suggested_edit_pending_posts'])->name('list.suggested_edit_pending_posts');
        Route::get('suggested_edit_pending_posts/{pendingPost}/confirm', [SuggestedEditPendingPostsController::class, 'suggested_edit_pending_post_confirm_form'])->name('form.confirm.suggested_edit_pending_post');
        Route::post('suggested_edit_pending_posts/{pendingPost}/confirm', [SuggestedEditPendingPostsController::class, 'handle_suggested_edit_pending_post'])->name('handle.suggested_edit_pending_post');

        Route::get('/user/confirm-password', [AuthController::class, 'confirm_password_form'])->name('password.confirm');

        Route::middleware('password.confirm')->group(function () {
            Route::get('reset-password', [LoginController::class, 'resetPasswordForm'])->name('reset_password_form');
            Route::post('reset-password', [LoginController::class, 'resetPassword'])->name('reset_password');
        });
    });

});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about_us'])->name('about');
Route::post('/fetch_names', [HomeController::class, 'fetchNames'])->name('fetch.names');
Route::get('/experiences', [HomeController::class, 'articles'])->name('list.experiences');
Route::get('/article/{article}', [HomeController::class, 'show_article'])->name('show.experience');

Route::get('/profile/{post}', [HomeController::class, 'profile'])->name('profile');


Route::get('inform/detained', [InformController::class, 'detained_form'])->name('form.detained');
//Route::post('inform/detained', [InformController::class, 'store_detained'])->name('store.detained');
Route::get('inform/edit_detained/{post}', [InformController::class, 'edit_detained_form'])->name('form.edit.detained');
//Route::post('inform/edit_detained/{post}', [InformController::class, 'store_edit_detained'])->name('store.edit.detained');

Route::get('inform/missing', [InformController::class, 'missing_form'])->name('form.missing');
//Route::post('inform/detained', [InformController::class, 'store_detained'])->name('store.detained');
Route::get('inform/edit_missing/{post}', [InformController::class, 'edit_missing_form'])->name('form.edit.missing');
//Route::post('inform/edit_detained/{post}', [InformController::class, 'store_edit_detained'])->name('store.edit.detained');

Route::get('inform/dead', [InformController::class, 'dead_form'])->name('form.dead');
//Route::post('inform/dead', [InformController::class, 'store_dead'])->name('store.dead');
Route::get('inform/edit_dead/{post}', [InformController::class, 'edit_dead_form'])->name('form.edit.dead');
//Route::post('inform/edit_dead/{post}', [InformController::class, 'store_edit_dead'])->name('store.edit.dead');

Route::post('inform',[InformController::class,'store'])->name('store.inform');
Route::post('inform/edit/{post}',[InformController::class,'store_edit'])->name('edit.inform');

Route::post('/fetchCities', [InformController::class, 'getCities'])->name('fetch.cities');
