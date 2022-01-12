<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AlbumController;

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

// Unrestricted route
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/join', [UserController::class, 'create'])->name('users.create');
Route::post('/loginCheck', [UserController::class, 'loginCheck'])->name('loginCheck');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

// Restricted routes
Route::middleware(["auth"])->group(function () {
    Route::resource('/users', UserController::class)->except(['create', 'store']);

    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');

    Route::resource('/albums', AlbumController::class);
    Route::resource('/albums/{id}/photos', PhotoController::class)->middleware('ensure.permission')->except(['show', 'index']);
    Route::get('/albums/{id}/gallery', [AlbumController::class, 'gallery'])->middleware('ensure.permission')->name("albums.gallery");
    Route::get('/albums/{id}/timeline', [AlbumController::class, 'timeline'])->middleware('ensure.permission')->name("albums.timeline");
    Route::get('/albums/data/{path}', StorageController::class)->where('path', '.*')->middleware('ensure.permission')->name("storage.url");

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/createAlbum', [AlbumController::class, 'create']);
});
