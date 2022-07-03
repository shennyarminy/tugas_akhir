<?php
namespace App;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\SubcriteriaController;

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

// LOGIN (AUTH)
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/login',  [LoginController::class, 'login']);

// REGISTER
Route::get('/register',  [RegisterController::class, 'index']);
Route::post('/register',  [RegisterController::class, 'store']);


// HOME (DASHBOARD)
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home');


// KRITERIA
Route::resource('criteria', CriteriaController::class);


// SUBKRITERIA 
Route::resource('subcriteria', SubcriteriaController::class);

// ALTERNATIF
Route::resource('alternatif', AlternatifController::class);

// USER
Route::resource('user', UserController::class);

// COUNT
Route::get('count.matrix', [CountController::class, 'matrix']);
Route::get('count.normalization', [CountController::class, 'normalization']);

