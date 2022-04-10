<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//user Route
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
        Route::get('registration', [UserController::class, 'registrationForm'])->name('registration');
        Route::post('registration', [UserController::class, 'register'])->name('register');
        Route::get('login', [UserController::class, 'loginForm'])->name('loginForm');
        Route::Post('login', [UserController::class, 'login'])->name('login');

    });
    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function(){
        Route::get('home', [UserController::class, 'home'])->name('home');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
    });
});

//Route::get('registration', [UserController::class, 'registrationForm']);
//Route::post('registration', [UserController::class, 'register']);

//Admin Route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function(){
        Route::get('login', [AdminController::class, 'loginForm'])->name('loginForm');
        Route::Post('login', [AdminController::class, 'login'])->name('login');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function(){
        Route::get('home', [AdminController::class, 'home'])->name('home');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    });
});