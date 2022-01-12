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

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'user' => Auth::user()
    ]);
})->name('home');

Route::resource('/users', UserController::class)->except(['create']);
Route::get('/join', [UserController::class, 'create'])->name('users.create');
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');

Route::resource('/albums', AlbumController::class);
Route::resource('/albums/{id}/photos', PhotoController::class)->except(['show', 'index']);
Route::get('/albums/{id}/gallery', [AlbumController::class, 'gallery'])->name("albums.gallery");
Route::get('/albums/{id}/timeline', [AlbumController::class, 'timeline'])->name("albums.timeline");
Route::get('/albums/data/{path}', StorageController::class)->where('path', '.*')->name("storage.url");

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/loginCheck', [UserController::class, 'loginCheck'])->name('loginCheck');

Route::get('/createAlbum', [AlbumController::class, 'create']);


