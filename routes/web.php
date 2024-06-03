<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;

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
    return view('welcome');
});

// -----------------------------login-------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'showLoginForm')->name('login');
    Route::post('/loginchek', 'validate_login');
    Route::POST('/logout', 'logout')->name('logout');
});

// -------------------------- main dashboard ----------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware('auth:admin')->name('home');
   
});

// store
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/movies', [DashboardController::class, 'createmovie']);
    Route::post('/moviesstore', [DashboardController::class, 'store'])->name('store');
    Route::get('/movie/view', [DashboardController::class, 'moviesview']);
    Route::get('/movies/edit/{id}', [DashboardController::class, 'movieedit']);
    Route::put('/movies/update/{id}', [DashboardController::class, 'movieupdate']);
    Route::get('/movies/delete/{id}', [DashboardController::class, 'moviedelete']);


    Route::get('/genres', [DashboardController::class, 'genres']);
    Route::post('/genresstore', [DashboardController::class, 'genresstore']);
    Route::get('/genres/view', [DashboardController::class, 'genresview']);
    Route::get('/genres/edit/{id}', [DashboardController::class, 'genresedit']);
    Route::put('/genres/update/{id}', [DashboardController::class, 'genresupdate']);
    Route::get('/genres/delete/{id}', [DashboardController::class, 'genresdelete']);
    Route::get('/cast', [DashboardController::class, 'cast']);
    Route::post('/caststore', [DashboardController::class, 'caststore']);
    Route::get('/cast/view', [DashboardController::class, 'castview']);
    Route::get('/cast/edit/{id}', [DashboardController::class, 'castedit']);
    Route::put('/cast/update/{id}', [DashboardController::class, 'castupdate']);
    Route::get('/casts/delete/{id}', [DashboardController::class, 'castdelete']);
    // Route::resource('movies', DashboardController::class); 
});

