<?php

use App\Http\Controllers\PhotoController;
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




Route::get('/album/{id}/gallery', [AlbumController::class, 'gallery'])->name("album.gallery");

Route::get('/album', [AlbumController::class, 'index']);

Route::resource('/users', UserController::class);
Route::resource('/album/{id}/photos', PhotoController::class)->except(['show', 'index']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/profil', [UserController::class, 'profil']);

Route::post('/loginCheck', [UserController::class, 'loginCheck'])->name('loginCheck');

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/createAlbum', [AlbumController::class, 'create']);
